<?php
include("../backend/connect.php");


session_start();


if(!isset($_SESSION['name'])){

}
else $user_id=$_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutstyle.css">
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

        <link rel="icon" href="img/icon.png" >

    <title>GHORSA</title>
   
    
 

<!-- إضافة JS الخاصة بـ Slick -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


</head>
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
          <a href="setting.php">Setting</a>
         
        </nav>
      </div>
    </div>
    <hr />
    <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
    <div class="mid-header">
      <div class="col1">
        <a href="index.php" style="color: #28a44c">
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
    <div class="input-group">
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
        <a href="index2.php?i=<?php echo $fetch['product_id']; ?>">
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
       
 <a href="favorites.php"><i class="fas fa-heart"></i></a>
        <a href="auth/login.php"><i class="fas fa-user"></i></a>
        <?php
        ob_start();
        if (isset($_SESSION['name'])) {
          echo '<form method="POST" action="">
            <button id="logOutBtn" type="submit" name="logout" style="background-color: #dc3545; border-radius: 8px; padding: 5px; color: white; width:100px">Log Out</button>
        </form>';
          ;
        }
        if (isset($_POST['logout'])) {
          session_unset();
          session_destroy();
          header("Location: index.php");
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
                <a class="nav-link" id="home" href="index.php">Home</a>
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
                <a class="nav-link" id="about" href="about.php">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <hr style="margin: 0" />
        
 


        <div class="hero">
            <div class="first-part">
                <p>
                    Life in love with plants <img src="img/plantTop.png">
                </p>
                <p>180+<br>Plants in this world</p>
            </div>
            <div class="second-part">
                <img src="img/aboutashero_2.png">
            </div>
           
            <div class="third-part">
                    <p>
                    <span>  Welcome to <a href="index.html">Ghorsa</a> </span>, your one-stop shop for all things green! We are passionate about bringing nature closer to you through our collection of plants and accessories
                  </p>
                  <div class="desc">
                    <button>Show the shop </button>
                    <img src="img/plantTop.png"> 
                  </div>
                  <p>325+<br>Orders from this shop</p>
            </div>
        </div>

    </header>
    <main>
        <div class="descreption">
           
                <div class="descreption-cards">
                 <div class="desc-card">
                     <i class="fa-solid fa-circle-check"></i>
                     <p>30-Day Guarantee</p>
                 </div>
                 <hr>
                 <div class="desc-card">
                     <i class="fa-solid fa-truck"></i>
                     <p>Free shipping on all orders</p>
                 </div>
                 <hr>
                 <div class="desc-card">
                     <i class="fa-solid fa-seedling"></i>
                     <p>Care guide included with each order</p>
                 </div>
                 <hr>
                 <div class="desc-card">
                    <i class="fa-solid fa-gift"></i>
                    <p>You can send a gift</p>
                </div>
     
     
                </div>
     
     
        </div>


        <div class="journey-section">
            <h1>The journey of your new plant!</h1>
            <div class="first-part">
                <div class="journey-cards">
                    <div class="first-section">
                        <div class="desc-journey">
                            <p id="step-number">01.<br><hr></p>
                            <h3 id="step-title">Packing</h3>
                            <p id="step-descreption">Your order will be hand picked and packed in our strong and sustainable packaging as soon as possible!</p>
                        </div>
                        
                    </div>
                    <div class="first-section">
                        <div class="desc-journey">
                            <p>02.<br><hr></p>
                            <h3>Shipping</h3>
                            <p>Your order will be delivered straight from our greenhouse to your door by your chosen carrier. You can follow the journey of your plants via the tracking link you receive in your mail.</p>
                        </div>
                        <!-- <img src="img/shipping.png"> -->
                        
                    </div>
                    <img id="step-image" src="img/paking.png">

                
               </div>
            
                <div class="action">
                   
                    <button onclick="previous()"> <i class="fa-solid fa-angle-left"></i></button>
                    <p><span id="current-step">1</span>/3</p>
                    <button onclick="next()"><i class="fa-solid fa-angle-right"></i></button>
                </div>

               
    
            </div>
           
        </div>
        <div class="our-team" id="our-team">
            <div class="title">
              <h2>Our Team</h2>
            </div>
            <div class="team-members">
              <div class="card1">
                <div class="desc-team">
                  <h3>Tojan Naiem</h3>
                  <h6>CEO</h6>
                  <div class="contact-team">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-google"></i>
                  </div>
                </div>
              </div>
              <div class="card2">
                <div class="desc-team">
                  <h3>Tamara Tomeh</h3>
                  <h6>Manger</h6>
                  <div class="contact-team">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-google"></i>
                  </div>
                </div>
              </div>
              <div class="card3">
                <div class="desc-team">
                  <h3>Ruba abed</h3>
                  <h6>Manger</h6>
                  <div class="contact-team">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-google"></i>
                  </div>
                </div>
              </div>
            </div>
            
      
      
          </div>


          <div class="review" id="review">
            <h1>Reviews</h1>
            <div class="review-cards">
                <div class="review-card">
                    <i class="fa-solid fa-quote-left"id="quote"></i>
                    <h3>John Deo</h3>
                    <p>Lorem ipsum dolor, sit amet temporibus quae recusandae sit ea assumenda, corporis, suscipit voluptates minus molestias cupiditate natus blanditiis fugit magnam cum consequuntur architecto reprehenderit dolor soluta? Earum, facere nulla eveniet quia harum, blanditiis incidunt at sapiente explicabo ipsum laborum unde laudantium nostrum distinctio.</p>
                    <div class="review-section">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="review-card">
                    <i class="fa-solid fa-quote-left"id="quote"></i>
                    <h3>John Deo</h3>
                    <p>Lorem ipsum dolor, sit amet  recusandae sit ea assumenda, corporis, suscipit voluptates minus molestias cupiditate natus blanditiis fugit magnam cum consequuntur architecto reprehenderit dolor soluta? Earum, facere nulla eveniet quia harum, blanditiis incidunt at sapiente explicabo ipsum laborum unde laudantium nostrum distinctio.</p>
                    <div class="review-section">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="review-card">
                    <i class="fa-solid fa-quote-left"id="quote"></i>
                    <h3>John Deo</h3>
                    <p>Lorem ipsum dolor, olestiae temporibus quae recusandae sit ea assumenda, corporis, suscipit voluptates minus molestias cupiditate natus blanditiis fugit magnam cum consequuntur architecto reprehenderit dolor soluta? Earum, facere nulla eveniet quia harum, blanditiis incidunt at sapiente explicabo ipsum laborum unde laudantium nostrum distinctio.</p>
                    <div class="review-section">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="review-card">
                    <i class="fa-solid fa-quote-left" id="quote"></i>
                    <h3>John Deo</h3>
                    <p>Lorem ipsum dolor,, expedita ae sit ea assumenda, corporis, suscipit voluptates minus molestias cupiditate natus blanditiis fugit magnam cum consequuntur architecto reprehenderit dolor soluta? Earum, facere nulla eveniet quia harum, blanditiis incidunt at sapiente explicabo ipsum laborum unde laudantium nostrum distinctio.</p>
                    <div class="review-section">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
        </div>
    
     
      </footer>
   

    <script>
         const steps = [
            {
                number: "01.<br>",
                title: "Packing",
                description: "Your order will be hand picked and packed in our strong and sustainable packaging as soon as possible!",
                image: "img/paking.png"
            },
            {
                number: "02.<br>",
                title: "Shipping",
                description: "Your order will be delivered straight from our greenhouse to your door by your chosen carrier. You can follow the journey of your plants via the tracking link you receive in your mail.",
                image: "img/shipping.png"
            },
            {
                number: "03.<br>",
                title: "Delivery",
                description: "Your plants have arrived! Unbox them carefully, give them some water, and place them in their new home.",
                image: "img/unboxing.png"
            }
        ];
        var current=0;
        function next(){
         
            if(current<steps.length-1){
                current++;
                document.getElementById('step-number').innerHTML=steps[current].number;
                document.getElementById('step-title').textContent=steps[current].title;
                document.getElementById('step-descreption').textContent=steps[current].description;
                document.getElementById('step-image').src=steps[current].image;
                document.getElementById('current-step').textContent=current+1;




            }



        }

        function previous(){
         
         if(current>0){
             current--;
             document.getElementById('step-number').innerHTML=steps[current].number;
             document.getElementById('step-title').textContent=steps[current].title;
             document.getElementById('step-descreption').textContent=steps[current].description;
             document.getElementById('step-image').src=steps[current].image;
             document.getElementById('current-step').textContent=current+1;




         }



     }

 function goToCart(){
      window.location.href="pay.php";
    }

    const searchBox = document.getElementById("searchBox");
const suggestionsList = document.getElementById("suggestionsList");

    searchBox.addEventListener("blur", function() {
    suggestionsList.style.display = "none";
});
    </script>

       
</body>
</html>