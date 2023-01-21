<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);


    $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('location:./admin/index.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            header('location:index.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/form.css">

</head>

<body>

    <div class="form-container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3>Canteen login</h3>
            <div class="back_link">
                  <a href="./index.php">Go back to main-site</a>
            </div>
          

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<div  class="error-msg">' . $error . '</div>';
                };
            };
            if(isset($_SESSION['success'])){
                echo '<div class="success-msg">'.$_SESSION['success'].'</div>';
                unset($_SESSION['success']);
            }
            ?>


            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Don't have an account? <a href="register.php">register now</a></p>
        </form>

    </div>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>