<?php
session_start();
include('connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Canteen food ordering system</title>
    <!-- external css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- cdn for remix icons -->
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
	include('./partials/header.php');
    ?>
    <div class="container">
        <h2 class="menu-title">>Today's Menu</h2>
        <?php if (isset($_SESSION['user_name']))  echo '<h4>>>Welcome '.$_SESSION["user_name"].'</h4>' ?>
        <?php
        include('./partials/search_form.php');
        ?>
        <div class="order-note">
                 <p>*Note: Orders placed cannot be cancelled after 5 minutes</p>
            </div>
        <!-- <div class="menu">
            <div class="menu-item">
                <div class="menu-item-img">
                    <img src="images/food.jpg" alt="food1">
                </div>
                <div class="menu-item-details">
                    <h3>Chicken Burger</h3>
                    <p>Thiis a food made by cooking chicken</p>
                    <h4>Rs 100</h4>
                    <a href="#" class="btn">Order now</a>
                </div>
            </div>   
        </div> -->
        <div class="no-menu">
            <img src="./images/sorry.png" alt="sorry">
            <h3>No match found for the food item you are searching!!</h3>
        </div>
        
    </div>
    <?php
    include('./partials/footer.php');
    ?>
	<!--js link--->
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>