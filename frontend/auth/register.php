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
    <link rel="icon" href="../img/icon.png" />

<title>GHORSA</title>
    <style>
        a{
            text-decoration: none;
        }
           body {
    background-color: #f8f9fa;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
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
  margin-top: 40%;
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
    text-decoration: none;


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
    text-decoration: none;

}
.account a{
    margin-bottom: 15px;
    color: #28a44c;
    transform: 0.5s;
    margin-left: 5px;
    text-decoration: none;
}
.account a:hover{
    transform: scale(1.01);
}

    </style>
</head>

<body>
    
    <div class="login-container">
        <h3>Register</h3>
        <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>" >
     

                <label for="text" >Username</label>
                <input type="text" class="form-control"  name="username" id="text" placeholder="Your Username" required
                    style="box-shadow: none;">
  
                <label for="email" >Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required
                    style="box-shadow: none;">
                <label for="password" >Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required
                        style="box-shadow: none; border-radius: 5px;">
                    </button>
             
            <input type="submit" name="submit"  class="btn" style="background-color:  #28a44c;color: white;" value="Register">
        </form>

        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            echo"ggkaslj";
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
                 header('location:../user/main.php');
                
                
            }
           catch(mysqli_sql_exception $e){
            echo $sql;

            echo "This email is using before";
           }
        }
        }
        
        ?>
       
        <div class="account" >
            <p>Already have account? </p>
            <a href="login.php" >Click to Login</a>
        </div>
        <div class="return">
        <a href="../index.php" >return to home page</a>

        </div>
    </div>


</body>




</html>