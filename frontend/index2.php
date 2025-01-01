<?php
include("../backend/connect.php");

session_start();
ob_start();

if(!isset($_SESSION['name'])){

}
else {

  $user_id=$_SESSION['user_id'];

  if (isset($_SESSION['cart_message'])) {
    echo '
    <div id="alertMessage" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $_SESSION['cart_message'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    // بعد عرض الرسالة، قم بإزالة الرسالة من الجلسة
    unset($_SESSION['cart_message']);
}
}


if (isset($_GET['i'])) {
  $_SESSION['product_id'] = $_GET['i'];
    $product_id = $_GET['i'];
    $sql = "SELECT * FROM product WHERE product_id = $product_id";

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image'];
        $color = $row['pot_color'];
        $quantity = $row['stock'];
        $category = $row['category_id'];
        $plant_care = $row['plant_care'];

    } else {
        echo 'Product not found.';
    }
}
$product_id = $_SESSION['product_id'] ?? null;



?> 




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2.css">
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
</head>

<style>
  .title-icon{
    display: flex;
  }
  .title-icon a{
    color: black;
  }
  .title-icon button{
    background-color: white;
    color:#28a44c;
    font-size: 10px;
  }
  .title-icon button:hover{
    color:red;
  }
</style>

<body >
   
      
      
     


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
            <button id="logOutSubmit" type="submit" name="logout" style=" border-radius: 8px; ">Log Out</button>
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
  </header>



    <main>
        <div class="container py-4 " id="detalis-product">
         <div class="row align-items-center justify-content-center ">
                <div class=" col-md-5  text-center">
                    <img src="img/plant-image/<?php echo $image?>" alt="Product Image" class="img-fluid">
                </div>
                <div class=" col-md-6 " style="margin-top: 10px; display: grid; gap: 10px; ">
                  <div class="title-icon">
                  <h2 class="product-title" style="font-family: Judson;
                        width: 300px; font-size: 30px;"><?php echo $name?></h2>
<!-- <form method="POST" action="">

            <button id="favoriteButton" name="addToFav" type="submit" onclick="toggleFavorite()">
              Add to Favorites
</button> 
                        </from> -->
                        <button onclick="addToFavorites(123)">Add to Favorites</button>



                       
                  </div>
                  

                    <p class="product-price text-success"
                        style="width: 200px; font-size:48px ;color: #28a44c; font-family:Judson ;"><?php echo $price?>₪</p>

                        <form method="POST"  class="plant-form" action="">
           
                    <div class="d-flex align-items-center mb-3"
                        style="width: fit-content; border-radius: 15px ; background-color: #f0f0f0;">
                        <button onclick="plus()"  type="button" class="btn btn-outline-secondary"
                            style="color: #28a44c; font-size: 12px; border-radius: 30px;">+</button>
                        <input id="number" name="user-quantity" data-max="<?php echo $quantity; ?> " type="number" class="form-control text-center mx-2" value="1"
                            style="width: 60px; border: none;  background-color: #f0f0f0; box-shadow: none;">
                        <button onclick="minus()"  type="button" class="btn btn-outline-secondary"
                            style="color: #28a44c; border-radius: 3rem; font-size: 12px;">-</button>
                    </div>
                
                 
                    <div class="class= mb-3" style="display: flex; gap: 8px;">
                        <button class="btn" type="submit" name="addToCart" style="background-color: #28a44c; width: 90%; color: white;">
                           Add to Cart
                          </button>
                          </div>
                          </form>

                          <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addToCart'])){
                          


                          $user_quantity=$_POST['user-quantity'];
                          $total_price=$user_quantity*$price;  
                          if($_SESSION['user_id']){
                            $user_id=$_SESSION['user_id'];
                            $sql="Select Count(*) as count_card from cart where user_id=$user_id";
                             $result = mysqli_query($conn, $sql);
                           $row = mysqli_fetch_assoc($result);
                          if($row['count_card']==1){
                              
                           }
                          else{
                              $sql="Insert into cart(user_id) values ($user_id)";
                              $result=mysqli_query($conn,$sql);
                             
                          }
                          $sql="Select cart_id from cart where user_id =$user_id";
                          $result=mysqli_query($conn,$sql);
                          $row=mysqli_fetch_assoc($result);
                          $cart_id=$row["cart_id"];
                          $sql="Select quantity from cart_item where cart_id=$cart_id and product_id=$product_id";
                          $result=mysqli_query($conn,$sql);
                          if(mysqli_num_rows($result)>0){
                              $row=mysqli_fetch_assoc($result);
                              $prev_quantity=$row['quantity'];
                              $new_quantity=$prev_quantity+$user_quantity;
                              $total_price=$new_quantity*$price;                         
                              $sql="Update cart_item set quantity=$new_quantity, price=$total_price where cart_id=$cart_id and product_id=$product_id";
                              $result=mysqli_query($conn,$sql);
  
                          }
                          else {
                              $sql="Insert into cart_item(cart_id,product_id,quantity,price) values ($cart_id,$product_id,$user_quantity,$total_price)";
                              $result = mysqli_query($conn, $sql);
  
                          }
  
  
  
                          if ($result) {
                              $_SESSION['cart_message'] = 'The product has been added to your cart successfully!';
                            
                              
                          } else {
                              echo "حدث خطأ أثناء إضافة المنتج إلى السلة.";
                          }
                          header("Location: " . $_SERVER['PHP_SELF'] . "?i=" . $product_id);
                          exit();    
                      
                          ob_end_flush();

                        }


                          }                       
                         

                    


?>
                         

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <?php echo $description?>
                        </div>
                        <div class="tab-pane fade" id="plantcare" role="tabpanel" aria-labelledby="plantcare-tab">
                            <p>
                            <?php echo $plant_care?>

                            </p>
                        </div>
                    </div>


                    <div>

                    </div>
                </div>
            </div>

   
           
        </div>

        <hr>



        <section class="products-cards">
      <div class="heading">
        <h1>May you like</h1>
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
         function plus() {
        var numberInput = document.getElementById("number");
        var i = parseInt(numberInput.value); 
        var maxQuantity = parseInt(numberInput.getAttribute("data-max")); // استرداد الحد الأقصى
        console.log("Current value of i : "+i+" Max Quantity : "+maxQuantity);
        if (i < maxQuantity) { 
            i++; 
            numberInput.value = i;
        } else {
            alert("You have reached the maximum quantity allowed!"); // رسالة للمستخدم
        }
    }
        

        function minus() {
            var i = parseInt(document.getElementById("number").value); 
           if(i!=1){
            i--;
           } 
            document.getElementById("number").value = i;
        }
        setTimeout(function() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
      alert.style.display = 'none'; 
    }
  }, 3000);
  var t=0;

  function toggleFavorite() {
  var icon = document.getElementById('heartIcon');
  if (t==0) {
    icon.className='fas fa-heart';
    t=1;    
  } else {
    icon.className='far fa-heart';
    t=0; 
  }

  
}
function addToFavorites(productId) {
    var xhr = new XMLHttpRequest(); 
    xhr.open("POST", "addToFav.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;

            if (response === "success") {
                document.getElementById('heartIcon').className = "fas fa-heart";
                alert("تمت الإضافة إلى المفضلة بنجاح!");
            } else {
                console.log("حدث خطأ أثناء الإضافة إلى المفضلة."+response);
            }
        }
    };

    xhr.send("product_id=" + productId);
}
function goToCart(){
      window.location.href="pay.php";
    }

    const searchBox = document.getElementById("searchBox");
const suggestionsList = document.getElementById("suggestionsList");

    searchBox.addEventListener("blur", function() {
    suggestionsList.style.display = "none";
});
function goToPage(index) {
   
   window.location.href = "index2.php?i="+index;
   
   }
     </script>
</body>

</html>