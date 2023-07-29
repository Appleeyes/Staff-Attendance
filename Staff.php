<?php
class Staff
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllStaff()
    {
        $query = "SELECT * FROM staff";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAttendance($staff_id, $attendance)
    {
        $query = "UPDATE staff SET days_worked = days_worked + 1 WHERE id = :staff_id";
        if ($attendance === 'absent') {
            $query = "UPDATE staff SET days_absent = days_absent + 1 WHERE id = :staff_id";
        }

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
        $stmt->execute();

        // Recalculate and update the salary_earned
        $this->updateSalaryEarned($staff_id);
        $this->updateSalaryDeducted($staff_id);
    }

    private function updateSalaryEarned($staff_id)
    {
        $query = "SELECT salary, days_worked FROM staff WHERE id = :staff_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $salary = $result['salary'];
        $days_worked = $result['days_worked'];

        // Assuming a month has 30 days
        $total_days_in_month = 30;
        $salary_per_day = $salary / $total_days_in_month;

        $salary_earned = $salary_per_day * $days_worked;

        // Update the staff record with the new salary_earned value only if the staff is present
        if ($days_worked > 0) {
            $updateQuery = "UPDATE staff SET salary_earned = :salary_earned WHERE id = :staff_id";
            $updateStmt = $this->db->prepare($updateQuery);
            $updateStmt->bindParam(':salary_earned', $salary_earned, PDO::PARAM_INT);
            $updateStmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
            $updateStmt->execute();
        } else {
            $salary_earned = 0;
        }
    }



    private function updateSalaryDeducted($staff_id)
    {
        $query = "SELECT salary, days_absent FROM staff WHERE id = :staff_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $salary = $result['salary'];
        $days_absent = $result['days_absent'];

        // Assuming a month has 30 days
        $total_days_in_month = 30;
        $salary_per_day = $salary / $total_days_in_month;

        $salary_deducted = $salary_per_day * (- ($days_absent));

        if ($days_absent > 0) {
            $updateQuery = "UPDATE staff SET salary_deducted = :salary_deducted WHERE id = :staff_id";
            $updateStmt = $this->db->prepare($updateQuery);
            $updateStmt->bindParam(':salary_deducted', $salary_deducted, PDO::PARAM_INT);
            $updateStmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
            $updateStmt->execute();
        } else {
            $salary_deducted = 0;
        }
    }
}
