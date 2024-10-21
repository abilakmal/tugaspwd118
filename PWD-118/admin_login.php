<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
    $admin = mysqli_fetch_assoc($query);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['id'];
        header("Location: admin_dashboard.php");
    } else {
        echo "Login gagal!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="POST" action="">
        <input type="text" name="username" required placeholder="Username"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
