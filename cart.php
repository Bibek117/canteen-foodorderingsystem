<?php
session_start();
require_once('./connection.php');
if (!(isset($_SESSION['user_name']) && isset($_SESSION['loggedin']))) {
    header('location:./login.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Canteen food ordering system-cart</title>
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
        <h1 class="menu-title">>Your's orders</h1>
        <!-- <div class="no-order">
            <h2>No orders yet</h2>
            <p>Go back to the menu to order some food</p>
            <a href="index.php" class="btn">Go to menu</a>
        </div> -->
        <div class="orders">
            <div class="order-note">
                <p>*Note: Orders placed cannot be cancelled</p>
            </div>
            <div class="orders-table">
                <table>
                    <tr>
                        <th>Order_id</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Price per</th>
                        <th>Order status</th>
                        <th>Payment</th>
                    </tr>
                    <!-- order status -ready -preparing -received and paid -->
                    <?php
                    $total_price = 0;
                     $sql = "SELECT * FROM orders WHERE user_id = {$_SESSION['user_id']} && payment_status = 0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sqlq = "SELECT * FROM food_items WHERE food_id = {$row['food_id']}";
                            $resultq = mysqli_query($conn, $sqlq);
                            $rowq = mysqli_fetch_assoc($resultq);
                            $food_name = $rowq['food_name'];
                            $food_price = $rowq['food_price'];
                            $total_price += ($food_price * $row['quantity']);
                            ?>
                            <tr>
                                <td><?php echo $row['order_id'] ?></td>
                                <td><?php echo $food_name ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $food_price ?></td>
                                <td><?php 
                                if($row['order_status'] == 0){echo "Preparing" ; }elseif($row['order_status'] == 1){ echo "Ready";} ?>
                                </td>
                                <td><?php 
                                if($row['payment_status'] == 0){echo "Pending" ; }elseif($row['payment_status'] == 1){ echo "Served and paid";} ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }

                    ?>
                </table>
            </div>
            <div class="total">
                <h2>Total to be paid: <span style="color:red"> Rs <?php echo $total_price ?></span></h2>
            </div>
        </div>
    </div>

    <?php
    include('./partials/footer.php');
    ?>
    <!--js link--->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>