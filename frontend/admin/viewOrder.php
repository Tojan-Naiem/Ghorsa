<?php
include("../../backend/connect.php");

session_start();

if(!isset($_SESSION['name'])){

  echo $_SESSION['name'];
   header('location:../auth/login.php');
   exit();
}
$user_id=$_SESSION['user_id'];
if (isset($_GET['i'])) {
    $order_id = $_GET['i'];
    $sql = "SELECT * FROM order_table WHERE order_id = $order_id";

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $order_amount=$row['order_amount'];
        $status=$row['status'];
        $user_id=$row['user_id'];
        $address_id=$row['address_id'];
        $sql_product_detalis="Select cart_id from cart where user_id=$user_id";
        $result_product_detalis=mysqli_query($conn,$sql_product_detalis);
        $row = mysqli_fetch_assoc($result_product_detalis);
        $cart_id=$row['cart_id'];

    



    } else {
        echo 'Address not found.';
    }
}

?> 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="../header.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <title>Document</title>
    <style>
        #title{
            background-color: #28a44c;
            color: white;
        }
        form{
            height: 40%;
            display: flex;
            flex-direction: column;
        }
       
       .content{
        width: 100%;
        height: 150vh;

       }
       .space{
        width: 100%;
       }


        .order-container {
            width: 100%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        .section {
            margin-top: 20px;
        }

        .section h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .order-details {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th,
        .order-details td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }


        .product-row {
            display: flex;
            align-items: center;
        }

        .product-row img {
            width: 10%;
            height: 10%;
            border-radius: 10px;
            margin-right: 10px;
        }

        .total-price,
        .payment-method,
        .status {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .status {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        select {
            margin-left: 10px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .update-btn {
            display: block;
            width: 20%;
            margin-top: 20px;
            margin-right: 50px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .order-container {
                width: 100%;
            }

            .product-row img {
                width: 20%;
                height: 20%;
            }

            .update-btn {
                width: 50%;
                margin-left: 25%;
            }

            .section h3 {
                font-size: 16px;
            }

            .total-price,
            .payment-method {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .order-container {
                width: 100%;
                padding: 10px;
            }

            .product-row img {
                width: 30%;
                height: 30%;
            }

            .update-btn {
                width: 60%;
                margin-left: 20%;
            }

            .section h3 {
                font-size: 14px;
            }

            .total-price,
            .payment-method {
                font-size: 12px;
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
                        <a href="../auth/login.html"><i class="fas fa-user"></i></a>

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
                                <a class="nav-link" id="home" href="../index.html">Home</a>
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
                                <a class="nav-link" id="about" href="../about.html">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <hr style="margin: 0;">

    </header>
    <main>


    <div class="sidebar">
        <h4>
          <?php
  
          echo "Welcome back , " . $_SESSION['name'];
  
          ?>
        </h4>
        <a href="main.php" id="dashboard">Dashboard</a>
  
        <div class="accordion" id="categoryAccordion">
          <div class="accordion-item" style="border: none; background: none;">
            <h2 class="accordion-header" id="headingCategory1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseCategory1" aria-expanded="false" aria-controls="collapseCategory1"
                style="border: none; box-shadow: none; background: none; ">
                Plant
              </button>
            </h2>
            <div id="collapseCategory1" class="accordion-collapse collapse" aria-labelledby="headingCategory1">
              <div class="accordion-body">
                <a href="showAllPlants.php" id="showAllPlants">Show All Plants</a>
                <a href="addNewPlants.php" id="addNewPlant">Add new plant</a>
  
              </div>
            </div>
          </div>
        </div>
  
        <div class="accordion" id="categoryAccordion2">
          <div class="accordion-item" style="border: none; background: none;">
            <h2 class="accordion-header" id="headingCategory2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseCategory2" aria-expanded="false" aria-controls="collapseCategory2"
                style="border: none; box-shadow: none; background: none; ">
                Category
              </button>
            </h2>
            <div id="collapseCategory2" class="accordion-collapse collapse" aria-labelledby="headingCategory2">
              <div class="accordion-body">
                <a href="showAllCategory.php" class="d-block">Show All Categories</a>
                <a href="addCategory.php" class="d-block">Add A New Category</a>
              </div>
            </div>
          </div>
        </div>
        <a href="allOrders.php">Order</a>
        <a href="users.php">Users</a>
        <a href="myProfile.php">My Profile</a>
        <a href="setting.php">Setting</a>
      </div>
        <div class="content">
                            <div class="space">
                                <div class="order-container" style="border: 1px solid #eee;">

                                    <div class="order-details">
                                        <h3>Order Details</h3>
                                        <table class="order-details">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: left;">Products</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                        $sql="Select * from cart_item where cart_id=$cart_id";
                                                        $result=mysqli_query($conn,$sql);
                                                        while($row=mysqli_fetch_assoc($result)){
                                                            $product_id=$row["product_id"];
                                                            $quantity=$row["quantity"];
                                                            $total_price=$row["price"];
                                                            $sql="Select*from product where product_id=$product_id";  
                                                            $result2=mysqli_query($conn,$sql);
                                                            $row2=mysqli_fetch_assoc($result2);
                                                            $image=$row2['image'];
                                                            $name=$row2['name'];
                                                           

                                                            echo ' 
                                                             <tr>
                                                    <td>
                                                        <div class="product-row">
                                                            <img src="../img/plant-image/'.$image.'" alt="Product Image">
                                                            <h4>'.$name.'</h4>
                                                        </div>
                                                    </td>
                                                    <td>'.$total_price.'</td>
                                                    <td>'.$quantity.'</td>
                                                </tr>
                                                            
                                                            
                                                            
                                                            ';



  

                                                        }



                                                ?>
                                               
                                              
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="section">
                                        <p class="total-price">Total Price:<span style="float: right;">
                                        <?php 
              $sql="Select*from cart_item where cart_id=$cart_id";  
              $result2=mysqli_query($conn,$sql);
              $amount=0;
              while($row=mysqli_fetch_assoc($result2)){
             $amount+=$row['price'];

              }
              
             echo $amount;
                      ?>


                                        </span></p>
                                        <hr>
                                        <p class="payment-method">Payment Method: <span style="float: right;">
                                        Cash on Delivery</span></p>
                                        <hr>
                                    </div>
                                    <form method="POST" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>">


                                    <div class="section status">
                                        <label for="status">Status: </label>
                                        <select id="status" name="status">
                                            <option value="Pending">Pending</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="submit" value="Update Status" class="update-btn">

                                    </form>
                                    <?php 
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$sql="update order_table set status='$status' where order_id=$order_id";
$result=mysqli_query($conn,$sql);


                                    }
                                    

?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>