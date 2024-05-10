CREATE DATABASE QUANLYSACH;
USE QUANLYSACH;
CREATE TABLE Sach (
    MaSach INT AUTO_INCREMENT PRIMARY KEY,
    TenSach VARCHAR(255),
    SoLuong INT
);

CREATE TABLE User (
    MaUser INT AUTO_INCREMENT PRIMARY KEY,
    TenUser VARCHAR(255),
    MatKhau VARCHAR(255)
);

INSERT INTO Sach (TenSach, SoLuong) VALUES
('Sách 1', 100),
('Sách 2', 140),
('Sách 3', 190),
('Sách 4', 29),  
('Sách 5', 22);

INSERT INTO User (TenUser, MatKhau) VALUES
('user1', 'Phatdeptrai1@'),
('user2', 'Phatdeptrai1@'),
('user3', 'Phatdeptrai1@'),
('user4', 'Phatdeptrai1@'),
('user5', 'Phatdeptrai1@');
