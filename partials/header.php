<header>
    <a href="/" class="logo"><span>Canteen</span></a>

    <ul class="navbar">
        <li><a <?php if ($_SERVER['SCRIPT_NAME'] == "/canteen-foodorderingsystem/index.php") { ?> class="active" <?php   }  ?> href="./index.php">Home</a></li>
        <li><a <?php if ($_SERVER['SCRIPT_NAME'] == "/canteen-foodorderingsystem/cart.php") { ?> class="active" <?php   }  ?> href="./cart.php">Cart <i class="ri-shopping-cart-2-fill"></i></a></li>
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