CREATE DATABASE php_project_os42;

use php_project_os42;

CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT ,
    user_email varchar(255) NOT NULL,
    passowrd  varchar(255),
    PRIMARY KEY (user_id)
);

CREATE TABLE tokens (
    token_id INT NOT NULL AUTO_INCREMENT ,
    remember_me_token varchar(255) NOT NULL,
    PRIMARY KEY (token_id)
);

CREATE TABLE products(
	file_name varchar(255) NOT NULL ,
    product_name varchar(255) NOT NULL ,
    product_id int NOT NULL AUTO_INCREMENT ,
    PRIMARY KEY (product_id)
);

CREATE TABLE orders (
    order_id INT NOT NULL AUTO_INCREMENT ,
    order_date date NOT NULL,
    downnload_Count INT NOT NULL,
    user_id INT NOT NULL,
   product_id int NOT NULL  ,
    PRIMARY KEY (order_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id)
);

show tables;

select * from users;
select * from tokens;
select * from products;
select * from orders;