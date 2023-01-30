<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img style="border-radius: 50%;" src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, <?php echo  $_SESSION['admin_name'];?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Students</a>
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Food_items</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


