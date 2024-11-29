<?php
$db = mysqli_connect('localhost', 'root', '', 'db_penjualan');
error_reporting(0);

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $stiker = isset($_POST['Stiker']) ? $_POST['Stiker'] : 0;
    $kaos = isset($_POST['Kaos']) ? $_POST['Kaos'] : 0;
    $jaket = isset($_POST['Jaket']) ? $_POST['Jaket'] : 0;

    $qry = "UPDATE penjualan SET Stiker='$stiker', Kaos='$kaos', Jaket='$jaket' WHERE id=$id";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Data penjualan berhasil diperbarui");</script>';
        // Setelah mengupdate data, arahkan kembali ke halaman form-proses.php
        header('location: form-proses.php');
    } else {
        echo mysqli_error($db);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "SELECT * FROM penjualan WHERE id=$id";
    $run = mysqli_query($db, $qry);
    if ($run) {
        $row = mysqli_fetch_assoc($run);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penjualan</title>
</head>

<body>
    <h3>EDIT DATA PENJUALAN BARANG</h3>
    <hr>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Stiker(Rp7.500)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Stiker" size="4" value="<?php echo $row['Stiker']; ?>"><br><br>

        <label>Kaos(Rp35.000)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Kaos" size="4" value="<?php echo $row['Kaos']; ?>"><br><br>

        <label>Jaket(Rp35.000)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Jaket" size="4" value="<?php echo $row['Jaket']; ?>"><br><br>

        <input type="submit" name="update" value="Update">
        <button>
        <a href="form-proses.php" style="text-decoration: none; color: black;">Kembali</a>
        </button>
    </form>
</body>
</html>
