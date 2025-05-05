use library;
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    accession_number VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    authors VARCHAR(255),
    edition VARCHAR(100),
    publisher VARCHAR(255)
);

select * from books;