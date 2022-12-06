<div class="wrap">
    <form class="search" action="search_result.php" method="GET">
     <input type="text" name="keyword" <?php if(isset($_GET['keyword'])){?> value="<?php echo $_GET['keyword'];}?>" placeholder="Search for any specific food....." class="searchTerm" >
      <button type="submit" name="search-submit" class="searchButton">
      <i class="ri-search-line"></i>
     </button>
    </form>
</div>