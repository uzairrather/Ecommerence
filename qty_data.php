<?php
 include "partials/connect.php";
 $qty =  (int) $_POST['quantity'];
 $id =  $_POST['product_id'];

     $sql ="update products set quantity = $qty where product_id = $id";
     $result= mysqli_query($con, $sql);
     
   //   echo $sql;

     if($result)
     {
        return 1;
     }else
     {
        return 0;
     }

?>