 <?php
include("../../backend/connect.php");

session_start();

if (!isset($_SESSION['name'])) {

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
            <a href="../index.html" style="color: #28a44c;">
              <h4 style="margin-bottom: 0;margin-top: 0;  font-family: Marcellus SC; font-size: 45px;">GHORSA</h4>
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
            <a href="auth/login.html"><i class="fas fa-user"></i></a>

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
              <li class="nav-item ">
                <a class="nav-link" id="IndoorPlants" href="../products.html">Indoor Plants</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" id="OutdoorPlants" href="../products.html"> Outdoor Plants</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" id="AgriculturalSupplies" href="../products.html">Agricultural Supplies</a>
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
      <a href="main.php">Dashboard</a>

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
              <a href="showAllPlants.html" onclick="changeContant(showAllPlants)" id="showAllPlants">Show All Plants</a>
              <a href="addNewPlants.html" onclick="changeContant('addNewPlant')" id="addNewPlant">Add new plant</a>

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
              <a href="#" class="d-block">Show All Categories</a>
              <a href="#" class="d-block">Add A New Category</a>
            </div>
          </div>
        </div>
      </div>
      <a href="#">Order</a>
      <a href="Users.html">Users</a>
      <a href="myProfile.html">My Profile</a>
      <a href="#">Setting</a>
    </div>
    <div class="content">
      <div class="img">

        <img src="../img/Frame.png" alt="" /> <br />
        <label for="plant_image" class="form-label">Upload Image</label>
        <input type="file" name="plant_image" class="form-control" id="image" style="
      margin-left: 90px;
      box-shadow: none;
      border: none;
      background: none;
    " /> 




      </div>
      <form class="plant-form">
        <div class="mb-3">
          <input type="text" class="form-control" id="name" placeholder="Enter Name Of Plant*" required
            style="margin-top: 5px; box-shadow: none" />
        </div>
         
          <label class="form-label">Select Category</label>
          <div class="second-line">
          <div class="d-flex align-items-center">
            <select class="form-select me-0" id="category">
              <option selected>Category</option>
              <option selected>Indoor</option>
              <option selected>Outdoor</option>
            </select>
          </div>
        <div class="quantity">
                    <span id="plus" onclick="plus()" class="plus">+</span>
                    <span id="number">1</span>
                    <span id="minus" onclick="minus()"  class="minus">-</span>
                </div>
         </div>
          

        <div class="mb-3">
          <input type="text" class="form-control" id="color" placeholder="Enter Color Of Pot " required
            style="box-shadow: none" />
        </div>

        <div class="mb-3">
          <input type="text" class="form-control" id="price" placeholder="Enter Price Of Plant" required
            style="box-shadow: none" />
        </div>

        <div class="mb-3">
          <textarea class="form-control" rows="4" id="description" placeholder="Enter Description Of Plant"
            required style="box-shadow: none"></textarea>
        </div>

        <div class="mb-3">
          <textarea class="form-control" rows="4" id="plantCare" placeholder="Enter How to Care Of Plant"
            style="box-shadow: none"></textarea>
        </div>

        <button id="submit" type="submit" >
          Add a new Plant
        </button>
      </form>
      </div>
  
           

            
      


  </main>
  <script> 
  var i=1;
  function plus(){
    i++;
    document.getElementById('number').innerHTML=i;
  }
  function minus(){
    if(i==1){

    }
    else {
      i--;
      document.getElementById('number').innerHTML=i;
    }
  }


  </script>



</body>

</html>