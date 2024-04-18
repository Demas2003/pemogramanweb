<!DOCTYPE html>
<html>
<head>
    <!-- Tautan ke Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require_once "app/Mahasiswa.php";
                $mhsw = new Mahasiswa();
                $rows = $mhsw->tampil();
                foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['id_mahasiswa']; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_mahasiswa']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id_mahasiswa']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Tambah Mahasiswa Baru</h2>
        <form action="tambah.php" method="POST" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nim" class="form-control" placeholder="NIM">
            </div>
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="col-md-4">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>

    <!-- Tautan ke Bootstrap JS dari CDN (opsional, hanya jika Anda menggunakan komponen Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
