<?php
include("../../backend/connect.php");

session_start();

if(!isset($_SESSION['name'])){

  echo $_SESSION['name'];
   header('location:../auth/login.php');
   exit();
}
$user_id=$_SESSION['user_id'];

$sql="Select cart_id from cart where user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cart_id=$row['cart_id'];

if (isset($_GET['remove'])) {
    $cart_item_id = $_GET['remove'];

    $sql = "DELETE FROM cart_item WHERE cart_item_id = $cart_item_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cartStyle.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="css/style.css">



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
                    <a href="#">Setting</a>
                    <a href="#">Send a Gift</a>
                    <a href="#">Blog</a>

                </nav>
            </div>
        </div>
        <hr>
        <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
        <div class="container-fluid" id="navbarTitle">
            <div class="row">
                <div class="col-4 ">
                    <div class="col1">
                        <a href="#" style="color: #28a44c;">
                            <h4 style="margin-bottom: 0;margin-top: 0;  font-family: Marcellus SC; font-size: 45px;">
                                GHORSA</h4>
                        </a>

                    </div>
                </div>
                <div class="col-4 ">
                    <div class="search-container">
                        <input type="search" class="form-control" placeholder="Search here for plant">
                        <i class="fas fa-search"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="icons-account">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                        <a href="#"><i class="fas fa-user"></i></a>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- <h1>شريط الواجهات الاخرى</h1> -->
        <div class="container-fluid " id="menuBar" style="padding-left: 18px; padding-top: 0; ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-white" style="padding-top: 0;">
                <div class="container-fluid">
                    <button class="navbar-toggler" style="background-color: #28a44c; font-size: 12px; z-index: 1000;"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav" style=" align-items: center;">
                        <ul class="navbar-nav me-auto" style="align-items: center;margin: 0;">
                            <li class="nav-item ">
                                <a class="nav-link" id="home" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="indoorDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Indoor Plants
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="indoorDropdown">
                                    <li><a class="dropdown-item" href="#">Small Indoor Plants</a></li>
                                    <li><a class="dropdown-item" href="#">Medium Indoor Plants</a></li>
                                    <li><a class="dropdown-item" href="#">Large Indoor Plants</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="outdoorDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Outdoor Plants
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="outdoorDropdown">
                                    <li><a class="dropdown-item" href="#">Flowering Plants</a></li>
                                    <li><a class="dropdown-item" href="#">Shrubs</a></li>
                                    <li><a class="dropdown-item" href="#">Trees</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="suppliesDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Agricultural Supplies
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="suppliesDropdown">
                                    <li><a class="dropdown-item" href="#">Fertilizers</a></li>
                                    <li><a class="dropdown-item" href="#">Pesticides</a></li>
                                    <li><a class="dropdown-item" href="#">Tools</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="about" href="#">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <hr style="margin: 0;">

    </header>


    <main>


        <div class="left-side">

            <div class="sidebar">
                <h4>UserName</h4>
                <a href="main.html" ><i class="fa fa-user me-2"></i> My Profile</a>
                <a href="favourite.html"><i class="fa fa-heart me-2"></i> Wish List</a>
                <a href="myCart.html" style="background-color: #28a44c; color: white;"><i class="fa fa-shopping-cart me-2"></i> My Cart</a>
                <a href="myOrders.html"><i class="fa fa-box me-2"></i> My Order</a>
            </div>

          </div>
            <div class="order-container">
                <h3>My Cart</h3>
                <h4 >Order Details</h4>
                <hr style="width: 100%; ">
                <table class="table table-borderless order-details border-bottom">
                    <thead class="border-bottom">
                        <tr>
                           
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>

                           

                        </tr>

                    </thead>
                    <tbody>

                    <?php
                   

$sql="Select*from cart_item where cart_id=$cart_id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $cart_item_id=$row["cart_item_id"];
    $product_id=$row['product_id'];
    $quantity=$row['quantity'];
    $total_price=$row['price'];
    $sql="Select*from product where product_id=$product_id";  
    $result2=mysqli_query($conn,$sql);
    $row2=mysqli_fetch_assoc($result2);
    $image=$row2['image'];
    $name=$row2['name'];
    $price=$row2['price'];
   
    echo ' 
            <tr class="border-bottom">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../img/plant-image/'.$image.'" alt="Plant" class="product-image me-2">
                                    <span>'.$name.'</span>
                                </div>
                            </td>
                            <td>'.$price.'</td>

                            <td>

                                    <input type="number" value="'.$quantity.'" class="form-control text-center mx-2" value="1"
                                        style="width: 60px; border: none;  background-color: #f0f0f0; box-shadow: none; background: none;">
                            
                                </td>
                            <td>
                                <a href="?remove='.$cart_item_id.'" class="delete-icon"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
    
    
    
    
    ';

}
?>

                    

              
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="total-price">Total Price :</span>
                    <span class="fs-5">
                    <?php 
              $sql="Select*from cart_item where cart_id=$cart_id";  
              $result2=mysqli_query($conn,$sql);
              $amount=0;
              while($row=mysqli_fetch_assoc($result2)){
             $amount+=$row['price'];

              }
              
             echo $amount;
                      ?>


                    </span>
                </div>
                <hr style="width: 100%; align-items: center;">
                <div class="text-center mt-4">
                    <a href="../pay.php" class="btn btn-confirmation " style="color: white; width: 30%; background-color: #28a44c;">Order Confirmation</a>
                </div>




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </main>


</body>

</html>