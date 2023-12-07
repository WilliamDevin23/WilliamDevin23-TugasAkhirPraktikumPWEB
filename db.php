<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'pencatatan_barang';

$conn = new mysqli($host, $username, $password, $db);

if ($conn -> connect_error) {
    die("Can't connected to database : ".$conn->connect_error);
}