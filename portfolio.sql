CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
);

CREATE TABLE projects(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT
);

INSERT INTO projects(title,description)
VALUES
('Portfolio Website','Responsive Full Stack Portfolio'),
('AI Project','Artificial Intelligence Research Project');