<?php

require_once "Database.php";

class Buku extends Database
{
    private $judul;
    private $pengarang;
    private $penerbit;
    private $kategori;
    private $tahun;
    private $stok;
    private $cover;

    public function __construct()
    {
        parent::__construct();
    }

    // Setter Property
    public function setData($judul, $pengarang, $penerbit, $kategori, $tahun, $stok, $cover)
    {
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->penerbit = $penerbit;
        $this->kategori = $kategori;
        $this->tahun = $tahun;
        $this->stok = $stok;
        $this->cover = $cover;
    }

    // Menampilkan semua data buku
    public function tampilData()
    {
        $query = "SELECT * FROM buku ORDER BY id_buku DESC";
        return mysqli_query($this->conn, $query);
    }

    // Menambah buku
    public function tambahData()
    {
        $query = "INSERT INTO buku
        (judul,pengarang,penerbit,kategori,tahun,stok,cover)
        VALUES
        (
        '$this->judul',
        '$this->pengarang',
        '$this->penerbit',
        '$this->kategori',
        '$this->tahun',
        '$this->stok',
        '$this->cover'
        )";

        return mysqli_query($this->conn, $query);
    }

    // Mengambil 1 data
    public function ambilData($id)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM buku WHERE id_buku='$id'"
        );

        return mysqli_fetch_assoc($query);
    }

    // Update buku
    public function updateData($id)
    {
        $query = "UPDATE buku SET

        judul='$this->judul',
        pengarang='$this->pengarang',
        penerbit='$this->penerbit',
        kategori='$this->kategori',
        tahun='$this->tahun',
        stok='$this->stok',
        cover='$this->cover'

        WHERE id_buku='$id'
        ";

        return mysqli_query($this->conn, $query);
    }

    // Hapus buku
    public function hapusData($id)
    {
        return mysqli_query(
            $this->conn,
            "DELETE FROM buku WHERE id_buku='$id'"
        );
    }

    // Search Buku
    public function cariData($keyword)
    {
        $query = "SELECT * FROM buku
        WHERE

        judul LIKE '%$keyword%'

        OR pengarang LIKE '%$keyword%'

        OR kategori LIKE '%$keyword%'

        ORDER BY id_buku DESC";

        return mysqli_query($this->conn, $query);
    }
}

?>