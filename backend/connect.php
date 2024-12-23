<?php

$host="localhost";
$username="root";
$password="";
$dbname="ghorsa";

$conn=mysqli_connect($host,$username,$password,$dbname);

// $create_table_query="
// CREATE TABLE user_favorites (
//     favorite_id INT PRIMARY KEY AUTO_INCREMENT,
//     user_id INT NOT NULL,                     
//     product_id INT NOT NULL,                  
//     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
//     FOREIGN KEY (user_id) REFERENCES user(user_id), 
//     FOREIGN KEY (product_id) REFERENCES product(product_id), 
//     UNIQUE (user_id, product_id)               
// );



// ";

?>