CREATE DATABASE ghorsa;


USE ghorsa;
USE ghorsa;

CREATE TABLE category(
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(100) NOT NULL,
    name VARCHAR(30) NOT NULL
);

CREATE TABLE product(
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(500),
    plant_care VARCHAR(300),
    image VARCHAR(100) NOT NULL,
    pot_color VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0 CHECK(stock >= 0),
    category_id INT,
    FOREIGN KEY (category_id) 
        REFERENCES category(category_id) 
        ON DELETE CASCADE
);

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    role_id INT,
    FOREIGN KEY (role_id) 
        REFERENCES roles(id) 
        ON DELETE CASCADE
);

CREATE TABLE address(
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    country VARCHAR(20) NOT NULL,
    city VARCHAR(20) NOT NULL,
    street VARCHAR(100),
    pin_code INT NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) 
        REFERENCES user(user_id) 
        ON DELETE CASCADE
);

CREATE TABLE order_table(
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    order_amount DECIMAL(10,2) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_method VARCHAR(50) DEFAULT 'Cash on Delivery',
    status VARCHAR(20) DEFAULT 'Pending' CHECK(status IN ('Pending', 'Completed', 'Shipped')),
    user_id INT,
    address_id INT,
    FOREIGN KEY (user_id) 
        REFERENCES user(user_id) 
        ON DELETE CASCADE,
    FOREIGN KEY (address_id) 
        REFERENCES address(address_id) 
        ON DELETE CASCADE
);

CREATE TABLE cart(
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    FOREIGN KEY (user_id) 
        REFERENCES user(user_id) 
        ON DELETE CASCADE
);

CREATE TABLE cart_item(
    cart_item_id INT PRIMARY KEY AUTO_INCREMENT,
    cart_id INT,
    price DECIMAL(10,2),
    product_id INT,
    quantity INT NOT NULL DEFAULT 0 CHECK(quantity >= 0),
    FOREIGN KEY (cart_id) 
        REFERENCES cart(cart_id) 
        ON DELETE CASCADE,
    FOREIGN KEY (product_id) 
        REFERENCES product(product_id) 
        ON DELETE CASCADE
);

CREATE TABLE user_favorites (
    favorite_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) 
        REFERENCES user(user_id) 
        ON DELETE CASCADE,
    FOREIGN KEY (product_id) 
        REFERENCES product(product_id) 
        ON DELETE CASCADE,
    UNIQUE (user_id, product_id)
);
