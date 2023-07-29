<?php
require_once 'db.php';
require_once 'Staff.php';

// Create an instance of the Staff class
$staffObj = new Staff($db);

// Fetch all staff for the dropdown
$staffList = $staffObj->getAllStaff();

// Process form submission
if (isset($_POST['submit'])) {
    $staff_id = $_POST['staff_id'];
    $attendance = $_POST['attendance'];

    // Mark the attendance
    $staffObj->markAttendance($staff_id, $attendance);

    // Redirect back to the index.php page after processing the form
    header('Location: list.php');
    exit();
}

// Include the index.php file to display the view
require_once 'index.php';
