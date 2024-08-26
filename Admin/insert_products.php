<?php include "../Admin/index.php" ;?>
<?php include "../partials/connect.php" ;?>
<?php
if(isset($_POST['submit'])){
    $proname = $_POST['product_name'];
    $proprice = $_POST['product_price'];
    $prodesc = $_POST['product_desc'];
    $procat = $_POST['product_category'];
    $product_status = 'true';
    //access images
    $proimg = $_FILES['product_image']['name'];
    $proimg1 = $_FILES['product_image1']['name'];
    $proimg2 = $_FILES['product_image2']['name'];
    $proimg3= $_FILES['product_image3']['name'];
    $proimg4= $_FILES['product_image4']['name'];

    //access images temp name
    $tmpimg = $_FILES['product_image']['tmp_name'];
    $tmpimg1 = $_FILES['product_image1']['tmp_name'];
    $tmpimg2 = $_FILES['product_image2']['tmp_name'];
    $tmpimg3 = $_FILES['product_image3']['tmp_name'];
    $tmpimg4 = $_FILES['product_image4']['tmp_name'];

    //checking empty conditon
if($proname=='' or $proprice=='' or $prodesc=='' or $procat=='' or $proimg=='' or $proimg1=='' or $proimg2==''
    or $proimg3==''or $proimg4==''){
        echo "<script>alert('Please fill all the feilds first')</script>";
        exit();
    }
    else{
        move_uploaded_file($tmpimg, 'product_images/'. $proimg);
        move_uploaded_file($tmpimg1, 'product_images/'. $proimg1);
        move_uploaded_file($tmpimg2, 'product_images/'. $proimg2);
        move_uploaded_file($tmpimg3, 'product_images/'. $proimg3);
        move_uploaded_file($tmpimg4, 'product_images/'. $proimg4);

        //insert data
        $sql="INSERT INTO `products` ( `product_name`, `product_price`, `product_desc`, `category_id`
        , `product_image`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `date`,
         `product_status`) VALUES ( '$proname', '$proprice', '$prodesc', '$procat', '$proimg', '$proimg1', '$proimg2', '$proimg3', '$proimg4', 
         current_timestamp(), '$product_status')";

         $result2 = mysqli_query($con, $sql);
         if($result2){
            echo "<script>alert('data successfully inserted')</script>";
          }
    
          else{
            echo "<script>alert('data not inserted')</script>";
          }
    }

}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container mt-5 w-50">
        <h1 class=" text-center">insert product details</h1>
        <div class="mb-3">
            <label for="product-name" class="form-label">product_name</label>
            <input type="text" class="form-control" placeholder="product_name" autocomplete="off" id="product_name"
                name="product_name" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">produc_price</label>
            <input type="number" class="form-control" placeholder="product_price" autocomplete="off" id="product_price"
                name="product_price" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_details</label>
            <input type="text" class="form-control" placeholder="product_desc" autocomplete="off"
                id="product_desc" name="product_desc" required ="required">
        </div>
        <div class="mb-3">
            <select class="form-select" name="product_category" id="product_category"aria-label="Default select example" required ="required">
                <option selected>Select a category</option>
                <?php
                $select ="SELECT * FROM `categories`";
                $result = mysqli_query($con, $select);
                while($row = mysqli_fetch_assoc($result)){
                  $category_title=$row['category_name'];
                  $category_id= $row['category_id'];
                  echo '<option value="'.$category_id.'">'.$category_title.'</option>';
                }
                ?>
                
                
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_image</label>
            <input type="file" class="form-control" autocomplete="off" id="product_image" name="product_image" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_image1</label>
            <input type="file" class="form-control" autocomplete="off" id="product_image1" name="product_image1" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_image2</label>
            <input type="file" class="form-control" autocomplete="off" id="product_image2" name="product_image2" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_image3</label>
            <input type="file" class="form-control" autocomplete="off" id="product_image3" name="product_image3" required ="required">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">product_image4</label>
            <input type="file" class="form-control" autocomplete="off" id="product_image4" name="product_image4" required ="required">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </div>
</form>