CREATE DATABASE IF NOT EXISTS msisdb;
USE msisdb;

DROP TABLE IF EXISTS books;
CREATE TABLE books (
	id int PRIMARY KEY AUTO_INCREMENT ,
    title varchar(48),
    author varchar(24), publicationYear int, totalPages int,
    msrp decimal
);

INSERT INTO students (id, title, author, publicationYear, totalPages, msrp) VALUES 
(1, 'Harry Potter and the Philosophers Stone', 'J. K. Rowling', 1992, 596, 14.00),
(2, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 1993, 696, 15.00),
(3, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 1994, 896, 24.00),
(4, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 1995, 1296, 34.00),
(5, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 1996, 1246, 15.00),
(6, 'Harry Potter and the Half Blood Prince', 'J. K. Rowling', 1997, 1222, 12.00);