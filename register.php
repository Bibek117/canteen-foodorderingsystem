<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    if (isset($_FILES['photo'])) {
        $filename = $_FILES['photo']['name'];
        $filetype = $_FILES['photo']['type'];
        $filetemp = $_FILES['photo']['tmp_name'];
        if (
            $filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
            && $filetype != "gif"
        ) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }


    $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'user already exist!';
    } else {
        if ($pass != $cpass) {
            $errors[] = 'password not matched!';
        } else {
            if (move_uploaded_file($filetemp, "profile-uploads/" . $filename)) {
                $insert = "INSERT INTO users (name, email, password, faculty, semester, photo) VALUES ('$name', '$email', '$pass', '$faculty', '$semester', '$filename')";
            $result = mysqli_query($conn, $insert);
            if($result){
                $_SESSION['success'] = 'Student registered successfully!';
                 header('location:login.php');
            }    
        }else {
            $errors[] = 'something went wrong!';
        }
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>canteen registration form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/form.css">

</head>

<body>

    <div class="form-container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
            <h3>canteen registration form</h3>
            <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="error-msg">' . $error . '</div>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <label for="faculty">Faculty</label>
            <select id="faculty" name="faculty">
                <option value="BCA">BCA</option>
                <option value="BSCCSIT">BSCCSIT</option>
                <option value="BIM">BIM</option>
                <option value="BBA">BBA</option>
            </select>
            <label for="semester">Semester</label>
            <select name="semester">
                <option value="first">First</option>
                <option value="second">Second</option>
                <option value="third">Third</option>
                <option value="fourth">Fourth</option>
                <option value="fifth">Fifth</option>
                <option value="sixth">Sixth</option>
                <option value="seventh">Seventh</option>
                <option value="eigth">Eigth</option>
            </select>
            <label for="photo">Profile Photo</label>
            <input  type="file" name="photo" required id="photo">

            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>

    </div>

    <script src="js/script.js"></script>
</body>

</html>