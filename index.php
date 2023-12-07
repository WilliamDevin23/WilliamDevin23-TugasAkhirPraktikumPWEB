<?php
include 'crud.php';
if (isset($_POST['rekamBeli'])){
    insertBuy();
    exit();
}

if (isset($_POST['rekamJual'])){
    insertSell();
    exit();
}

if (isset($_POST['delete'])){
    deleteBarang();
    header("Location: index.php");
    exit();
}

if (isset($_POST['add'])){
    addBarang();
    exit();
}

if (isset($_POST['submitUpdate'])){
    updateHarga();
    header("Location: index.php");
    exit();
}

$barang = getBarang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Inventori</title>
    <link rel="stylesheet" href="index.css">
    <script src="script.js"></script>
</head>
<body>
    <h2>Sistem Inventori Koperasi SMA Timur Jaya</h2>
    <div class = "form">
        <div id="formBeli">
            <form method="POST" name="beli" action="index.php">
                <h2>Form Pembelian Barang</h2><br>
                <label for="id">ID Barang</label><br>
                <input type="text" name="id" placeholder="Masukkan ID Barang"><br>

                <label for="tgl">Tanggal Pembelian</label><br>
                <input type="date" name="tgl" class="pickDate">"><br>

                <label for="qty">Quantity</label><br>
                <input type="number" name="qty" placeholder="Masukkan Quantity..."><br>

                <button type="submit" name = "rekamBeli" class="btnSubmit">
                    Submit Data Beli Barang
                </button>
                <a href="pembelian.php">Lihat Riwayat Pembelian Barang</a>
            </form>
        </div>

        <div id="formJual">
            <form method="POST" name="jual" action="index.php">
                <h2>Form Penjualan Barang</h2><br>
                <label for="id">ID Barang</label><br>
                <input type="text" name="id" placeholder="Masukkan ID Barang..."><br>

                <label for="tgl">Tanggal Penjualan</label><br>
                <input type="date" name="tgl" class="pickDate"><br>

                <label for="qty" id="qtyLabel">Quantity</label><br>
                <input type="number" name="qty" placeholder="Masukkan Quantity..."><br>

                <label for="pembeli">Nama Pembeli</label><br>
                <input type="text" name="pembeli" placeholder="Masukkan Nama Pembeli..."><br>
                
                <button type="submit" name = "rekamJual" class="btnSubmit">
                    Submit Data Jual Barang
                </button>
                <a href="penjualan.php">Lihat Riwayat Penjualan Barang</a>
            </form>
        </div>
    </div>
    <div class = "formUpdate">
        <form method="POST" action="index.php" id="formUpdate">
            <h2>Update Harga Barang</h2>
            <label for="textIdUpdate">ID Barang</label><br>
            <input type="text" name="textIdUpdate" id="updateID"><br>

            <label for="textHrgUpdate">Update Harga</label><br>
            <input type="number" name="textHrgUpdate" id="updateHarga"><br>
            
            <button type="submit" name="submitUpdate" id="btnUpdateForm">Update</button>
        </form>
    </div>
    <table id="StokBarang">
        <thead>
            <tr>
                <th class="headRow">ID Barang</th>
                <th class="headRow">Nama Barang</th>
                <th class="headRow">Stok Barang</th>
                <th class="headRow">Harga Barang</th>
                <th class="headRow">Hapus Barang</th>
                <th class="headRow">Update Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($barang) && !empty($barang)): ?>
                <?php foreach ($barang as $brg): ?>
                    <tr>
                        <td>
                            <?php echo $brg['id_barang']?>
                        </td>
                        <td>
                            <?php echo $brg['nama_barang']?>
                        </td>
                        <td>
                            <?php echo $brg['stok']?>
                        </td>
                        <td>
                            <?php echo $brg['harga']?>
                        </td>
                        <td>
                            <form method='POST'>
                                <input type="hidden" name="id_brg" value="<?php echo $brg['id_barang'] ?>">
                                <button type="submit" class="btnDelete" name="delete">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button class=btnUpdate name=update onclick=getCellValues(this)>Update</button>
                        </td>
                    </tr>
                <?php endforeach?>
                <tr>
                    <form method='POST' id="formAdd">
                    <td class="rowAdd"><input type="text" name="id" placeholder='ID'></td>
                    <td class="rowAdd"><input type="text" name="nama" placeholder='Nama'></td>
                    <td class="rowAdd"></td>
                    <td class="rowAdd"><input type="number" name="harga" placeholder='Harga Jual'></td>
                    <td class="rowAdd" colspan="2"><button type="submit" class="btnAdd" name="add">Add</button></td>
                    </form>
                </tr>
            <?php else : ?>
                <tr>
                    <form method='POST' id="formAdd">
                    <td class="rowAdd"><input type="text" name="id" placeholder='ID'></td>
                    <td class="rowAdd"><input type="text" name="nama" placeholder='Nama'></td>
                    <td class="rowAdd"></td>
                    <td class="rowAdd"><input type="number" name="harga" placeholder='Harga Jual'></td>
                    <td class="rowAdd" colspan="2"><button type="submit" class="btnAdd" name="add">Add</button></td>
                    </form>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</body>
</html>