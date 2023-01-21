<div class="container p-5">

  <h4>Edit Product Detail</h4>
  <?php
  include_once "../../connection.php";
  $ID = $_POST['record'];
  $qry = mysqli_query($conn, "SELECT * FROM food_items WHERE food_id='$ID'");
  $numberOfRow = mysqli_num_rows($qry);
  if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {
  ?>
      <form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
        <div class="form-group">
          <input type="text" class="form-control" id="product_id" value="<?= $row1['food_id'] ?>" hidden>
        </div>
        <div class="form-group">
          <label for="name">Food Name:</label>
          <input type="text" class="form-control" id="p_name" value="<?= $row1['food_name'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">Food Description:</label>
          <input type="text" class="form-control" id="p_desc" value="<?= $row1['food_desc'] ?>">
        </div>
        <div class="form-group">
          <label for="price">Unit Price:</label>
          <input type="number" class="form-control" id="p_price" value="<?= $row1['food_price'] ?>">
        </div>
        <div class="form-group">
          <img width='200px' height='150px' src='../images<?= $row1["food_image"] ?>'>
          <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?= $row1['food_image'] ?>" hidden>
            <input type="file" id="newImage" value="">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
        </div>
    <?php
    }
  }
    ?>
      </form>

</div>