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

        <link rel="icon" href="img/icon.png" >

    <title>GHORSA</title>
    <style>
        body {
    background-color: #f8f9fa;
}
.login-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 10px;
    border: 2px solid #d1d1d146;
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -60%);
}
.login-container .form-check-label {
    font-size: 0.9rem;
}
.login-container .btn {
    width: 100%;
    color: #28a44c;
    border-radius: 20px;
    transition: 0.5s;
}
.login-container .btn:hover{
   transform: scale(1.1);
   letter-spacing:2 ;
}
.login-container .link {
    color: #28a44c;
    text-decoration: none;
    transition: 0.5s ease;
}
.login-container .link:hover {
    transform: scale(1.05);
}
#return {
    margin-top: 10px;
    text-align: center;
    font-size: 12px;
    color: gray;
    font-weight: 700;

}
#return:hover{
    color:black;

}


    </style>
</head>

<body>
    <div class="login-container">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required
                    style="box-shadow: none;">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required
                        style="box-shadow: none; border-radius: 5px;">
                    <i class="bi bi-eye" style="color: #28a44c;"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3 form-check" style="display: flex; gap: 60px;">
                <div>
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="forgotPassword.html" class="link">Forgot your password?</a>
                </div>
            </div>
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
            $_SESSION['name']=$user['name'];
            $_SESSION['user_id']=$user['user_id'];
            $_SESSION['role_id']=$user['role_id'];
            $_SESSION['phone']=$user['phone'];
            $_SESSION['email']=$user['email'];
            if($_SESSION['role_id']==1){
                header('location:../admin/main.html');
            
            
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
        <div class="text-center mt-3" style="display: grid; ">
            <p>Don't have an account? </p>
            <a href="register.php" class="link">Click to Register</a>
        </div>
        <a href="../index.html" id="return">return to home page</a>

    </div>


</body>




</html>