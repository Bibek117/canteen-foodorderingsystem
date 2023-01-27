<?php
session_start();
 include_once "../../connection.php";
 if (isset($_POST['submit'])) {
  $food_id = $_POST['food_id'];
  $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
  $food_desc = mysqli_real_escape_string($conn, $_POST['food_desc']);
  $food_price = mysqli_real_escape_string($conn, $_POST['food_price']);
  if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetemp = $_FILES['file']['tmp_name'];
   // move_uploaded_file($filetemp, "../../images/" . $filename);
    if (
      $filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
      && $filetype != "gif"
    ) {
      $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }else{
       move_uploaded_file($filetemp, "../../images/" . $filename);
    }
  }else{
    $filename=$_POST['existingImage'];
  }
    $sql = "UPDATE food_items SET food_name='$food_name',food_desc='$food_desc', food_price=$food_price, food_image='$filename' WHERE food_id=$food_id";
    $update = mysqli_query($conn,$sql) or trigger_error("Query Failed! SQL: $sq - Error: ".mysqli_error($conn), E_USER_ERROR);
    if ($update) {
      $_SESSION['success'] = 'Food detail updated  successfully!';
      header('location:../index.php');
    } else {
    $errors[] = 'something went wrong!';
  }
};
?>
