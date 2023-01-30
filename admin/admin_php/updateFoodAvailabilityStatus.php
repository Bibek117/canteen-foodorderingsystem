<?php

    include_once "../../connection.php";
   
    $food_id=$_POST['record'];
    $sql = "SELECT availability from food_items where food_id='$food_id'"; 
    $result=$conn-> query($sql);
 
    $row=$result-> fetch_assoc();
    
    
    if($row["availability"]==0){
         $update = mysqli_query($conn,"UPDATE food_items SET availability=1 where food_id='$food_id'");
    }
    else if($row["availability"]==1){
        $update = mysqli_query($conn,"UPDATE food_items SET availability=0 where food_id='$food_id'");
    }
    
 ?>