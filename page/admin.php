<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/adminStyle.css">
    <title>ADMIN</title>
</head>
<body>
    <?php 
    if((isset($_SESSION["username"]))){?>
    <a href = "logout.php" class = "logout-btn">LOGOUT</a>
    <form action="uploadDB.php" enctype="multipart/form-data" method = "POST">
        <label for="fileName">File name:</label><br>
        <input type="file" id="fileName" name="fileName" required><br>
        <input type="submit"id = "apply" name = "apply" value="Apply">
      </form>
      <?php }
    else
    header("Location: loginPage.php"); 
    exit();
   ?>
</body>
</html>