-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin ENUM('Y', 'N') DEFAULT 'N',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS settings (
    `blogTitle` VARCHAR(50) NOT NULL,
    `blogDescription` VARCHAR(150) NOT NULL,
    `blogAuthor` VARCHAR(40) NOT NULL
);
CREATE TABLE IF NOT EXISTS settings() commit;