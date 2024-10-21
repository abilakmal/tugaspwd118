-- Membuat database jika belum ada
CREATE DATABASE IF NOT EXISTS mahasiswa;

-- Menggunakan database mahasiswa
USE mahasiswa;

-- Membuat tabel registration
CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    name VARCHAR(100),
    institution VARCHAR(100),
    country VARCHAR(50),
    address TEXT,
    is_deleted BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Membuat tabel admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);
