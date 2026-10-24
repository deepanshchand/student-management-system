CREATE DATABASE IF NOT EXISTS student_management_system;

USE student_management_system;

CREATE TABLE
    IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL UNIQUE,
        phone VARCHAR(15) NOT NULL UNIQUE,
        father_name VARCHAR(100) NOT NULL,
        gender VARCHAR(20) NOT NULL,
        date_of_birth DATE NOT NULL,
        address VARCHAR(255) NOT NULL,
        city VARCHAR(100) NOT NULL,
        course_name VARCHAR(100) NOT NULL,
        admission_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );