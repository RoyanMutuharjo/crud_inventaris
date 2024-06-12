<?php
    include 'config.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);

        $select = "SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User Already Exist!';
            
        } else{
            if($pass != $cpass){
                $error[] = 'Password Not Matched!';
            } else{
                $insert = "INSERT INTO users(username, email, password) VALUES('$name', '$email', '$pass')";
                mysqli_query($conn, $insert);
                header('loaction: login_form.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- Custom Css -->
     <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
        <h3>Register Now</h3>
        <br>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error_msg">'.$error.'</span>';
                }
            }
        ?>
        <input type="text" name="name" require placeholder="Enter Your Name">
        <input type="email" name="email" require placeholder="Enter Your Email">
        <input type="password" name="password" require placeholder="Enter Your Password">
        <input type="password" name="cpassword" require placeholder="Confirm Your Password">
        <input type="submit" name="submit" value="Register Now" class="form-btn">
        <p>Already Have an Account? <a href="login_form.php">Login Now</a></p>
    </form>

</div>

</body>
</html>