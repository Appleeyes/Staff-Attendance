<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Staff Attendance Management</title>
</head>

<body style="color: white;">
    <div style="width:50%; margin: 50px auto; background-color: purple; padding: 30px; border-radius: 30px;">
        <h1 style="margin-top: 50px; margin-bottom: 50px;">Staff Attendance Management</h1>
        <form action="controller.php" method="post">
            <label style="font-weight: 800;" for="staff_id" class="form-label">Select Staff:</label>
            <select name="staff_id" class="form-select">
                <?php
                require_once 'db.php';
                require_once 'Staff.php';

                // Create an instance of the Staff class
                $staffObj = new Staff($db);

                // Fetch all staff for the dropdown
                $staffList = $staffObj->getAllStaff();

                // Populate the dropdown with staff data from the database
                foreach ($staffList as $staff) {
                    echo '<option value="' . $staff['id'] . '">' . $staff['name'] . '</option>';
                }
                ?>
            </select>
            <div style="margin-top: 30px;">
                <label style="font-weight: 800;" for="attendance">Attendance:</label>
                <select name="attendance" class="form-select">
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                </select>
            </div>
            <input style="margin-top: 20px; font-weight: 800;" type="submit" name="submit" value="Submit">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>