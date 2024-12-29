<?php
include("../backend/connect.php");
session_start();

$user_id = $_SESSION['user_id'] ;
$product_id = $_SESSION['product_id'] ;

if (!$user_id || !$product_id) {
    echo "Error: Missing user or product ID.";
    exit;
}

$sql = "INSERT INTO user_favorites (user_id, product_id) VALUES ($user_id, $product_id)";
if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
?>