<?php
include 'readBuySell.php';
$buy = getBuy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian barang</title>
    <link rel="stylesheet" href="buysell.css">
</head>
<body>
    <a href="index.php">Kembali ke Beranda</a>
    <h2>Riwayat Pembelian Barang</h2>
    <div id="tablePage">
        <?php if (!empty($buy)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Tanggal Pembelian</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buy as $itemBuy) : ?>
                        <tr>
                            <td><?php echo $itemBuy['id_barang']?></td>
                            <td><?php echo $itemBuy['tgl_beli']?></td>
                            <td><?php echo $itemBuy['quantity']?></td>
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