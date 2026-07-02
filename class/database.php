<?php

class Database
{
    protected $host = "localhost";
    protected $user = "root";
    protected $dbPassword = "";
    protected $database = "uas_perpustakaan";

    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(
            $this->host,
            $this->user,
            $this->dbPassword,
            $this->database
        );

        if (!$this->conn) {
            die("Koneksi Gagal : " . mysqli_connect_error());
        }
    }
}

?>