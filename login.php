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

if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "select 'email', 'password' from user
        where email='$email' and password='$password'");

    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {
        session_start();
        $_SESSION["email"] = $email;
        header('location:form.php?=' .$email. '');
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
            <h1>Customer Login </h1>
    <form action="login.php" method="post" name="form1">
                <p>Username</p>
                    <input type="text" name="email" placeholder="Enter Username">
                <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="login" value="Login">
                <a href="login1.php">Move to Admin Login</a>
    </form>
</div>
    </div>
   
</body>

</html>