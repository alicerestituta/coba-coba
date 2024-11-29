<?php
$db = mysqli_connect('localhost', 'root', '', 'db_penjualan');
error_reporting(0);

if (isset($_POST['submit'])) {
    $stiker = isset($_POST['Stiker']) ? $_POST['Stiker'] : 0;
    $kaos = isset($_POST['Kaos']) ? $_POST['Kaos'] : 0;
    $jaket = isset($_POST['Jaket']) ? $_POST['Jaket'] : 0;

    $qry = "INSERT INTO penjualan (Stiker, Kaos, Jaket) VALUES ('$stiker', '$kaos', '$jaket')";
    if (mysqli_query($db, $qry)) {
        echo '<script>alert("Barang telah ditambahkan");</script>';
        header('location: form-proses.php');
    } else {
        echo mysqli_error($db);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Online</title>
</head>
<body>
    <h3>PENJUALAN BARANG</h3>
    <hr>
    <form action="form-proses.php" method="post">
        <label>Stiker(Rp7.500)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Stiker" size="4"><br><br>

        <label>Kaos(Rp35.000)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Kaos" size="4"><br><br>

        <label>Jaket(Rp35.000)</label><br>
        <label>Jumlah: </label>
        <input type="text" name="Jaket" size="4"><br><br>

        <input type="submit" name="submit" value="Proses">
    </form>
    <br><hr>
    <h3>DATA PENJUALAN BARANG</h3>
    <table style="width: 50%" border="1">
        <tr>
            <th>Stiker</th>
            <th>Kaos</th>
            <th>Jaket</th>
            <th>Operasi</th>
        </tr>
        <?php
        $qry = "SELECT * FROM penjualan";
        $run = mysqli_query($db, $qry);
        if ($run) {
            while ($row = mysqli_fetch_assoc($run)) {
        ?>
                <tr>
                    <td><?php echo $row['Stiker']; ?></td>
                    <td><?php echo $row['Kaos']; ?></td>
                    <td><?php echo $row['Jaket']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>
