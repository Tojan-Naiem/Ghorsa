<?php
include("../../backend/connect.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
    top: 50%;
    left: 50%;
    text-align: center;
    width: 80%;

    transform: translate(-50% , -60%);
}
.login-container .form-check-label {
    font-size: 0.9rem;
}
.login-container .btn {
    width: 100%;
    color: #28a44c;
    border-radius: 20px;
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
    text-decoration: none;

}
#return:hover{
    color:black;

}


    </style>
</head>

<body>
    
    <div class="login-container">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>" >
     

            <div class="mb-3">
                <label for="text" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="text" placeholder="Your Username" required
                    style="box-shadow: none;">
            </div>
            <div class="mb-3">
                <label for="email"  class="form-label">Email Address</label>
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
            
            </div> 
            <input type="submit" name="submit"  class="btn" style="background-color:  #28a44c;color: white;" value="Register">
        </form>

        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
            $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
            $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
           if(empty($username)||empty($password)||empty($email)){
            echo"Please Enter your name/ password/email";
           }
           else {
            $hash=password_hash($password,PASSWORD_DEFAULT);

            $sql = " INSERT INTO user (name, email, role_id,password) VALUES ('$username', '$email', '2','$hash')";
            try{
                mysqli_query($conn, $sql);
                echo"You are now Registed";
            }
           catch(mysqli_sql_exception $e){
            echo "This email is using before";
           }
        }
        }
        
        ?>
        <div class="text-center mt-3" style="display: grid; ">
            <p>Already have account?
            </p>
            <a href="login.html" class="link">Click to Login</a>
        </div>
        <a href="../index.html" id="return">return to home page</a>

    </div>


</body>




</html>