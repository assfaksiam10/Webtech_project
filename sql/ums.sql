
CREATE DATABASE IF NOT EXISTS ums;
USE ums;

CREATE TABLE users (
    userId VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL
);

CREATE TABLE courses (
    courseId INT AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(120) NOT NULL,
    credit DECIMAL(2,1) DEFAULT 3.0,
    facultyId VARCHAR(50)
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentId VARCHAR(50),
    courseId INT
);

CREATE TABLE assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    courseId INT,
    title VARCHAR(150),
    marks INT
);

CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentId VARCHAR(50),
    courseId INT,
    marks INT,
    grade VARCHAR(5)
);


INSERT INTO users (userId, name, email, pass, role) VALUES
('admin1',  'System Admin', 'admin@ums.edu',   '1234', 'admin'),
('khairul', 'Md. Khairul',  'faculty@ums.edu', '1234', 'faculty'),
('adnan',   'Adnan',        'student@ums.edu', '1234', 'student');

INSERT INTO courses (courseName, credit, facultyId) VALUES
('Web Technology',   3.0, 'khairul'),
('Compiler Design',  3.0, 'khairul'),
('Computer Network', 3.0, 'khairul');

INSERT INTO enrollments (studentId, courseId) VALUES
('adnan', 1),
('adnan', 2);

INSERT INTO results (studentId, courseId, marks, grade) VALUES
('adnan', 1, 90, 'A+'),
('adnan', 2, 85, 'A');
