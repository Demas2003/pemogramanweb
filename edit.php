<?php
require_once "app/Mahasiswa.php";

// Jika ID disertakan dalam URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $mhsw = new Mahasiswa();
    $data = $mhsw->tampil();

    // Cari data mahasiswa berdasarkan ID
    foreach ($data as $row) {
        if ($row["id_mahasiswa"] == $id) {
            $nim = $row["nim"];
            $nama = $row["nama"];
            $alamat = $row["alamat"];
            break;
        }
    }
}

// Jika form disubmit untuk melakukan update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $mhsw = new Mahasiswa();
    $mhsw->update($id, $nim, $nama, $alamat);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Tautan ke Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h2>Tambah Mahasiswa Baru</h2>
        <form action="edit.php" method="POST" class="row g-3">
        <div class="col-md-4">
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
            </div>
            <div class="col-md-4">
                <input type="text" name="nim" class="form-control" value="<?php echo $nim; ?>" placeholder="NIM">
            </div>
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" placeholder="Nama">
            </div>
            <div class="col-md-4">
                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" placeholder="Alamat">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>
</body>
</html>
