<?php
include("mysql.php");

 $userName = $_POST["userName"];
 $passWord = $_POST["passWord"];
$sql = "SELECT * FROM users WHERE username = '" .$userName."'";
$result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
    $userRow = mysqli_fetch_assoc($result);
    if($userRow["password"]==$passWord){
        session_start();
        $_SESSION["username"] = $userName;
        header("Location:admin.php");
        exit();
    }
   
    else{
        header("location: loginPage.php");
        exit();
    }
}
header("location:loginPage.php");



//  $_SESSION["username"] = $userName;
//  if ($userName != "" && $password != "")
//  header("Location: admin.php");
//  else
//  header("location: loginPage.php");

 
 ?>