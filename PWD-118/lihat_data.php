<?php
// Koneksi ke database
include 'config.php'; // Pastikan file config.php sudah berisi koneksi database

// Ambil data dari tabel registration
$query = "SELECT * FROM registration";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Registrasi Seminar ICOM</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Registrasi Seminar ICOM</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Institution</th>
                <th>Country</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Tampilkan data dari setiap baris
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['id']) ? $row['id'] : '-') . "</td>";
                    echo "<td>" . (isset($row['email']) ? $row['email'] : '-') . "</td>";
                    echo "<td>" . (isset($row['name']) ? $row['name'] : '-') . "</td>";  // Perbaikan di sini (ganti 'nama' jadi 'name')
                    echo "<td>" . (isset($row['institution']) ? $row['institution'] : '-') . "</td>";
                    echo "<td>" . (isset($row['country']) ? $row['country'] : '-') . "</td>";
                    echo "<td>" . (isset($row['address']) ? $row['address'] : '-') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Data tidak ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
