<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = $_POST['id'];
    $sticker = $_POST['sticker'];
    $kaos = $_POST['kaos'];
    $jaket = $_POST['jaket'];

    // Membuka koneksi ke database
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_penjualan";
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Update data ke database
    $sql = "UPDATE penjualan SET sticker = '$sticker', kaos = '$kaos', jaket = '$jaket' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>
