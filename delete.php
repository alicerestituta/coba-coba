<?php
$db = mysqli_connect("localhost", "root", "", "db_penjualan");
if (!$db) {
    die('error in db' . mysqli_error($db));
}

// Pastikan Anda mendapatkan parameter yang benar dari URL
if (isset($_GET['id'])) {
    $stiker = $_GET['id']; 

    // Perbarui pernyataan SQL Anda untuk menggunakan parameter yang benar dan aman
    $qry = "DELETE FROM penjualan WHERE id = '$stiker'"; 

    if (mysqli_query($db, $qry)) {
        header('location: form-proses.php');
    } else {
        echo mysqli_error($db);
    }
} else {
    echo "ID tidak valid atau tidak ada dalam URL.";
}
?>
