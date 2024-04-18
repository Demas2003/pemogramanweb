<?php
require_once "app/Mahasiswa.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $mhsw = new Mahasiswa();
    $mhsw->tambah($nim, $nama, $alamat);

    header("Location: index.php");
    exit();
}
?>
