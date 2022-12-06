<?php
session_start();

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
                <p>*Note: Orders placed cannot be cancelled after 5 minutes</p>
            </div>
            <div class="orders-table">
                <table>
                    <tr>
                        <th>Order_id</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Price per</th>
                        <th>Order status</th>
                        <th>Delete</th>
                    </tr>
                    <!-- order status -ready -preparing -received and paid -->
                    <tr>
                        <td>1</td>
                        <td>Somasa</td>
                        <td>2</td>
                        <td>Rs 25</td>
                        <td>Ready</td>
                        <td><i class="ri-delete-bin-2-line"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Somasa</td>
                        <td>2</td>
                        <td>Rs 25</td>
                        <td>Preparing</td>
                        <td><i class="ri-delete-bin-2-line"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Somasa</td>
                        <td>2</td>
                        <td>Rs 25</td>
                        <td>Received and paid</td>
                        <td><i class="ri-delete-bin-2-line"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Somasa</td>
                        <td>2</td>
                        <td>Rs 25</td>
                        <td>Ready</td>
                        <td><i class="ri-delete-bin-2-line"></i></td>
                    </tr>
                </table>
            </div>
            <div class="total">
                <h2>Total to be paid: <span style="color:red"> Rs 100</span></h2>
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