<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$databasename = "PWD-118";
$con = mysqli_connect($host, $username, $password, $databasename);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek jika ada parameter ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete data (mengubah is_deleted menjadi 1)
    $query = "UPDATE registration SET is_deleted=1 WHERE id=$id";
    if (mysqli_query($con, $query)) {
        header("Location: lihat_data.php"); // Redirect ke halaman list data setelah penghapusan
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
