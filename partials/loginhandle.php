<?php
$showError = true;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $name = $_POST['loginName'];
    $pass = $_POST['loginPass'];
    

    $sql = "select * from `users` where user_name ='$name'";
    $result = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['username'] = $name;
            $_SESSION['userid'] = $row['user_id'];
            echo "logged in" . $name;
        }
        header("Location: /Ecommerence/index.php");
    }
    header("Location: /Ecommerence/index.php");
}

?>