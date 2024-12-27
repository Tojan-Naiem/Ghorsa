<?php
include("../backend/connect.php");

session_start();

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE category_id = $category_id";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];

    } else {
        echo 'Category not found.';
    }
}


?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="header.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <link rel="icon" href="img/icon.png" />

    <title>GHORSA</title>

    <!-- إضافة CSS الخاصة بـ Slick -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- إضافة JS الخاصة بـ Slick -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <style>
        .products-cards {
            width: 100%;
            padding: 10px;
            display: flex;
            padding-right: 30px;
            flex-direction: column;
            justify-content: left;
            align-items: start;
            padding-top: 0;
        }

        .products-cards .heading {
            display: flex;
            margin-left: 18%;
        }

        .products-cards .heading h1 {
            font-size: 30px;
            padding: 0 20px 20px 20px;
        }

        .products-cards .heading a {
            position: absolute;
            right: 38px;
            text-decoration: none;
            color: black;
            border: 2px solid black;
            border-radius: 40px;
            padding: 2.2px 4.5px 2.2px 4.5px;
        }

        .products-cards .box-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            align-items: center;
            padding: 18px;
            width: 100%;
            margin-left: 18%;
        }

        @media screen and (max-width: 700px) {

            .products-cards .box-container {
                display: flex;
                flex-direction: column;
            }

            .filter {}

            .btn-group {
                width: 50%;
            }

            .btn-group button {
                width: 100%;
                font-size: 12px;
                text-align: center;
                padding: 5px;
                background-color: white;
                border: 0.5px solid #28a44c;
                color: black;
            }



        }

        .products-cards .box-container .box {
            border-radius: 15px;
            border: 1px solid rgb(201, 193, 193);
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            width: 200px;
            height: 250px;
            margin-bottom: 5px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-bottom: 5px;

            transition: all 0.5s ease;
        }

        .box a {
            text-decoration: none;
            color: inherit;
        }

        .products-cards .box-container .box:hover {
            transform: scale(1.1);
            box-shadow: 0 0 2px var(--main-color);
        }

        .products-cards .box-container .box .img2 {
            display: flex;
            justify-content: center;
            background-color: #d1d1d149;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .products-cards .box-container .box .img2 img {
            width: 100px;
            display: flex;
            padding-top: 15px;
            flex-wrap: wrap;
            flex-direction: row;
            font-family: "Tajawal";
        }

        .products-cards .box-container hr {
            margin: 0;
        }

        .products-cards .box-container .box .img2 .fa-heart {
            color: grey;
            margin-top: 10px;
            margin-left: 25px;
            position: absolute;
            right: 10px;
            border: 1px solid gray;
            border-radius: 70px;
            padding: 4px;
            font-size: 13px;
        }

        .products-cards .box-container .box .des {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            flex-wrap: wrap;
            background-color: white;
            margin: 0;
            padding-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 5px;
            flex-direction: row;
            margin-bottom: 15px;
        }

        .products-cards .box-container .desc {
            background-color: white;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .products-cards .box-container .box .des h5 {
            font-size: 15px;
            margin-bottom: 0;
        }

        .products-cards .box-container .box .des h6 {
            font-size: 15px;
            color: #1b5c2ddd;
            font-size: 15px;
            margin-bottom: 0;
        }

        .products-cards .box-container .box .icon2 {
            display: flex;
            justify-content: center;
            gap: 4px;
            background-color: white;
            margin-bottom: 0;
            position: relative;
            margin-bottom: 0;
            width: 100%;
            border-radius: 10px;
            background-color: var(--main-color);
            align-items: center;
        }

        .products-cards .box-container .box .icon2 a {
            text-decoration: none;
            outline: none;
            margin-right: 15px;
            color: white;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 0;
            margin-right: 0;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 8px rgb(0, 0, 0, 0.2);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--main-color);
            border-radius: 10px;
        }

        .filter {
            width: 15%;

        }


        main {
            display: flex;
            padding-top: 30px;
            padding-left: 30px;


        }

        .btn-group button {
            background-color: white;
            border: 0.5px solid #28a44c;
            color: black;
        }

        .btn-group button:hover {
            background-color: #28a44c;
            color: #f0f0f0;
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
                    <input id="input" onfocus="focus()" type="search" class="form-control"
                        placeholder="Search here for plant" />
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
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href="favorates.html"><i class="fas fa-heart"></i></a>
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
                        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link" id="AgriculturalSupplies" href="products.html">Agricultural
                                    Supplies</a>
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
        <div class="filter">
            <h5>
                <?php
                echo $name;

                ?>
            </h5>
            <hr>
            <h5> Pot Color </h5>
            <form method="POST" action="">
                <label>
                    <input type="checkbox" name="color[]"
                    
                    
                    value="Green">
                    green
                </label><br>
                <label>
                    <input type="checkbox" name="color[]" value="grey">
                    grey
                </label><br>
                <label>
                    <input type="checkbox" name="color[]" value="yellow">
                    yellow
                </label><br>
                <label>
                    <input type="checkbox" name="color[]" value="white">
                    white
                </label><br><br>

                <h5>Filter by Price</h5>
                <hr>
                <label><input type="checkbox" name="price[]" value="1-50">1-50</label><br>
                <br>
                <label><input type="checkbox" name="price[]" value="50-150">50-150</label><br>
                <br>
                <label><input type="checkbox" name="price[]" value="150-250">150-250</label><br>
             <br><br>
                <input type="submit" value="Filter" name="filter"
                    style="background-color: #28a44c; color: white; border: none; border-radius: 30px; padding: 10px 20px; margin-top: 15px; width: 100%;">
                    <input type="submit" name="remove-filter" value="Remove Filter"
                    style="background-color: #28a44c; color: white; border: none; border-radius: 30px; padding: 10px 20px; margin-top: 15px; width: 100%;">
            </form>
            <br>

        </div>






        <div class="products-container">

            <section class="products-cards">
                <div class="heading">
                    <h1>
                        <?php
                        echo $name;
                        ?>
                    </h1>

                </div>

                <div class="box-container">
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['filter'])) {

                        $color = isset($_POST['color']) ? $_POST['color'] : [];  
                        $price = isset($_POST['price']) ? $_POST['price'] : [];

                            $sql = "select * from product where ";

                        
                  
                        if(!empty($color)){
                            $sql .="( ";
                            for ($i = 0; $i < count($color); $i++) {
                                $sql .="pot_color = '{$color[$i]}'";
                                if($i!=count($color)-1){
                                    $sql .=' OR ';
                                }
                                    
                            }
                        $sql .=") ";

                        }
                        if(!empty($price)){

                            if(!empty($color)){
                                $sql.="and (";

                            }
                            else $sql .="(";
                            $first_price = $price[0];
                            
                            list($min_price, $max_price) = explode("-", $first_price);
                            if(count($price)!=1){
                                $last_price=end($price);
                                list($min_price2, $max_price2) = explode("-", $last_price);
    
                                $sql .="price between $min_price and $max_price2";
                            }
                            else {
                                $sql .="price between $min_price and $max_price";

                            }

                            $sql .=") ";


                        }
                       
                        $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row["name"];
                                    $image = $row["image"];
                                    $price = $row["price"];
                                    echo "
<div class=\"box\" onclick=\"goToPage()\">
        <div class=\"img2\">
            <img src=\"img/plant-image/$image\" alt=\"\">
            <a href=\"\" class=\"fa-regular fa-heart\"></a>
        </div>
        <hr>
        <div class=\"desc\">
            <div class=\"des\">
                <h5>$name</h5>
                <h6>$price<strong>₪</strong></h6>
            </div>
            <div class=\"icon2\">
                <a href=\"#\" >Add to Cart</a>
                <a href=\"\" style=\"padding-top: 3px;\"  class=\"fa-solid fa-cart-shopping \"></a>
            </div>

         </div>
            

    </div>

";

                                }
                            }
                            else if (isset($_POST['remove-filter'])) {

                                $sql = "select * from product";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row["name"];
                                    $image = $row["image"];
                                    $price = $row["price"];
                                    echo "
<div class=\"box\" onclick=\"goToPage()\">
        <div class=\"img2\">
            <img src=\"img/plant-image/$image\" alt=\"\">
            <a href=\"\" class=\"fa-regular fa-heart\"></a>
        </div>
        <hr>
        <div class=\"desc\">
            <div class=\"des\">
                <h5>$name</h5>
                <h6>$price<strong>₪</strong></h6>
            </div>
            <div class=\"icon2\">
                <a href=\"#\" >Add to Cart</a>
                <a href=\"\" style=\"padding-top: 3px;\"  class=\"fa-solid fa-cart-shopping \"></a>
            </div>

         </div>
            

    </div>

";

                            }
                        
                            }
                        }
                            else {
                                $sql = "select * from product ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row["name"];
                                    $image = $row["image"];
                                    $price = $row["price"];
                                    echo "
<div class=\"box\" onclick=\"goToPage()\">
        <div class=\"img2\">
            <img src=\"img/plant-image/$image\" alt=\"\">
            <a href=\"\" class=\"fa-regular fa-heart\"></a>
        </div>
        <hr>
        <div class=\"desc\">
            <div class=\"des\">
                <h5>$name</h5>
                <h6>$price<strong>₪</strong></h6>
            </div>
            <div class=\"icon2\">
                <a href=\"#\" >Add to Cart</a>
                <a href=\"\" style=\"padding-top: 3px;\"  class=\"fa-solid fa-cart-shopping \"></a>
            </div>

         </div>
            

    </div>

";
                            }
                        }
                   
    


              ?>   






            </section>
        </div>


    </main>


</body>

</html>