<?php
session_start();
include_once "../../connection.php";

if (isset($_POST['submit'])) {

  $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
  $food_desc = mysqli_real_escape_string($conn, $_POST['food_desc']);
  $food_price = mysqli_real_escape_string($conn, $_POST['food_price']);
  if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetemp = $_FILES['file']['tmp_name'];
    if (
      $filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
      && $filetype != "gif"
    ) {
      $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
  }
  if (move_uploaded_file($filetemp, "../../images/" . $filename)) {
    $insert = "INSERT INTO food_items (food_name, food_desc, food_price,food_image) VALUES ('$food_name', '$food_desc', '$food_price', '$filename')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
      $_SESSION['success'] = 'Food added successfully!';
      header('location:../index.php');
    }
  } else {
    $errors[] = 'something went wrong!';
  }
};


?>
<div>
  <h2>Food Items</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary mb-3" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Food item
  </button>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Food Image</th>
        <th class="text-center">Food Name</th>
        <th class="text-center">Food Description</th>
        <th class="text-center">Unit Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    $sql = "SELECT * from food_items";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $count ?></td>
          <td><img height='100px' src='../images/<?= $row["food_image"] ?>'></td>
          <td><?= $row["food_name"] ?></td>
          <td><?= $row["food_desc"] ?></td>
          <td><?= $row["food_price"] ?></td>
          <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?= $row['food_id'] ?>')">Edit</button></td>
          <td>
            <form action="./admin_php/delete.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row['food_id']; ?>">
              <button class="btn btn-danger" style="height:40px" type="submit" name="delete">Delete</button>
            </form>
          </td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Food Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
              <label for="name">Food Name:</label>
              <input type="text" class="form-control" id="name" name="food_name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="price" name="food_price" required>
            </div>
            <div class="form-group">
              <label for="desc">Description:</label>
              <input type="text" class="form-control" id="desc" name="food_desc" required>
            </div>
            <div class="form-group">
              <label for="file">Choose Image:</label>
              <input required type="file" name="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>

    </div>
  </div>


</div>