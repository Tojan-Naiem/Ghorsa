<?php
include("../../backend/connect.php");
session_start();

if (isset($_SESSION['user_id'])) {
    if($_SESSION['role_id']==1){
        header('location:../admin/main.php');
    
    
    }
    else {
        header('location:../user/main.php');
    
    }    exit;
} 



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
        <link rel="icon" href="../img/icon.png" />

<title>GHORSA</title>
    <style>
        body {
    background-color: #f8f9fa;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: none;
}
h3{
    width: 20%;
    margin-bottom: 30px;
    border-bottom: 3px solid #28a44c;
}
.login-container {
    width: 30%;
    padding: 20px;
    background: #ffffff;
    border-radius: 10px;
    border: 2px solid #d1d1d146;
  margin-top: 30%;
  margin-left: 30%;
    transform: translate(-50% , -60%);
}


.login-container .btn {
    width: 100%;
    color: #28a44c;
    border-radius: 20px;
    transition: 0.5s;
    margin: 5px;
}
.login-container button:hover{
   transform: scale(1.05);
   letter-spacing:2 ;
}

.return {
    margin-top: 10px;
    text-align: center;
    font-size: 12px;
    color: gray;
    font-weight: 700;
    width: 100%;

}
.return a{
    color: black;
}

label{
    margin-bottom: 10px;
}
input{
    margin-bottom: 10px;
}
.account{
    margin-top: 15px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.account a{
    margin-bottom: 15px;
    color: #28a44c;
    transform: 0.5s;
    margin-left: 5px;
}
.account a:hover{
    transform: scale(1.01);
}

    </style>
</head>

<body>
    <div class="login-container">
        <h3 >Login</h3>
        <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <label for="email" >Email Address</label>
                <input style="text-transform: none;" type="email" name="email" class="form-control" id="email" placeholder="Your Email" required
                    style="box-shadow: none;">
                <label for="password" >Password</label>
                    <input   style="text-transform: none;"type="password"  class="form-control" name="password"  id="password" placeholder="Enter Your Password" required
                        style="box-shadow: none; border-radius: 5px;">
            
            <button type="submit" class="btn" style="background-color: #28a44c; color: white;">Log in</button>
        </form>

        <?php


$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($password)||empty($email)){
echo"Please Enter your password/email";
}
else {
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql="Select*From user WHERE email='$email'";
    $result= mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $user=mysqli_fetch_assoc($result);
        if(password_verify($password,$user['password'])){
            echo"11";
            $_SESSION['name']=$user['name'];
            $_SESSION['user_id']=$user['user_id'];
            $_SESSION['role_id']=$user['role_id'];
            $_SESSION['phone']=$user['phone'];
            $_SESSION['email']=$user['email'];
            if($_SESSION['role_id']==1){
                header('location:../admin/main.php');
            
            
            }
            else {
                header('location:../user/main.php');
            
            }
        }
        else {
            echo '<p style=color="red">Wrong Password</p>';
        }
    }


}



?>
        <div class="account" >
            <p  style="text-transform: none;">Don't have an account? </p>
            <a  style="text-transform: none;" href="register.php" >Click to Register</a>
        </div>
        <div class="return">
        <a  style="text-transform: none;" href="../index.php" >return to home page</a>

        </div>

    </div>


</body>




</html>