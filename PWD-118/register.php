<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    $check = mysqli_query($con, "SELECT * FROM registration WHERE email='$email' AND is_deleted=0");

    if (mysqli_num_rows($check) > 0) {
        echo "Email sudah terdaftar!";
    } else {
        $sql = "INSERT INTO registration (email, name, institution, country, address) VALUES ('$email', '$name', '$institution', '$country', '$address')";
        if (mysqli_query($con, $sql)) {
            echo "Pendaftaran berhasil!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Acara Seminar ICOM</title>
</head>
<body>
    <h2>Form Registrasi Seminar ICOM</h2>
    <form method="POST" action="">
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="text" name="name" required placeholder="Name"><br>
        <input type="text" name="institution" required placeholder="Institution"><br>
        <input type="text" name="country" required placeholder="Country"><br>
        <textarea name="address" required placeholder="Address"></textarea><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
