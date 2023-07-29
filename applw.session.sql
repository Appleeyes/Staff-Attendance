USE Staff_Attendants;

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    days_worked INT NOT NULL DEFAULT 0
);

INSERT INTO staff (name, salary) VALUES
    ('John Doe', 10000),
    ('Jane Smith', 10000),
    ('Michael Johnson', 10000),
    ('Emily Brown', 10000),
    ('William Davis', 10000);


ALTER TABLE staff ADD COLUMN salary_earned DECIMAL(10, 2) NOT NULL DEFAULT 0;

ALTER TABLE staff
ADD COLUMN salary_deducted DECIMAL(10, 2) NOT NULL DEFAULT 0 AFTER days_worked;

ALTER TABLE staff
ADD COLUMN days_absent INT NOT NULL DEFAULT 0 AFTER salary;

ALTER TABLE staff
MODIFY COLUMN salary_deducted DECIMAL(10, 2) NOT NULL DEFAULT 0 AFTER days_absent;

