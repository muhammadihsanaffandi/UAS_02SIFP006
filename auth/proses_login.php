<?php
session_start();

require_once "../class/user.php";

$user = new User();

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $user->login($username);

    if($data){

        if(password_verify($password, $data['password'])){

            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            header("Location: ../dashboard.php");
            exit;

        }else{

            echo "<script>
            alert('Password Salah!');
            window.location='login.php';
            </script>";

        }

    }else{

        echo "<script>
        alert('Username Tidak Ditemukan!');
        window.location='login.php';
        </script>";

    }

}else{

    header("Location: login.php");

}
?>