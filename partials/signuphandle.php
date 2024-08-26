<?php
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] = "POST"){
    include 'connect.php';
    $user_email = $_POST['signupEmail'];
    $user_name = $_POST['signupname'];
    $pass = $_POST['signupPassword'];
    $Cpass = $_POST['signupCPassword'];

    $exitSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($con, $exitSql);
    $numRow = mysqli_num_rows($result);
    if($numRow>0){
        echo "<script>alert('Email Allready In Use')</script>";
    }

    else{
        if($pass == $Cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `user_email`, `user_name`, `user_pass`, `tstamp`) VALUES
             ('$user_email', '$user_name', '$hash', current_timestamp())";
            $result= mysqli_query($con, $sql);

            $showAlert = true;
            header("Location:/Ecommerence/index.php?signupsuccess=true");
               exit();

        }

        else{
            echo "<script>alert('Passwords do not match')</script>";
        }
    }
    header("Location: /Ecommerence/index.php?signupsuccess=false&error=");
}
?>
