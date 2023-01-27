<?php
session_start();
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_submit'])) {
    $user_id = $_SESSION['user_id'];
    $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
    $food_id = mysqli_real_escape_string($conn,$_POST['food_id']);
    $order_date = date('Y-m-d h:i:s');
    //paymet status 0 = unpaid, 1 = paid
    //order status 0 = not ready, 1 = ready
     $sql = "INSERT INTO orders (user_id, quantity,food_id, ordered_time) VALUES ('$user_id','$quantity', '$food_id', '$order_date')";
  
    $check_sql_query = mysqli_query($conn, $sql); // or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);;
    if ($check_sql_query) {
        $_SESSION['success'] = 'Order placed successfuly!';
        header('location:index.php');
        die();
    } else {
        $_SESSION['fail'] = 'Order not placed!';
    }
}


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

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

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
        <?php if (isset($_SESSION['user_name']))  echo '<h4>>>Welcome ' . $_SESSION["user_name"] . '</h4>' ?>
        <?php
        include('./partials/search_form.php');
        ?>
        <div class="order-note">
            <p>*Note: Orders placed cannot be cancelled</p>
        </div>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<div class="success-msg">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        };
        if (isset($_SESSION['fail'])) {
            echo '<div class="fail-msg">' . $_SESSION['fail'] . '</div>';
            unset($_SESSION['fail']);
        };
        ?>
        <div class="menu">
            <?php
            $sql = "SELECT * from food_items WHERE availability = 1";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <div class="menu-item">
                        <div class="menu-item-img">
                            <img src="images/<?php echo $row['food_image']; ?>" alt="food1">
                        </div>
                        <div class="menu-item-details">
                            <h3><?php echo $row['food_name']; ?></h3>
                            <p><?php echo $row['food_desc']; ?></p>
                            <h4>Rs <?php echo $row['food_price']; ?></h4>
                            <!-- <button class="btn orderNow">Order now</button> -->
                            <?php if (isset($_SESSION['user_name']) && $_SESSION['loggedin'] == true) { ?>
                                <div class="myForm">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-contain"  onsubmit="return confirm('Are you sure you want to place this order?');" method="POST">
                                        <div class="counter">
                                            <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                            <input type="text" value="1" name="quantity">
                                            <span class="up" onClick='increaseCount(event, this)'>+</span>
                                        </div>
                                        <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
                                        <button type="submit" name="order_submit" class="btn">Order now</button>
                                    </form>
                                </div>
                            <?php } else { ?>
                                <a href="login.php" style="display:block;" class="btn">Login to order</a>
                            <?php } ?>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo '<div class="no-menu">
            <img src="./images/sorry.png" alt="sorry">
            <h3>Sorry, No food item available right now!!</h3>
            </div>';
            }
            ?>
        </div>

    </div>
    <?php
    include('./partials/footer.php');
    ?>
    <!--js link--->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>