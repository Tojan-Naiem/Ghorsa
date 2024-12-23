<?php

include("connect.php");
echo "<pre>";
print_r($_POST);
echo "</pre>";

// اذا قام المستحدم بالنقر على زر ال register
if(isset($_POST['submit'])){
    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])){
        $name=stripcslashes( $_POST['username']);
        $password=stripcslashes($_POST['password']);
        $email= stripcslashes($_POST['email']);
     
    
    }
   
    $name=htmlentities(mysqli_real_escape_string($conn,$_POST['name']));
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $sql = "INSERT INTO users (name, email, role_id,password) VALUES ('$name', '$email', '2','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "User inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
     header('location:auth/register.html');


}



?>