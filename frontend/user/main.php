<?php

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
            <a href="auth/login.html"><i class="fas fa-user"></i></a>
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
                    <a class="nav-link" id="home" href="index.html">Home</a>
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

 
                  <div class="left-side">

                    <div class="sidebar">
                        <h4>UserName</h4>
                        <a href="main.php" style="background-color: #28a44c; color: white;"><i class="fa fa-user me-2"></i> My Profile</a>
                        <a href="favourite.html"><i class="fa fa-heart me-2"></i> Wish List</a>
                        <a href="myCart.html"><i class="fa fa-shopping-cart me-2"></i> My Cart</a>
                        <a href="myOrders.html"><i class="fa fa-box me-2"></i> My Order</a>
                    </div>

                  </div>
                   
                
                    <div class="profile-container">
                        <h3 class="form-title mb-4">My Profile</h3>
                        <a href="editProfieInfo.php"><i class="fa-regular fa-pen-to-square"></i></a>

                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label" >UserName</label>
                                <input type="text" class="form-control" id="username"  value="<?php echo htmlspecialchars($_SESSION['name']); ?>" placeholder="UserName"
                                    style="box-shadow: none;" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"  value="<?php echo htmlspecialchars($_SESSION['email']); ?>" placeholder="email@gmail.com"  style="box-shadow: none;"disabled>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone"  value="<?php echo htmlspecialchars($_SESSION['phone']); ?>" placeholder="phone number"
                                    style="box-shadow: none;"disabled>
                            </div>
                            <h5 class="form-title mb-3">Address</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City Name</label>
                                    <input type="text" class="form-control" id="city" placeholder="CityName"
                                        style="box-shadow: none;"disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street" class="form-label">Street Name</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street Name"
                                        style="box-shadow: none;"disabled>
                                </div>
                            </div>
                        </form>
                </div>
      

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </main>
</body>

</html>