<?php

 include "partials/connect.php" ;

 function getproducts(){
    global $con;
    if(!isset($_GET['catid'])){
    $sql="SELECT * FROM `products` order by rand()";
          $result2= mysqli_query($con, $sql);
          while($row2=mysqli_fetch_assoc($result2)){
            $proid = $row2['product_id'];
            $proname = $row2['product_name'];
            $prodesc = $row2['product_desc'];
            $proprice = $row2['product_price'];
            $proimg = $row2['product_image'];

            echo '<div class="col-md-3 my-2">
            <div class="card" style="width: 19rem">
                <img src="./Admin/product_images/'. $proimg .'" class="card-img-top"   alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">'.$proname.'</h5>
                    <span class="price fw-bold">$'.$proprice.'.00</span>
                    <p class="card-text text-start pt-2">'. substr($prodesc,0,60) .'...</p>
                    <a href="products.php?product_id='. $proid .'" class="btn btn-primary text-center">VIEW</a>
                </div>
            </div>
        </div>';
          }
 }
 }
//////////////////
 function get_unique_categories(){
    global $con;
    if(isset($_GET['catid'])){
        $category_id=$_GET['catid'];
    $sql="SELECT * FROM `products` WHERE category_id=$category_id ";
          $result2= mysqli_query($con, $sql);
          while($row2=mysqli_fetch_assoc($result2)){
            $proid = $row2['product_id'];
            $proname = $row2['product_name'];
            $prodesc = $row2['product_desc'];
            $proprice = $row2['product_price'];
            $proimg = $row2['product_image'];



            echo '<div class="col-md-3 my-2">
            <div class="card" style="width: 19rem">
                <img src="./Admin/product_images/'. $proimg .'" class="card-img-top"  alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">'.$proname.'</h5>
                    <span class="price fw-bold">$'.$proprice.'.00</span>
                    <p class="card-text text-start pt-2">'. substr($prodesc,0,60) .'...</p>
                    <a href="products.php?product_id='.$proid.'" class="btn btn-primary text-center">VIEW</a>
                </div>
            </div>
        </div>';
          }
 }
 }
 /////////////////////
 function getcategories(){
    global $con;
    $select ="SELECT * FROM `categories`";
          $result = mysqli_query($con, $select);
          while($row = mysqli_fetch_assoc($result)){
            $category_title=$row['category_name'];
            $cat_id= $row['category_id'];

            echo'<div class="col-md-4 ">
            <a href="index.php?catid='.$cat_id.'" class="text-decoration-none "><h3 class="text-center">'.$category_title.'</h3></a> 
            <img src="images/carasoul-3.jpeg" alt="" width="400px" height="200px">
            </div>';
            
          }
          
 }

 function search_products(){
         global $con;
         if(isset($_GET['search_data'])){
          $query = $_GET["search_product"];
          $search_sql="SELECT * FROM `products` where  (product_name) like ('%$query%')";
              $result3= mysqli_query($con, $search_sql);
              $numRows = mysqli_num_rows($result3);
              if($numRows==0){
                   
                  echo '<div class="container my-4 p-2 bg-info">
                      <div class="contain p-5">
                          <h1 class="display-4 ">This product is not availible for now!</h1>
                          <p class="lead">Suggestions: <ul>
                              <li>Make sure that all the words are spelled correctly.</li>
                              <li>Try different keywords.</li>
                              <li>Try more genral keywords.</li>
                              </ul>
                          </p>
                      </div>
                  </div>';
              }
              while($row3=mysqli_fetch_assoc($result3)){
                  $proid = $row3['product_id'];
                  $proname = $row3['product_name'];
                  $prodesc = $row3['product_desc'];
                  $proprice = $row3['product_price'];
                  $proimg = $row3['product_image'];

                  echo '<div class="col-md-3 my-2">
                  <div class="card" style="width: 19rem">
                      <img src="./Admin/product_images/'. $proimg .'" class="card-img-top"   alt="...">
                      <div class="card-body text-center">
                          <h5 class="card-title">'.$proname.'</h5>
                          <span class="price fw-bold">$'.$proprice.'.00</span>
                          <p class="card-text text-start pt-2">'. substr($prodesc,0,60) .'...</p>
                          <a href="products.php?product_id='. $proid .'" class="btn btn-primary text-center">VIEW</a>
                      </div>
                  </div>
              </div>';
              }
          }
 }

 
          ?>
  
