<?php


session_start();
$databaseHost     = 'localhost';
$databaseName     = 'example';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if ($conn->connect_error){
    header("Connection failed: " . $conn->connect_error);
    
}

if (isset($_POST['login1'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "select 'email', 'password' from admin
        where email='$email' and password='$password'");

    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {

        $_SESSION["email"] = $email;
        header("location:customer_details.php");
    } else {
        echo "User email or password is not matched <br/><br/>";
    }
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UFT-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
<body>
<div class="loginbox">
        <img src="img/avatar.png" class="avatar">
            <h1>Admin Login </h1>
    <form action="login1.php" method="post" name="form3">
                <p>Username</p>
                    <input type="text" name="email" placeholder="Enter Username">
                <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="login1" value="Login">
                <a href="login.php">Move to Customer Login</a>
    </form>
</div>
    </div>
   
</body>

</html>