function showProductItems() {
  $.ajax({
    url: "./admin_php/viewAllProducts.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showCustomers() {
  $.ajax({
    url: "./admin_php/viewCustomers.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showOrders() {
  $.ajax({
    url: "./admin_php/viewAllOrders.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function ChangeOrderStatus(id) {
  $.ajax({
    url: "./admin_php/updateOrderStatus.php",
    method: "post",
    data: { record: id },
    success: function (data) {
        alert("Order Status updated successfully");
      $("form").trigger("reset");
      showOrders();
    },
  });
}

function ChangePay(id) {
  $.ajax({
    url: "./admin_php/updatePayStatus.php",
    method: "post",
    data: { record: id },
    success: function (data) {
        alert("Payment Status updated successfully");
      $("form").trigger("reset");
      showOrders();
    },
  });
}

function ChangeFoodAvailabilityStatus(id) {
  $.ajax({
    url: "./admin_php/updateFoodAvailabilityStatus.php",
    method: "post",
    data: { record: id },
    success: function (data) {
        alert("Food Availability Status updated successfully");
      $("form").trigger("reset");
      showProductItems();
    },
  });
}