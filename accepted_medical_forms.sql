CREATE TABLE accepted_medical_forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    submission_id INT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    reg_number VARCHAR(20) NOT NULL,
    faculty VARCHAR(100) NOT NULL,
    degree_program VARCHAR(100) NOT NULL,
    semester VARCHAR(50) NOT NULL,
    academic_year VARCHAR(50) NOT NULL,
    duration_from DATE NOT NULL,
    duration_to DATE NOT NULL,
    reason TEXT NOT NULL,
    medical_report VARCHAR(255) NOT NULL,
    mentoruser_id INT NOT NULL,
    accepted_datetime DATETIME DEFAULT CURRENT_TIMESTAMP
);
