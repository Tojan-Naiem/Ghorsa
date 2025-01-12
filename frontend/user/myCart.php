<?php
include("../../backend/connect.php");

session_start();

if(!isset($_SESSION['name'])){

  echo $_SESSION['name'];
   header('location:../auth/login.php');
   exit();
}
$user_id=$_SESSION['user_id'];

$sql="Select cart_id from cart where user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row){
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


}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cartStyle.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="css/style.css">



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
          <a href="../setting.php">Setting</a>
         
        </nav>
      </div>
    </div>
    <hr />
    <!-- <h1>عباره عن اسم الموقع وسيرش البحث وايقونات القلب والتسجيل والسله</h1> -->
    <div class="mid-header">
      <div class="col1">
        <a href="../index.php" style="color: #28a44c">
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
    <div class="input-group col-md-5">
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
        <a href="../index2.php?i=<?php echo $fetch['product_id']; ?>">
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
       
 <a href="../favorites.php"><i class="fas fa-heart"></i></a>
        <a href="../auth/login.php"><i class="fas fa-user"></i></a>
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
          header("Location: ../index.php");
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
                <a class="nav-link" id="home" href="../index.php">Home</a>
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
                <a class="nav-link" id="about" href="../about.php">About</a>
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
    <h4>user name</h4>
    <a href="main.php"><i class="fa fa-user me-2"></i> My Profile</a>
    <a href="favourite.php"><i class="fa fa-heart me-2"></i> Wish List</a>
    <a href="myCart.php" style="background-color: #28a44c; color: white;"><i class="fa fa-shopping-cart me-2"></i> My Cart</a>
    <a href="myOrders.php"><i class="fa fa-box me-2"></i> My Order</a>
</div>

</div>
            <div class="order-container">
                <h3>My Cart</h3>
                <h4 >Order Details</h4>
                <hr style="width: 100%; ">
                <table class="table table-borderless order-details border-bottom">
                    <thead class="border-bottom">
                        <tr>
                           
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>

                           

                        </tr>

                    </thead>
                    <tbody>

                    <?php
                   
if($row){




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
   
    echo ' 
            <tr class="border-bottom">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../img/plant-image/'.$image.'" alt="Plant" class="product-image me-2">
                                    <span>'.$name.'</span>
                                </div>
                            </td>
                            <td>'.$price.'</td>

                            <td>

                                    <input type="number" value="'.$quantity.'" class="form-control text-center mx-2" value="1"
                                        style="width: 60px; border: none;  background-color: #f0f0f0; box-shadow: none; background: none;">
                            
                                </td>
                            <td>
                                <a href="?remove='.$cart_item_id.'" class="delete-icon"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
    
    
    
    
    ';

}
}
?>

                    

              
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="total-price">Total Price :</span>
                    <span class="fs-5">
                    <?php 
                    if($row){
                      $sql="Select*from cart_item where cart_id=$cart_id";  
                      $result2=mysqli_query($conn,$sql);
                      $amount=0;
                      while($row=mysqli_fetch_assoc($result2)){
                     $amount+=$row['price'];
                    }
              
                  

              }
              
                      ?>


                    </span>
                </div>
                <hr style="width: 100%; align-items: center;">
                <div class="text-center mt-4">
                    <a href="../pay.php" class="btn btn-confirmation " style="color: white; width: 30%; background-color: #28a44c;">Order Confirmation</a>
                </div>




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </main>

    <script>
        function goToCart(){
          window.location.href="../pay.php";
        }

    const searchBox = document.getElementById("searchBox");
const suggestionsList = document.getElementById("suggestionsList");

    searchBox.addEventListener("blur", function() {
    suggestionsList.style.display = "none";
});
    </script>
</body>

</html>