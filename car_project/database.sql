
CREATE DATABASE IF NOT EXISTS cardb;
USE cardb;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(10) NOT NULL DEFAULT 'user',
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS cars (
    id INT NOT NULL AUTO_INCREMENT,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(30) NOT NULL,
    price_per_day DECIMAL(8,2) NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS rentals (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    car_id INT NOT NULL,
    days INT NOT NULL,
    start_date DATE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
);

INSERT INTO cars (brand, model, year, color, price_per_day, description) VALUES
('Volkswagen', 'Golf', 2019, 'Blue', 35.00, 'Reliable and economical city car.'),
('BMW', '320d', 2020, 'Black', 60.00, 'Comfortable sedan, great for long trips.'),
('Toyota', 'Yaris', 2021, 'White', 28.00, 'Small, easy to park, very low fuel use.');
