<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/adminStyle.css">
    <title>LOGIN</title>
</head>
<body>
<form action = "login_session.php" method = "POST" >
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="userName" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="passWord" required><br>
        <input type="submit" id = "Login" value="Login">
      </form>
</body>
</html>