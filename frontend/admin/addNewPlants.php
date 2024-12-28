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
      <hr />
      <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
      <div class="mid-header">
        <div class="col1">
          <a href="index.html" style="color: #28a44c">
            <h4
              style="
                margin-bottom: 0;
                margin-top: 0;
                font-family: Marcellus SC;
                font-size: 45px;
              "
            >
              GHORSA
            </h4>
          </a>
        </div>
        <div class="search-container">
            <div class="search-box">
              <input
                id="input"
                onfocus="focus()"
                type="search"
                class="form-control"
                placeholder="Search here for plant"
              />
              <i
                class="fas fa-search"
                style="
                  position: absolute;
                  right: 10px;
                  top: 70%;
                  transform: translateY(-50%);
                "
              ></i>
            </div>
      <div class="list">

      </div>
       
        </div>
        <div class="icons-account">
          <a href=""><i class="fas fa-shopping-cart"></i></a>
          <a href="favorates.html"><i class="fas fa-heart"></i></a>
          <a href="auth/login.php"><i class="fas fa-user"></i></a>
          
          <?php  
          ob_start(); 
          if(isset($_SESSION['name'])){
            echo '<form style="width:30%; height:70px" method="POST" action="">
            <button type="submit" name="logout" style="background-color: red; border-radius: 8px; padding: 5px; color: white;">Log Out</button>
        </form>';;
          }
          if(isset($_POST['logout'])){
            session_unset(); 
            session_destroy(); 
            header("Location: auth/login.php");
            exit;
          }
          
          
          ?> 
        </div>
      </div>
      <hr />
      <!-- <h1>شريط الواجهات الاخرى</h1> -->
      <div
        class="container-fluid"
        id="menuBar"
        style="padding-left: 18px; padding-top: 0"
      >
        <nav
          class="navbar navbar-expand-lg navbar-dark bg-white"
          style="padding-top: 0"
        >
          <div class="container-fluid">
            <button
              class="navbar-toggler"
              style="background-color: #28a44c; font-size: 12px"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse"
              id="navbarNav"
              style="align-items: center"
            >
              <ul
                class="navbar-nav me-auto"
                style="align-items: center; margin: 0"
              >
                <li class="nav-item">
                  <a class="nav-link" id="home" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="IndoorPlants" href="products.html"
                    >Indoor Plants</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="OutdoorPlants" href="products.html">
                    Outdoor Plants</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="AgriculturalSupplies"
                    href="products.html"
                    >Agricultural Supplies</a
                  >
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
    <form method="POST"  class="plant-form" action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>">

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
      <div class="plant-form">
      <input type="text" class="form-control" name="name" placeholder="Enter Name Of Plant*" required
            style="margin-top: 5px; box-shadow: none" />
         
          <label class="form-label">Select Category</label>
          <div class="second-line">
            <div>
            <select class="form-select" name="category">
            <?php
$sql = "SELECT name FROM category";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option>{$row['name']}</option>";
    }
} else {
    echo "<option>No Categories Found</option>";
}




?>

            </select>
            </div>
            <div class="quantity">
            <input type="number" id="number" name="quantity" value="1" min="1" style="margin-top:20px; width:30% ; padding-left:5px" />

            </div>
         </div>
          

          <input type="text" class="form-control" name="color" placeholder="Enter Color Of Pot " required
            style="box-shadow: none;margin-bottom:10px" />

          <input type="text" class="form-control" name="price" placeholder="Enter Price Of Plant" required
            style="box-shadow: none;margin-bottom:10px" />

          <textarea class="form-control"  name="description" placeholder="Enter Description Of Plant"
            required style="box-shadow: none;margin-bottom:10px"></textarea>

          <textarea class="form-control"  name="plantCare" placeholder="Enter How to Care Of Plant"
            style="box-shadow: none;margin-bottom:10px"></textarea>

        <button name="submit" type="submit" >
          Add a new Plant
        </button>


      </div>
         
      </form>
      </div>
      <?php
      if(isset($_POST['submit'])){
        $plant_image=filter_input(INPUT_POST,"plant_image",FILTER_SANITIZE_SPECIAL_CHARS);
        $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
        $category=filter_input(INPUT_POST,"category",FILTER_SANITIZE_SPECIAL_CHARS);
        $color=filter_input(INPUT_POST,"color",FILTER_SANITIZE_SPECIAL_CHARS);
        $price=filter_input(INPUT_POST,"price",FILTER_SANITIZE_SPECIAL_CHARS);
        $description=filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);
        $plantCare=filter_input(INPUT_POST,"plantCare",FILTER_SANITIZE_SPECIAL_CHARS);
        $quantity=filter_input(INPUT_POST,"quantity",FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "SELECT category_id FROM category WHERE name = '$category'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $id=$row['category_id'];
      $sql="insert into product(name,price,description,plant_care,image,pot_color,stock,category_id) values('$name','$price','$description','$plantCare','$plant_image','$color','$quantity','$id')";
      mysqli_query($conn, $sql);




      }






?>
  
           

            
      


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