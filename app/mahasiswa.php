<?php
class Mahasiswa {
    private $db;
    public function __construct()
{
        try {
            $this->db =
            new PDO("mysql:host=localhost;dbname=dbakademik", "root", "");
        } catch (PDOException $e) {
            die ("Error " . $e->getMessage());
        }
}
    public function tampil() {
        $sql = "SELECT * FROM tb_mahasiswa";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }   

    public function tambah($nim, $nama, $alamat) {
        $sql = "INSERT INTO tb_mahasiswa (nim, nama, alamat) VALUES (:nim, :nama, :alamat)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function update($id, $nim, $nama, $alamat) {
        $sql = "UPDATE tb_mahasiswa SET nim = :nim, nama = :nama, alamat = :alamat WHERE id_mahasiswa = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

