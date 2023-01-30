<header>
    <a href="index.php" class="logo"><span>Canteen</span></a>

    <ul class="navbar">
        <li><a <?php if ($_SERVER['SCRIPT_NAME'] == "/canteen-foodorderingsystem/index.php") { ?> class="active" <?php   }  ?> href="./index.php">Home</a></li>
        <?php
        if (isset($_SESSION['user_name']) && $_SESSION['loggedin'] == true) {
            $sql = "SELECT * FROM orders WHERE user_id = {$_SESSION['user_id']} && payment_status = 0";
            $result = mysqli_query($conn, $sql);
            $count_ready_orders = 0;
            $count_preparing_status = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['order_status'] == 1) {
                    $count_ready_orders++;
                }
                if ($row['order_status'] == 0) {
                    $count_preparing_status++;
                }
            }
        ?>

            <li><a <?php if ($_SERVER['SCRIPT_NAME'] == "/canteen-foodorderingsystem/cart.php") { ?> class="active" <?php   }  ?> href="./cart.php">Orders &nbsp;<span style="color:red"><?php echo $count_ready_orders . '(R) ' . $count_preparing_status . '(P)' ?></span></a></li>
        <?php
        } else {
        ?>
            <li><a <?php if ($_SERVER['SCRIPT_NAME'] == "/canteen-foodorderingsystem/cart.php") { ?> class="active" <?php   }  ?> href="./cart.php">Orders</a></li>
        <?php
        }
        ?>

    </ul>

    <div class="main">
        <?php if (isset($_SESSION['user_name']) && $_SESSION['loggedin'] == true) { ?>
            <a href="logout.php" class="btn">-->Logout</a>
        <?php } else { ?>
            <a href="./login.php" class="user">Sign In</a>
            <a href="./register.php">Register</a>
        <?php } ?>
        <div class="bx bx-menu" id="menu-icon">
        </div>
    </div>
</header>