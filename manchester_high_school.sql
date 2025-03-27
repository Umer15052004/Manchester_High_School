CREATE DATABASE IF NOT EXISTS manchester_high_school;
USE manchester_high_school;


CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    capacity INT NOT NULL
);


CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    salary DECIMAL(10, 2),
    background_check BOOLEAN,
    class_id INT UNIQUE,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
);


CREATE TABLE pupils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    medical_info TEXT,
    class_id INT,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
);


CREATE TABLE parents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    email VARCHAR(100),
    phone VARCHAR(20)
);


CREATE TABLE pupil_parent (
    pupil_id INT,
    parent_id INT,
    PRIMARY KEY (pupil_id, parent_id),
    FOREIGN KEY (pupil_id) REFERENCES pupils(id) ON DELETE CASCADE,
    FOREIGN KEY (parent_id) REFERENCES parents(id) ON DELETE CASCADE
);
