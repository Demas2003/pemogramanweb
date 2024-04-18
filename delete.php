<?php
require_once "app/Mahasiswa.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $mhsw = new Mahasiswa();
    $mhsw->delete($id);

    header("Location: index.php");
    exit();
}
?>
