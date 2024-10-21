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

    // Ambil data berdasarkan ID
    $query = "SELECT * FROM registration WHERE id=$id";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);

    // Cek jika form sudah di-submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $institution = $_POST['institution']; 
        $country = $_POST['country'];
        $address = $_POST['address'];

        // Update data di database
        $query = "UPDATE registration 
                  SET email='$email', name='$name', institution='$institution', country='$country', address='$address' 
                  WHERE id=$id";
        if (mysqli_query($con, $query)) {
            header("Location: lihat_data.php"); // Redirect ke halaman list data
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
} else {
    echo "ID tidak ditemukan!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peserta</title>
</head>
<body>
    <h2>Edit Data Peserta</h2>
    <form method="POST">
        Email: <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br><br>
        Nama: <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br><br> <!-- Ganti 'nama' dengan 'name' -->
        Institusi: <input type="text" name="institution" value="<?php echo $data['institution']; ?>"><br><br> <!-- Ganti 'institusi' dengan 'institution' -->
        Country: <input type="text" name="country" value="<?php echo $data['country']; ?>"><br><br>
        Address: <textarea name="address"><?php echo $data['address']; ?></textarea><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
