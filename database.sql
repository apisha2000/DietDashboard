create database diet_dashboard_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE foods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    fat DECIMAL(10,2) NOT NULL,
    carbs DECIMAL(10,2) NOT NULL,
    protein DECIMAL(10,2) NOT NULL
);
CREATE TABLE today_foods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_id INT NOT NULL,
    date_added DATE DEFAULT (CURDATE()),
    FOREIGN KEY (food_id) REFERENCES foods(id)
);
