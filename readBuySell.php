<?php
include 'db.php';

function getBuy(){
    global $conn;

    $result = $conn->query("SELECT * FROM pembelian_barang");
    $buy = [];

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $buy[] = $row;
        }
    }
    return $buy;
}

function getSell(){
    global $conn;

    $result = $conn->query("SELECT * FROM penjualan_barang");
    $sell = [];

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $sell[] = $row;
        }
    }
    return $sell;
}