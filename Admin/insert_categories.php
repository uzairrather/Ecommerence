<?php include "../Admin/index.php" ;?>
<?php include "../partials/connect.php" ;?>
<?php
if(isset($_POST['insert'])){
    $category_title=$_POST['insert_category'];

    //checking if the catagory is allready present in table

    $query = "SELECT * FROM `categories` where category_name='$category_title'";
    $result2 = mysqli_query($con, $query);
    $numRows = mysqli_num_rows($result2);
    if($numRows>0){
        echo "<script>alert('Category is allready present in databese')</script>";
    }
    else{

    $sql = "INSERT INTO `categories` ( `category_name`) VALUES ( '$category_title')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('successfully inserted')</script>";
      }

      else{
        echo "<script>alert('not inserted')</script>";
      }
  }
}

?>

<form action="" method="POST" >
        <div class="container mt-5 w-50">
            <h1 class=" text-center">insert product details</h1>
            <div class="mb-3">
                <label for="insert category" class="form-label">insert categories</label>
                <input type="text" class="form-control" placeholder="insert_category" autocomplete="off" id="insert_category"
                    name="insert_category" required="required">
            </div>
            <button type="insert" name="insert" class="btn btn-primary">Insert</button>

        </div>
    </form>
