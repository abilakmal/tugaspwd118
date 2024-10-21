<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "PWD-118"; 

$con = mysqli_connect($host, $username, $password, $databasename);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
