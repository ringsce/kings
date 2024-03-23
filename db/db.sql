CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    country VARCHAR(100),
    city VARCHAR(100),
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

