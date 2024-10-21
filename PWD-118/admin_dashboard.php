<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'config.php';

$query = mysqli_query($con, "SELECT * FROM registration WHERE is_deleted=0");

while ($row = mysqli_fetch_assoc($query)) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
    echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
    echo "<a href='edit.php?id=".$row['id']."'>Edit</a><br><br>";
}
?>
