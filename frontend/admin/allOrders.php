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
  <link rel="icon" href="../img/icon.png">

  <title>GHORSA</title>

<style>
  .content{
    display: flex;
    flex-direction: column;
    height: 200vh;
  }
.cards-info{
  display: flex;
  gap: 30px;
  align-items: center;
  justify-content: center;
}
form{
  height: 20%;
}
.cards-info .card{
  background-color: #28a44c;
  width: 300px;
  height: 150px;
  color: white;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}
@media screen and (max-width:786px){

  .cards-info{
    flex-direction: column;


  }
  
}

</style>
</head>


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
            <button id="logOutSubmit" type="submit" name="logout" style=" border-radius: 8px; ">Log Out</button>
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
      <h4 >Orders</h4>
   

      <div class="recent-orders" style="margin-right: 50px; margin-left:10px">
        
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
            <?php 
            $sql="Select*From order_table";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $order_id=$row['order_id'];
                $order_amount=$row['order_amount'];
                $order_date=$row['order_date'];
                $status=$row['status'];
                $user_id=$row['user_id'];
                $sql_user_name="Select name from user where user_id=$user_id";
                $result_user_name=mysqli_query($conn,$sql_user_name);
                $row_user_name=mysqli_fetch_assoc($result_user_name);
                $user_name=$row_user_name['name'];


                echo ' 
                
                <tr>
              <td>'.$order_id.'</td>
              <td>'.$order_date.'</td>
              <td>'.$user_name.'</td>
              <td>'.$order_amount.'</td>
              <td>'.$status.'</td>
              <td>
                <a href="viewOrder.php?i='.$order_id.'" class="btn btn-primary btn-sm">View</a>
                <button class="btn btn-warning btn-sm">Update</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
                
                
                
                ';





            }



?>
            
      
          </tbody>
        </table>
      </div>

    </div>
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


  </main>



</body>

</html>