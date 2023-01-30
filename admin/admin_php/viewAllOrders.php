<div id="ordersBtn">

  <h2>Order Details</h2>
  <div class="alert alert-success" id="message"  ></div>
  <table class="table ">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Student Name</th>
        <th>Photo</th>
        <th>Food Name</th>
        <th>Food Price</th>
        <th>Total for this Item</th>
        <th>Food Image</th>
        <th>Quantity</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>OrderDate</th>
      </tr>
    </thead>
    <?php
    include_once "../../connection.php";
    $sql = "SELECT order_id,order_status,payment_status,quantity,ordered_time,food_name,food_price,food_image,name,photo 
    FROM orders
    JOIN users ON orders.user_id=users.user_id 
    JOIN food_items ON orders.food_id=food_items.food_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $row["order_id"] ?></td>
          <td><?= $row["name"] ?></td>
          <td><img height='100px' src='../profile-uploads/<?= $row["photo"] ?>'></td>
          <td><?= $row["food_name"] ?></td>
          <td><?= $row["food_price"] ?></td>
          <td><?= $row["food_price"] * $row["quantity"] ?></td>
          <td><img height='100px' src='../images/<?= $row["food_image"] ?>'></td>
          <td><?= $row["quantity"] ?></td>
          <?php
          if ($row["order_status"] == 0) {

          ?>
            <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Preparing </button></td>
          <?php

          } else {
          ?>
            <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Ready</button></td>

          <?php
          }
          if ($row["payment_status"] == 0) {
          ?>
            <td><button class="btn btn-danger" onclick="ChangePay('<?= $row['order_id'] ?>')">Unpaid</button></td>
          <?php

          } else if ($row["payment_status"] == 1) {
          ?>
            <td><button class="btn btn-success" onclick="ChangePay('<?= $row['order_id'] ?>')">Paid </button></td>
          <?php
          }
          ?>
           <td><?= $row["ordered_time"] ?></td>
        </tr>
    <?php

      }
    }
    ?>

  </table>

</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body">

      </div>
    </div>
    <!--/ Modal content-->
  </div><!-- /Modal dialog-->
</div>
<script>
  //for view order modal  
  $(document).ready(function() {
    $('.openPopup').on('click', function() {
      var dataURL = $(this).attr('data-href');

      $('.order-view-modal').load(dataURL, function() {
        $('#viewModal').modal({
          show: true
        });
      });
    });
  });
</script>