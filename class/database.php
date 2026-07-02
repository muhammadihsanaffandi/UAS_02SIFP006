<?php

class Database
{
    protected $host;
    protected $user;
    protected $dbPassword;
    protected $database;
    protected $port;

    protected $conn;

    public function __construct()
    {
        $this->host       = getenv('MYSQLHOST');
        $this->user       = getenv('MYSQLUSER');
        $this->dbPassword = getenv('MYSQLPASSWORD');
        $this->database   = getenv('MYSQLDATABASE');
        $this->port       = getenv('MYSQLPORT') ?: 3306;

        $this->conn = mysqli_connect(
            $this->host,
            $this->user,
            $this->dbPassword,
            $this->database,
            $this->port
        );

        if (!$this->conn) {
            die("Koneksi Gagal : " . mysqli_connect_error());
        }
    }
}