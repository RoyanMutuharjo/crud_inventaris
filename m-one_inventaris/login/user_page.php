<?php
    include 'config.php';

    session_start();

    if(!isset($_SESSION['username'])){
        header('location: login_form.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Custom Css -->
     <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    
<div class="container">

    <div class="content">
        <h3>Hi, <span>User</span></h3>
        <h1>Welcome <span><?php echo $_SESSION['username'] ?></span></h1>
        <p>Ini adalah halaman user</p>
        <a href="login_form.php" class="btn">Home</a>
        <a href="register_form.php" class="btn">Register</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>

</div>

</body>
</html>