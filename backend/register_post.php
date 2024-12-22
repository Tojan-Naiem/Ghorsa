<?php

include("connect.php");
// اذا قام المستحدم بالنقر على زر ال register
if(isset($_POST['submit'])){
    $name=stripcslashes( $_POST['username']);
    $password=stripcslashes($_POST['password']);
    $email= stripcslashes($_POST['email']);
 

    $name=htmlentities(mysqli_real_escape_string($conn,$_POST['name']));
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
 $sql="insert into user(name,email,role_id) values('$name','$email','2');
 ";
 mysqli_query($conn,$sql);
 header('location:auth/register.html');


}



?>