<?php
// Database connection
require_once 'db.php';

// Reset attendance data
$queryResetAttendance = "UPDATE staff SET days_worked = 0, days_absent = 0, salary_earned = 0.00, salary_deducted = 0.00";
$stmtResetAttendance = $db->prepare($queryResetAttendance);
$stmtResetAttendance->execute();

// Other data reset tasks as needed

// Redirect to the list_staff.php page after the data reset
header("Location: list.php");
exit();
