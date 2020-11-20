CREATE DATABASE galix;

USE galix;


CREATE TABLE soldier(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(80),
password VARCHAR(255),
curency INT );

CREATE TABLE products(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
product VARCHAR(80),
price INT );

CREATE TABLE items(
soldier_id INT,
FOREIGN KEY (soldier_id) REFERENCES soldier(id),
product_id INT,
FOREIGN KEY (product_id) REFERENCES products(id),
quantity INT );