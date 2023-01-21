<?php
 include_once "../../connection.php";
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    // Connect to the database
    $query = "DELETE FROM food_items WHERE food_id = $id";
    $result = mysqli_query($conn,$query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    if ($result) {
        header('location:../index.php');
    } else {
        echo "Error deleting record: ";
    }
}
