CREATE DATABASE IF NOT EXISTS autentifikacija;

USE autentifikacija;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'lietotajs') DEFAULT 'lietotajs'
);

-- Pievienosim noklusēto adminu:
INSERT INTO users (username, password, role) VALUES (
    'admin',
    SHA2('admin123', 256),
    'admin'
);
CREATE TABLE tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100)
);

-- Jautājumi
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    test_id INT,
    question_text TEXT,
    FOREIGN KEY (test_id) REFERENCES tests(id)
);

-- Atbildes
CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    answer_text TEXT,
    is_correct BOOLEAN,
    FOREIGN KEY (question_id) REFERENCES questions(id)
);

-- Lietotāju rezultāti
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    test_id INT,
    correct_answers INT,
    total_questions INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
