<?php
include("../backend/connect.php");


session_start();

if(!isset($_SESSION['name'])){

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
<html lang="ar">

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
        <title>Document</title>
    <style>
      

        .container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            height: 150vh;
        }

        .section {
            background-color: #fff;
            border: 1px solid #28a44c;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* flex: 1 1 calc(48% - 20px); */
            min-width: 300px;
            height: 100vh;
        }
        .section-table{
            background-color: #fff;
            border: 1px solid #28a44c;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* flex: 1 1 calc(48% - 20px); */
            min-width: 300px;
            height: 65%;


        }
        .section-payment{
            background-color: #fff;
            border: 1px solid #28a44c;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* flex: 1 1 calc(48% - 20px); */
            min-width: 300px;
            height: 30%;

        }

        .section-table h4, .section-payment h4 {
            color: #000;
            font-size: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid #28a44c;
            padding-bottom: 5px;
        }

        input[type="text"],
        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #28a44c;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        .confirm-btn {
            background-color: #28a44c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .confirm-btn:hover {
            background-color: #28a44c;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #28a44c;
            padding: 10px;
            text-align: center;
        }

        .cart-table th {
            background-color: #28a44c;
            color: #fff;
        }

        .cart-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .cart-actions button,.cart-actions a {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }

        .cart-actions .remove {
            background-color: #dc3545;
        }

        .cart-actions .update {
            background-color: #007bff;
        }

        img {
            width: 60px;
            height: auto;
            border-radius: 5px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        @media (max-width: 768px) {
            .section {
                flex: 1 1 100%;
                margin-bottom: 20px;
            }

            .header {
                font-size: 32px;
                padding: 15px 0;
            }

            .cart-table img {
                width: 50px;
            }

            .confirm-btn {
                font-size: 14px;
                padding: 8px 16px;
            }
        }

        @media (max-width: 480px) {
            .header {
                font-size: 28px;
            }

            .cart-actions button {
                padding: 5px;
                font-size: 12px;
            }

            input[type="text"],
            select,
            input[type="number"] {
                font-size: 14px;
                padding: 8px;
            }

            .confirm-btn {
                font-size: 12px;
                padding: 6px 12px;
            }
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
              <a href="#">Setting</a>
              <a href="#">Send a Gift</a>
              <a href="#">Blog</a>
            </nav>
          </div>
        </div>
        <hr />
        <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
        <div class="mid-header">
          <div class="col1">
            <a href="index.html" style="color: #28a44c">
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
          <div class="search-container">
            <div class="search-box">
              <input id="input" onfocus="focus()" type="search" class="form-control" placeholder="Search here for plant" />
              <i class="fas fa-search" style="
                      position: absolute;
                      right: 10px;
                      top: 70%;
                      transform: translateY(-50%);
                    "></i>
            </div>
            <div class="list">
    
            </div>
    
          </div>
          <div class="icons-account">
          <button type="button" class="btn btn-white position-relative">
          <i style="color:#28a44c" class="fas fa-shopping-cart"></i>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    99+
    <span class="visually-hidden">unread messages</span>
  </span>
</button>
          <div class="shop-cart">
                                <a href="pay.html"><i class="fas fa-shopping-cart"></i></a>
                               <span><?php 
    
    $sql="Select cart_id from cart where user_id =$user_id";
    $result=mysqli_query($conn,$sql);
                               $row=mysqli_fetch_assoc($result);
                               $cart_id=$row['cart_id'];
                               $sql="Select count(*) as total_count from cart_item where cart_id=$cart_id";
                               $result=mysqli_query($conn,$sql);
    
                               $row=mysqli_fetch_assoc($result);
                            $total_count=$row['total_count'];
                               echo $total_count;
                               
                               ?> </span> 
                            </div>         <a href="favorates.html"><i class="fas fa-heart"></i></a>
            <a href="auth/login.php"><i class="fas fa-user"></i></a>
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
              header("Location: auth/login.php");
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
                    <a class="nav-link" id="home" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="IndoorPlants" href="products.html">Indoor Plants</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="OutdoorPlants" href="products.html">
                      Outdoor Plants</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="AgriculturalSupplies" href="products.html">Agricultural Supplies</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="about" href="about.html">About</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
    
        <hr style="margin: 0" />
      </header>

    <div class="container">
        <!-- قسم تسجيل الدخول -->
        <!-- <div class="section">
            <h4>Login or Sign up</h4>
            <label>
                <input type="radio" name="auth" checked> Sign up
            </label>
            <label>
                <input type="radio" name="auth"> Login
            </label>
            <input type="text" placeholder="Please enter the discount voucher code">
            <button class="confirm-btn">Send</button>
        </div> -->

        <!-- المعلومات الشخصية -->
        <!-- <div class="section">
            <h4>Personal Information</h4>
            <input type="text" placeholder="First Name*">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Phone Number*">
            <input type="text" placeholder="Spare phone number">
        </div> -->

        <!-- سلة التسوق -->
        <div class="section-table">
            <h4>Shopping Trolley</h4>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                            $category_id=$row2['category_id'];
                            $sql="select name from category where category_id=$category_id";
                            $result3=mysqli_query($conn,$sql);
                            $row3=mysqli_fetch_assoc($result3);
                            $category_name=$row3['name'];

                            echo '
                            <tr>
                            <td><img src="img/plant-image/'.$image.'" alt="Product"></td>
                        <td>'.$name.'</td>
                        <td>'.$category_name.'</td>
                        <td>
                            <div class="cart-actions">
                                <a href="?remove='.$cart_item_id.'" class="remove">X</a>
                                <button class="update">↻</button>
                                <input type="text" value="'.$quantity.'" style="width: 50px;" readonly>
                            </div>
                        </td>
                        <td>₪'.$price.'</td>
                        <td>₪'.$total_price.'</td>
                            </tr>
                            
                            
                            
                            
                            ';



                        }




?>
                        <!-- <td><img src="c:\Users\DELL\Desktop\2.png" alt="Product"></td>
                        <td>Product</td>
                        <td>Indoor Plant</td>
                        <td>
                            <div class="cart-actions">
                                <button class="remove">X</button>
                                <button class="update">↻</button>
                                <input type="number" value="1" min="1" style="width: 50px;">
                            </div>
                        </td>
                        <td>₪45.00</td>
                        <td>₪45.00</td> -->
                    
                </tbody>
            </table>
            <p>Total: ₪
   
             <?php 
              $sql="Select*from cart_item where cart_id=$cart_id";  
              $result2=mysqli_query($conn,$sql);
              $amount=0;
              while($row=mysqli_fetch_assoc($result2)){
             $amount+=$row['price'];

              }
              
             echo $amount;
                      ?>
            </p>
            <p>Final Total: ₪  <?php 
              $sql="Select*from cart_item where cart_id=$cart_id";  
              $result2=mysqli_query($conn,$sql);
              $amount=0;
              while($row=mysqli_fetch_assoc($result2)){
             $amount+=$row['price'];

              }
              
             echo $amount;
                      ?>
            </p></p>
        </div>

        <!-- عنوان الدفع -->
         
        <div class="section-payment">
            <h4>Payment Address</h4>
            <form method="POST" action="confirm_order.php">
    <label for="address_id">Select Address:</label>
    <select id="address_id" name="address_id" required>
        <option value="" disabled selected>Choose an address</option>
        <?php
        $sql = "SELECT * FROM address WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $address_id = $row['address_id'];
            $city = $row['city'];
            $street = $row['street'];
            $pin_code = $row['pin_code'];
            echo "<option value='$address_id'>$city, $street, $pin_code</option>";
        }
        ?>
    </select>
    <button class="confirm-btn">Order Confirmation</button> 
    </form>
<!-- 
            <select>
                <option>Please select...</option>
                <option>Jerusalem</option>
                <option>Jenin</option>
                <option>Tulkarm</option>
                <option>Qalqilya</option>
                <option>Nablus</option>
                <option>Ramallah</option>
                <option>Hebron</option>
                <option>Bethlehem</option>
                <option>Jericho</option>
                <option>Occupied Palestinian Territory</option>
            </select>
            <input type="text" placeholder="Address*">
            <label>
                <input type="checkbox"> My shipping address and payment address match
            </label>
            <button class="confirm-btn">Order Confirmation</button> -->
        </div>
    </div>
</body>

</html>