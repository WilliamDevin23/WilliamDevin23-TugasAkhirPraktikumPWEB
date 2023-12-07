<?php
include 'db.php';

//Memasukkan record ke tabel pembelian barang
function insertBuy(){
    $id = $_POST['id']; 
    $tgl = $_POST['tgl'];
    $qty = $_POST['qty'];
    global $conn;

    $stmt = $conn->begin_transaction();


    $result = $conn->query("SELECT * FROM stok_barang WHERE id_barang = '$id'");

    if ($result->num_rows > 0){
        $stmt = $conn->prepare("INSERT INTO pembelian_barang VALUES(?, ?, ?)");
        $stmt->bind_param("ssd", $id, $tgl, $qty);
        $stmt->execute();

        $query = "UPDATE stok_barang SET stok = stok + ? WHERE id_barang = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ds", $qty, $id);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
        header("Location: index.php");
    }
    else {
        $msg = "ID Barang tidak valid. Tambahkan dahulu barang pada tabel.";
        echo "<script>
                alert('$msg');
                location='index.php';
            </script>";
    }
}

//Memasukkan record ke tabel penjualan barang
function insertSell(){
    global $conn;
    $id = $_POST['id']; 
    $tgl = $_POST['tgl'];
    $qty = $_POST['qty'];
    $name = $_POST['pembeli'];

    $stmt = $conn->begin_transaction();

    $result = $conn->query("SELECT * FROM stok_barang WHERE id_barang = '$id'");
    $jual = $result->fetch_assoc();

    if ($result->num_rows > 0){
        if ($jual['stok'] >= $qty) {
            $stmt = $conn->prepare("INSERT INTO penjualan_barang VALUES(?, ?, ?, ?)");
            $stmt->bind_param("ssds", $id, $tgl, $qty, $name);
            $stmt->execute();

            $query = "UPDATE stok_barang SET stok = stok - ? WHERE id_barang = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ds", $qty, $id);
            $stmt->execute();
            $stmt->close();

            $conn->commit();
            header("Location: index.php");
        }
        else {
            $msg = "Stok barang kurang";
            echo "<script>
                    alert('$msg');
                    location='index.php';
                </script>";
        }
    }
    else {
        $msg = "ID Barang tidak valid. Tambahkan dahulu barang pada tabel.";
        echo "<script>
                alert('$msg');
                location='index.php';
            </script>";
    }
}

//Mendapatkan data stok barang
function getBarang(){
    global $conn;

    $result = $conn->query("SELECT * FROM stok_barang");
    $barang = [];

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $barang[] = $row;
        }
    }
    return $barang;
}

//Menghapus Barang
function deleteBarang(){
    global $conn;

    $id = $_POST['id_brg'];
    $conn->query("DELETE FROM stok_barang WHERE id_barang='$id'");
}

//Menambahkan Barang
function addBarang(){
    global $conn;
    $id = $_POST['id'];
    $name = $_POST['nama'];
    $harga = $_POST['harga'];

    $result = $conn->query("SELECT * FROM stok_barang WHERE id_barang='$id'");

    if ($result->num_rows == 0){
        $stmt = $conn->prepare("INSERT INTO stok_barang VALUES (?, ?, 0, ?)");
        $stmt->bind_param("ssd", $id, $name, $harga);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
    }
    else {
        $msg = "Barang sudah ada pada tabel.";
        echo "<script>
                alert('$msg');
                location='index.php';
            </script>";
    }
}

function updateHarga(){
    global $conn;
    $id = $_POST['textIdUpdate'];
    $harga = $_POST['textHrgUpdate'];

    $conn->query("UPDATE stok_barang SET harga = '$harga' WHERE id_barang = '$id'");
}