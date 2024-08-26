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
<style>
body {
    background-color: ghostwhite;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode';
}

#maincontainer {
    min-height: 87vh;
    display: flex;
}



.small-img-group {
    display: flex;
    justify-content: space-between;
}

.small-img-group {
    cursor: pointer;
}

.product select {
    display: block;
    padding: 5px 10px;
}

.product input {
    width: 50px;
    height: 40px;
    padding-left: 10px;
    font-size: 16px;
    margin-right: 10px;
}

.product input:focus {
    outline: none;
}

.buy-btn {
    padding: 10px 40px 10px 40px;
    border: 2px solid rgba(0, 0, 0, 0.253);
    background-color: rgb(36, 234, 30);
    color: ghostwhite;
    text-decoration: none;


}

.buy-btn:hover {
    color: blue;
}
</style>

<body>
    <?php include 'partials/head.php' ;?>
    <?php include "partials/connect.php" ;?>
    <?php include "functions/functions.php" ;?>
    
    

    <section>
        <div class="container product " id="maincontainer">
            <div class="row mt-5 ">
                
                <?php
        $id = $_GET['product_id'];
        $sql = "SELECT * FROM `products` WHERE product_id=$id";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            // echo $row['product_name'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $desc = $row['product_desc'];  
            $image= $row['product_image'];
            $image1= $row['product_image1'];
            $image2= $row['product_image2'];
            $image3= $row['product_image3'];
            $image4= $row['product_image4'];

                echo '<div class="col-md-3">
                    <img class="img-fluid w-100 mb-2" src="./Admin/product_images/'. $image .'">
                    <div class="small-img-group">
                        <div class="small-img-col ">
                            <img src="./Admin/product_images/'. $image1 .'" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col ms-2">
                            <img src="./Admin/product_images/'. $image2 .'" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col ms-2">
                            <img src="./Admin/product_images/'. $image3 .'" width="100%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col ms-2">
                            <img src="./Admin/product_images/'. $image4 .'" width="100%" class="small-img" alt="">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 ms-5">
                    <h6>Home / T- Shirt</h6>
                    <h3 class="py-4">'.$name.'</h3>
                    <h2>$'.$price.'.00</h2>
                    <select class="my-3">
                       <option >Select Size</option>
                       <option >XL</option>
                       <option >XXL</option>
                       <option >Small</option>
                       <option >Large</option>
                    </select>
                    <input type="number" value="1" name="qty" id="qty" >  
                    <input type="hidden" value='.$id.' name="prd_id" id="prd_id" >                         
                    <a href="cart.php?proid='.$id.'" class="buy-btn w-100">ADD TO CART</a>
                    <h4 class="mt-5 mb-4">Product details</h4>
                    <span>'.$desc.'</span>  
                </div>';
            }?>
            
            </div>
        </div>
    </section>


    <?php include 'partials/Efooter.php' ;?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
     <script>   
   
        $(document).ready(function(){
        $('#qty').on('input',function(){
         var qty = $(this).val();
        var pr_id = $("#prd_id").val();
        if(!qty)
        {
            alert("quantity should be greater than 0");
            qty = 0;
        }
        $.ajax({
        url: 'qty_data.php',
        type: 'POST',
        data: { 'quantity': qty,'product_id':pr_id} ,
        // contentType: 'application/json; charset=utf-8',
        success: function (response) {
            console.log(response);
        },
        error: function () {
            alert("error");
        }
    }); 
        });
    });

    </script>
</body>

</html>