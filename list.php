<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>List of Staff Members</title>
</head>

<body style="background-color: purple;">
    <div style="width:80%; margin: 0 auto; background-color: purple; padding: 30px; border-radius: 30px;">
        <h1 style="margin-top: 10px; margin-bottom: 10px;">List of Staff Members</h1>
        <?php
        // Database connection
        require_once 'db.php';
        // Fetch all staff members from the database
        $query = "SELECT * FROM staff";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $staffList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are staff members
        if (count($staffList) > 0) {
            echo '<table class="table" border="1">';
            echo '<tr>
                 <th>S/N</th>
                 <th>Name</th>
                 <th>Salary</th>
                 <th>Days-Absent</th>
                 <th>Salary-Deducted</th>
                 <th>Days-Worked</th>
                 <th>Salary-Earned</th>
              </tr>';

            // Display staff member information in rows
            $serialNumber = 1;
            foreach ($staffList as $staff) {
                echo '<tr>';
                echo '<td>' . $serialNumber . '</td>';
                echo '<td>' . $staff['name'] . '</td>';
                echo '<td>' . $staff['salary'] . '</td>';
                echo '<td>' . $staff['days_absent'] . '</td>';
                echo '<td>' . $staff['salary_deducted'] . '</td>';
                echo '<td>' . $staff['days_worked'] . '</td>';
                echo '<td>' . $staff['salary_earned'] . '</td>';
                echo '</tr>';
                $serialNumber++;
            }

            echo '</table>';
        } else {
            echo '<p>No staff members found in the database.</p>';
        }
        ?>
        <form action="index.php">
            <button style="font-weight: 800;">Mark Register</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>