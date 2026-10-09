CREATE DATABASE sqli_lab;
USE sqli_lab;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role VARCHAR(20)
);

INSERT INTO users (username, password, role) VALUES
('admin', 'SuperSecret123', 'admin'),
('guest', 'guestpass', 'user');

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    content TEXT
);

INSERT INTO articles (title, content) VALUES
('Welcome Post', 'This is a public article anyone can see.'),
('Company News', 'Another public article about updates.');

CREATE USER 'labuser'@'localhost' IDENTIFIED BY 'YOUR_PASSWORD_HERE';
GRANT ALL PRIVILEGES ON sqli_lab.* TO 'labuser'@'localhost';
FLUSH PRIVILEGES;
