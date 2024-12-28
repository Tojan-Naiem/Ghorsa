<?php
include("../backend/connect.php");

session_start();


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css.css" />
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

  <main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin: 0">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/bg_2.webp" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="img/bg_3.webp" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="img/bg_4.webp" class="d-block w-100" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <a href="https://wa.me/yourphonenumber" target="_blank" id="whatsapp-icon">
      <i class="fab fa-whatsapp"></i>
    </a>

    <div class="container" id="category-section">
      <h3 id="category-title">Category</h3>
      <div class="category-cards">
        <?php 

        $sql="Select*from category";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){

         $name=$row['name'];
         $image=$row['image'];
         $id=$row['category_id'];
         echo "
         <div class=\"category-card\">
          <a href=\"products.php?id=$id;\">
            <img src=\"img/$image\" alt=\"Indoor Plants\" class=\"img2left\" />
            <p>$name</p>
          </a>
        </div>
         ";






        }
        
        
        
        ?>
        

       
      </div>
    </div>

    <!-- قائمة المنتجات -->

    <section class="products-cards">
      <div class="heading">
        <h1>Our Most Popular Plants</h1>
      </div>

      <div class="box-container" id="card-product">

      <?php  

$sql="Select *from product";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  $name=$row['name'];
  $image=$row['image'];
  $price=$row['price'];
  $product_id=$row['product_id'];


  echo "
  <div class=\"box\" onclick=\"goToPage($product_id)\">
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



?>






      </div>

    </section>
    <section class="products-cards">
      <div class="heading">
        <h1>Our Resent Plants</h1>
      </div>

      <div class="box-container">
      <?php  

      $sql="Select *from product";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result)){
        $name=$row['name'];
        $image=$row['image'];
        $price=$row['price'];
  $product_id=$row['product_id'];


        echo "
        <div class=\"box\" onclick=\"goToPage($product_id)\">
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



?>



      </div>
    </section>
    <div class="descreption-section">
      <div class="descreption-cards">
        <div class="desc-card">
          <i class="fa-solid fa-circle-check"></i>
          <p>30-Day Guarantee</p>
        </div>
        <div class="desc-card">
          <i class="fa-solid fa-truck"></i>
          <p>Free shipping on all orders</p>
        </div>
        <div class="desc-card">
          <i class="fa-solid fa-seedling"></i>
          <p>Care guide included with each order</p>
        </div>
      </div>
    </div>
    <section class="products-cards">
      <div class="heading">
        <h1>Indoor Plants</h1>
      </div>

      <div class="box-container">
      <?php  

      $sql="Select*from category where name='Indoor Plants'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      $category_id=$row["category_id"];
$sql="Select *from product where category_id=$category_id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  $name=$row['name'];
  $image=$row['image'];
  $price=$row['price'];
  $product_id=$row['product_id'];

  echo "
  <div class=\"box\" onclick=\"goToPage($product_id)\">
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



?>



      </div>
    </section>

    <section class="products-cards">
      <div class="heading">
        <h1>Less than 50 shekil</h1>
      </div>

      <div class="box-container">
      <?php  

$sql="Select *from product where price<=50";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  $name=$row['name'];
  $image=$row['image'];
  $price=$row['price'];
  $product_id=$row['product_id'];


  echo "
  <div class=\"box\" onclick=\"goToPage($product_id)\">
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



?>



      </div>
    </section>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
      </div>
    </footer>

    <script >
       function goToPage(index) {
   
    window.location.href = "index2.php?i="+index;
    
    } 
    </script>
   
    <!-- <script>
        input=document.getElementById('input');
    
 


     </script> -->
  </main>
</body>

</html>