<?php

$host="localhost";
$username="root";
$password="";
$dbname="ghorsa";

$conn=mysqli_connect($host,$username,$password,$dbname);

$create_table_query="
CREATE TABLE order_table (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    order_amount DECIMAL(10,2) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'Pending' CHECK (status IN ('Pending', 'Completed', 'Shipped')),
    user_id INT,
    address_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (address_id) REFERENCES address(id)
);
 ";

?>