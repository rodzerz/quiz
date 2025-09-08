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
