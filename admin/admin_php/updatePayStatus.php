<?php

    include_once "../../connection.php";
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT payment_status from orders where order_id='$order_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["payment_status"]==0){
         $update = mysqli_query($conn,"UPDATE orders SET payment_status=1 where order_id='$order_id'");
    }
    else if($row["payment_status"]==1){
         $update = mysqli_query($conn,"UPDATE orders SET payment_status=0 where order_id='$order_id'");
    }
?>