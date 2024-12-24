<?php 
include("../../backend/connect.php");

session_start();

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="../header.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

   <!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="../img/icon.png" >

    <title>GHORSA</title>
   
    
</head>

<body>
    <header>
        <!-- <h1> ايقونات المواقع التواصل مع اللينكات الطرفية</h1> -->
        <div class="iconlink" >
            <div class="icons">
                <a  href="#" ><i class="fas fa-phone"></i></a>
                <a  href="#" ><i class="fa-brands fa-facebook"></i></a>
                <a href="#" > <i class="fa-brands fa-instagram"></i></a>
            </div>

            <div>
                <nav class="link">
                    <a  href="#">Setting</a>
                    <a  href="#">Send a Gift</a>
                    <a  href="#">Blog</a>

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
                            <h4 style="margin-bottom: 0;margin-top: 0;  font-family: Marcellus SC; font-size: 45px;">GHORSA</h4>
                        </a>
                        
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="search-container">
                        <input type="search" class="form-control" placeholder="Search here for plant"
                            >
                        <i class="fas fa-search"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="icons-account">
                        <a  href="#" ><i class="fas fa-shopping-cart"></i></a>
                        <a  href="#" ><i class="fas fa-heart"></i></a>
                        <a  href="../auth/login.html" ><i class="fas fa-user"></i></a>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- <h1>شريط الواجهات الاخرى</h1> -->
        <div class="container-fluid " id="menuBar" style="padding-left: 18px; padding-top: 0; ">
            <nav  class="navbar navbar-expand-lg navbar-dark bg-white" style="padding-top: 0;" >
              <div class="container-fluid" >
                <button class="navbar-toggler" style="background-color: #28a44c; font-size: 12px; z-index: 1000;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav"style=" align-items: center;">
                  <ul class="navbar-nav me-auto" style="align-items: center;margin: 0;">
                    <li class="nav-item ">
                      <a class="nav-link"  id="home" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="indoorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Indoor Plants
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="indoorDropdown">
                        <li><a class="dropdown-item"  href="#">Small Indoor Plants</a></li>
                        <li><a class="dropdown-item"  href="#">Medium Indoor Plants</a></li>
                        <li><a class="dropdown-item" href="#">Large Indoor Plants</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"  href="#" id="outdoorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Outdoor Plants
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="outdoorDropdown">
                        <li><a class="dropdown-item" href="#">Flowering Plants</a></li>
                        <li><a class="dropdown-item" href="#">Shrubs</a></li>
                        <li><a class="dropdown-item" href="#">Trees</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"  href="#" id="suppliesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Agricultural Supplies
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="suppliesDropdown">
                        <li><a class="dropdown-item"  href="#">Fertilizers</a></li>
                        <li><a class="dropdown-item"  href="#">Pesticides</a></li>
                        <li><a class="dropdown-item"  href="#">Tools</a></li>
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
                    <h4>  <?php

echo "Welcome back , " . $_SESSION['name'];

?></h4>
                    <a href="main.php"  id="dashboard">Dashboard</a>
                
                    <div class="accordion" id="categoryAccordion">
                        <div class="accordion-item" style="border: none; background: none;">
                            <h2 class="accordion-header" id="headingCategory1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCategory1" aria-expanded="false"
                                    aria-controls="collapseCategory1" style="border: none; box-shadow: none; background: none; ">
                                    Plant
                                </button>
                            </h2>
                            <div id="collapseCategory1" class="accordion-collapse collapse"
                                aria-labelledby="headingCategory1">
                                <div class="accordion-body">
                                    <a  href="showAllPlants.html"  id="showAllPlants">Show All Plants</a>
                                    <a href="addNewPlants.php"  id="addNewPlant">Add new plant</a>

                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="accordion" id="categoryAccordion2">
                        <div class="accordion-item" style="border: none; background: none;">
                            <h2 class="accordion-header" id="headingCategory2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCategory2" aria-expanded="false"
                                    aria-controls="collapseCategory2" style="border: none; box-shadow: none; background: none; ">
                                    Category
                                </button>
                            </h2>
                            <div id="collapseCategory2" class="accordion-collapse collapse"
                                aria-labelledby="headingCategory2">
                                <div class="accordion-body">
                                    <a href="#" class="d-block">Show All Categories</a>
                                    <a href="addCategory.php" class="d-block">Add A New Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">Order</a>
                    <a href="Users.html">Users</a>
                    <a href="myProfile.html">My Profile</a>
                    <a href="#">Setting</a>
                </div>
                    <div id="content">
                        <h4 style="margin-bottom:15px ; margin-top: 20px; color: #000000; font-size: 20px;">Dashboard</h4>
                        <div class="row" style="  margin: 0%; padding: 0%; margin-bottom:50px ; margin-right: 50px">
                            <div class="con" style="display: flex; margin-right: 30px; gap: 15px;">
                                <div class="col-md-4  col-sm-4 col-xs-4">
                                    <div class="card  text-white"style="background-color: #28a44c;">
                                        <div class="card-body">
                                            <h5>Total Products</h5>
                                            <h2>100</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-4 col-xs-4">
                                    <div class="card text-white" style="background-color: #28a44c;">
                                        <div class="card-body">
                                            <h5>Total Orders</h5>
                                            <h2>100</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-4  col-xs-4">
                                    <div class="card  text-white"style="background-color: #28a44c;">
                                        <div class="card-body">
                                            <h5>Total Users</h5>
                                            <h2>

                                            <?php

                                            $sql= "SELECT COUNT(*) AS user_count FROM user";

                                            $result=  mysqli_query($conn, $sql);
                                           $row= mysqli_fetch_assoc($result);
                                           echo $row['user_count'];




?>


                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="recent-orders" style="margin-right: 50px; margin-left:10px">
                            <h5 style="margin-bottom:15px ; background-color:#28a44c; color: aliceblue;  padding: 10px 0 10px 10px; width: 100%;">Recent Order</h5>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>User Name</th>
                                        <th>Total Amount</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-red"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-orange"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
            
                                    <tr>
                                        <td>1</td>
                                        <td>9/12/2024</td>
                                        <td>Tojan Naiem</td>
                                        <td>500</td>
                                        <td><span class="status-dot status-green"></span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-warning btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                          </div>
        


    </main>
  
 

</body>

</html>