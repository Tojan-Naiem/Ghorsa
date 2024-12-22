<?php

$host="localhost";
$username="root";
$password="";
$dbname="ghorsa";

$connect_database=mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno())
{
    echo "not connected";
    exit;
}
else {
    echo "Connected";
}
$create_table_query="
CREATE TABLE user_favorites (
    favorite_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,                     
    product_id INT NOT NULL,                  
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id), 
    FOREIGN KEY (product_id) REFERENCES product(product_id), 
    UNIQUE (user_id, product_id)               
);



";
