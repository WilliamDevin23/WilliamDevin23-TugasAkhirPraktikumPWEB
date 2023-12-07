<?php
include 'readBuySell.php';
$sell = getSell();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan barang</title>
    <link rel="stylesheet" href="buysell.css">
</head>
<body>
    <a href="index.php">Kembali ke Beranda</a>
    <h2>Riwayat Penjualan Barang</h2>
    <div id="tablePage">
        <?php if (!empty($sell)) : ?>
            <table>
                <thead>
                    <tr>
                        <th class="header">ID Barang</th>
                        <th class="header">Tanggal Penjualan</th>
                        <th class="header">Quantity</th>
                        <th class="header">Nama Pembeli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sell as $itemSell) : ?>
                        <tr>
                            <td><?php echo $itemSell['id_barang']?></td>
                            <td><?php echo $itemSell['tgl_jual']?></td>
                            <td><?php echo $itemSell['quantity']?></td>
                            <td><?php echo $itemSell['nama_pembeli']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <p style="color: red;">Tidak ada data.</p>
        <?php endif ?>
    </div>
</body>
</html>