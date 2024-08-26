<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerence</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>
    <?php include 'partials/head.php' ;?>
    <?php include "partials/connect.php" ;?>
    <?php include "functions/functions.php" ;?>
   

    <?php
   
   $logged_user = $_SESSION['userid'];
   
   if(isset($_GET['proid'])){
    $get_product_id = $_GET['proid'];
           $select="SELECT * FROM `cart` where cart_user_id= '$logged_user' and cart_product_id= '$get_product_id'";
           $result= mysqli_query($con, $select);
           $numRows = mysqli_num_rows($result);
           if($numRows>0){
               echo "<script>alert('This item is allredy inside table')</script>";
               echo "<script>window.open('index.php', '_self')</script>";
               
           }
           
               else{
               $insert ="INSERT INTO `cart` (`cart_product_id`, `cart_user_id`) VALUES ('$get_product_id', '$logged_user')";
               $result1 = mysqli_query($con, $insert);

               echo "<script>alert('The product is added to cart')</script>";
               echo "<script>window.open('index.php', '_self')</script>";
               

               }
       }
       
  
?>



    <div class="container mt-4">
        <div class="inrto text-center pt-5">
            <h3>ALL PRODUCTS</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, dicta?</p>
        </div>
    </div>

    <div class="container" id="main">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    
                    <tbody>
                        <?php
                        $count = 0;
                        $logged_user = $_SESSION['userid'];
                        $total_price = 0;
                        $query = "SELECT * FROM `cart` where cart_user_id = $logged_user";
                        $result = mysqli_query($con, $query);
                        $result1=mysqli_num_rows($result);
                            if($result1>0){
                                echo '<thead>
                        <tr>
                            <th scope="col">sno</th>
                            <th scope="col">Name </th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qantity</th>
                            <th scope="col">Operations</th>

                        </tr>
                    </thead>';
                        while($rows= mysqli_fetch_assoc($result)){
                        $product_id = $rows['cart_product_id'];
                    
                        $select_products = "SELECT * FROM `products` where product_id=$product_id";
                        $result3= mysqli_query($con, $select_products);
                        while($row2= mysqli_fetch_assoc($result3)){
                            $count+=1; 
                            $name = $row2['product_name'];
                            $image = $row2['product_image'];
                            $price = $row2['product_price'];
                            $qty= $row2['quantity'];
                            $total_price+=$price;
                            $total_price=$total_price*$qty;

                          
                        echo '<tr>
                            <th scope="row">'.$count.'</th>
                            <td>'.$name.'</td>
                            <td><img src="./Admin/product_images/'. $image .'" width="50px" alt="..."></td>
                            <td>$'.$price.'.0</td>
                            <td>'.$qty.'</td>
                            <td>   
                             <input type="submit" value="Remove" name="Remove" class="btn bg-success text-light">  
                            </td>
                            </tr>';
              
                      }}}
                      
                 else{
                    echo ' <div class="container my-4 p-2 bg-info">
                      <div class="contain p-5">
                          <h1 class="display-4 ">Your Cart is Empty!</h1>
                          <p class="lead">Suggestions: <ul>
                              <li>Please add new products.</li>
                              </ul>
                          </p>
                          <div class="d-flex"><a href="index.php"><button class="btn bg-primary mx-2 text-light">Continue
                             shopping</button></a>
                          </div>
                      </div>
                  </div> ';
                      } ?>
                    </tbody>
                </table> 
                </form>
                <?php
                   
                     if(isset($_POST['Remove'])){
                         
                             $delete = "DELETE  FROM `cart` where cart_product_id='$product_id ' and cart_user_id = '$logged_user'";
                             $query = mysqli_query($con, $delete);
                             if($delete){
                                 echo" <script>window.open('cart.php', '_self')</script>";
         
                             }
                     }//important point:-when ever you remove product in cart it gets removed in data base but not in
                     // in cart page you have to refresh cart page it is problem in echo script just rewrite the 
                     //script location// 
                     ?>

                <div class="d-flex mb-4">
                    <?php
                     $query = "SELECT * FROM `cart` where cart_user_id = $logged_user";
                     $result = mysqli_query($con, $query);
                     $result1=mysqli_num_rows($result);
                         if($result1>0){
                    
                    echo '<h4 class="px-3">Subtotal:<strong class="text-success">$'. $total_price .'.0</strong></h4>
                    <a href="index.php"><button class="btn bg-primary mx-2 text-light">Continue
                            shopping</button></a>
                    <a href=""><button class="btn bg-primary text-light">Check out</button></a>';
                 }
                ?>
            </div>
        </div>
    </div>

    <?php include 'partials/Efooter.php' ;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>