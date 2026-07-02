<?php

require_once "database.php";

class User extends Database
{
    private $nama;
    private $username;
    private $password;
    private $role;

    public function __construct()
    {
        parent::__construct();
    }

    // Login
    public function login($username)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM user WHERE username='$username'"
        );

        return mysqli_fetch_assoc($query);
    }

    // Register
    public function register($nama, $username, $password, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (nama, username, password, role)
                  VALUES ('$nama', '$username', '$password', '$role')";

        return mysqli_query($this->conn, $query);
    }
}

?>