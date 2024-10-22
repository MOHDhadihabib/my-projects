CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    resume text NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
