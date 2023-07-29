# HR Staff Attendance Management System

The HR Staff Attendance Management System is a simple PHP/MySQL web application designed for HR staff to manage staff attendance. It allows HR staff to mark each staff member as absent or present on specific dates and automatically calculates the salary earned for each staff member based on their attendance.

## Features

- View a form to mark staff attendance on specific dates.
- Mark staff members as absent or present on each day.
- Automatically calculate the salary earned for each staff member based on their attendance.
- Automatically calculate the salary deducted for each staff member based on their absence.
- List all staff members and their respective attendance and salary details.

## Technologies Used

- PHP (OOP)
- MySQL
- PDO (PHP Data Objects) for database access
- HTML, CSS for the user interface
- MVC (Model-View-Controller) architecture

## Installation

1. Clone this repository to your local development environment using the following command: git clone https://github.com/your_username/Staff-Attendance.git

2. Create a new MySQL database for the project and import the provided `staff.sql` file to create the `staff` table.

3. Update the database credentials in the `db.php` file located in the project folder with your MySQL database credentials:

## Usage
- Access the application by navigating to its URL in your web browser (e.g., http://localhost/Staff-Attendance/).

- Use the form to mark the attendance of each staff member by selecting staff name and selecting "Absent" or "Present."

- The system will automatically calculate the salary earned for each staff member based on their attendance. The salary will be updated in the database.

- To view the list of all staff members and their respective attendance details, you will be redirected to the page when the form is submitted.

## License
This project is licensed under the MIT License.

## Note
This project is intended for educational purposes only and may not be suitable for production use. It lacks advanced security features and robust error handling.