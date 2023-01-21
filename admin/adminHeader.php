<?php
   session_start();
   include_once "../connection.php"; 

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: rgb(20, 220, 33);">
    
    <a class="navbar-brand ml-5" href="./index.php">
       <h2>Admin Dashboard</h2>
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if (isset($_SESSION['admin_name'])) { ?>
          <a href="../logout.php" style="text-decoration:none;">
            <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
         <?php } ?>
    </div>  
</nav>
