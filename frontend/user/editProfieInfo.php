<?php

session_start();
include("../../backend/connect.php");

if(!isset($_SESSION['name'])){

  echo $_SESSION['name'];
   header('location:../auth/login.php');
   exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../header.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <title>Document</title>

    <style>
            .address-part{
        padding: 10px;
    border: 1px solid #28a44c;
    border-radius: 8px;
    margin-bottom: 10px;
}
    </style>
</head>

<body>
<header>
    <!-- <h1> ايقونات المواقع التواصل مع اللينكات الطرفية</h1> -->
    <div class="iconlink">
      <div class="icons">
        <a href="#"><i class="fas fa-phone"></i></a>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"> <i class="fa-brands fa-instagram"></i></a>
      </div>

      <div>
        <nav class="link">
          <a href="../setting.php">Setting</a>
         
        </nav>
      </div>
    </div>
    <hr />
    <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
    <div class="mid-header">
      <div class="col1">
        <a href="../index.php" style="color: #28a44c">
          <h4 style="
                margin-bottom: 0;
                margin-top: 0;
                font-family: Marcellus SC;
                font-size: 45px;
              ">
            GHORSA
          </h4>
        </a>
      </div>
      <div class="search-container" >
        <div class="search-box">
        <form class="form-inline" method="POST" action="index.php">
    <div class="input-group col-md-5">
        <input id="searchBox" type="text" class="form-control" placeholder="Search here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
        <span class="input-group-btn" >
            <button class="btn" style="background-color: #28a44c; color:white" name="search"> <i class="fas fa-search"></i></button>
        </span>
    </div>
</form>
        </div>
        <div class="list" id="suggestionsList">
    <?php
        if (isset($_POST['search'])) {
            $keyword = $_POST['keyword'];
            $query = mysqli_query($conn, "SELECT * FROM product WHERE name LIKE '%$keyword%'") ;
            while ($fetch = mysqli_fetch_array($query)) {
    ?>
        <div style="word-wrap:break-word;">
        <a href="../index2.php?i=<?php echo $fetch['product_id']; ?>">
        <h4 style="padding=10px"><?php echo $fetch['name']?></h4>
            </a>
        </div>
    <?php
            }
        }
    ?>
</div>

        </div>

     


      <div class="icons-account">
      <div class="shop-cart">
        <button type="button" onclick="goToCart()" class="btn btn-white position-relative">
            <i style="color:#28a44c"  class="fas fa-shopping-cart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php 
                if(isset($_SESSION['name'])){
                  if (!isset($user_id)) {
                    echo '0';
                } else {
                    $sql = "SELECT cart_id FROM cart WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $cart_id = $row['cart_id'];

                        $sql = "SELECT COUNT(*) AS total_count FROM cart_item WHERE cart_id = $cart_id";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $total_count = $row['total_count'];
                            echo $total_count; 
                        } else {
                            echo '0';  
                        }
                    } else {
                        echo '0'; 
                    }
                }
                }
               
                ?>
            </span>
        </button>
    </div>
       
 <a href="../favorites.php"><i class="fas fa-heart"></i></a>
        <a href="../auth/login.php"><i class="fas fa-user"></i></a>
        <?php
        ob_start();
        if (isset($_SESSION['name'])) {
          echo '<form method="POST" action="">
            <button type="submit" name="logout" style="background-color: red; border-radius: 8px; padding: 5px; color: white;">Log Out</button>
        </form>';
          ;
        }
        if (isset($_POST['logout'])) {
          session_unset();
          session_destroy();
          header("Location: ../index.php");
          exit;
        }


        ?>

      </div>
    </div>
    <hr />
    <div class="container-fluid" id="menuBar" style="padding-left: 18px; padding-top: 0">
      <nav class="navbar navbar-expand-lg navbar-dark bg-white" style="padding-top: 0">
        <div class="container-fluid">
          <button class="navbar-toggler" style="background-color: #28a44c; font-size: 12px" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" style="align-items: center">
            <ul class="navbar-nav me-auto" style="align-items: center; margin: 0">
              <li class="nav-item">
                <a class="nav-link" id="home" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="IndoorPlants" href="products.php?id=1">Indoor Plants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="OutdoorPlants" href="products.php?id=2">
                  Outdoor Plants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="AgriculturalSupplies" href="products.php?id=3">Agricultural Supplies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="about" href="../about.php">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <hr style="margin: 0" />
  </header>



    <main>

        
        <div class="left-side">

<div class="sidebar">
    <h4>user name</h4>
    <a href="main.php" style="background-color: #28a44c; color: white;"><i class="fa fa-user me-2"></i> My Profile</a>
    <a href="favourite.php"><i class="fa fa-heart me-2"></i> Wish List</a>
    <a href="myCart.php"><i class="fa fa-shopping-cart me-2"></i> My Cart</a>
    <a href="myOrders.php"><i class="fa fa-box me-2"></i> My Order</a>
</div>

</div>
             
                    <div class="profile-container">
                        <h3 class="form-title mb-4">My Profile</h3>
                        <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="mb-3">
                                <label for="username" class="form-label">UserName</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="UserName"
                                    style="box-shadow: none;">
                            </div>
                        
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="phone number"
                                    style="box-shadow: none;">
                            </div>
                            <h5 class="form-title mb-3">Address</h5>
                            <?php

                            
                            
                            
                            
                            
                            ?>
                            <div class="address-part">
                              <h5>Address 1</h5><br>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City Name</label>
                                    <input type="text" class="form-control" id="city" placeholder="CityName"
                                        style="box-shadow: none;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street" class="form-label">Street Name</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street Name"
                                        style="box-shadow: none;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street" class="form-label">Pin code</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street Name"
                                        style="box-shadow: none;">
                                </div>
                            </div>


                            </div>

                            <input type="submit" value="Update" name="submit" class="btn" style="width: 30%;color: white; background-color: #28a44c;">


                        </form>
                        <?php
                        if(isset($_POST['submit'])){

                          $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                          $phone=filter_input(INPUT_POST,"phone",FILTER_SANITIZE_SPECIAL_CHARS);
                          
                          if($username!=$_SESSION['name']&&$username!=null){
                            $user_id=$_SESSION['user_id'];
                   
                            $_SESSION['name'] = $username;
                            $sql="update user set name='$username' where user_id='$user_id'";
                            mysqli_query($conn, $sql);
                          }
                          if($phone!=$_SESSION['phone']){
                            $user_id=$_SESSION['user_id'];
                   
                            $_SESSION['phone'] = $phone;
                            $sql="update user set phone='$phone' where user_id='$user_id'";
                            mysqli_query($conn, $sql);
                          }
                          
                        }




                        


?>
                   
      
</div>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        function goToCart(){
          window.location.href="../pay.php";
        }

    const searchBox = document.getElementById("searchBox");
const suggestionsList = document.getElementById("suggestionsList");

    searchBox.addEventListener("blur", function() {
    suggestionsList.style.display = "none";
});
    </script>
    </main>


</body>

</html>