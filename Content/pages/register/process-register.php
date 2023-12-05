<?php
    include("../../core/OOP/user.php");
    include("../../core/config.php");
    global $connect;


    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $jenis_kelamin = $_POST["jeniskelamin"];

        $daftar = new Customer($email,$connect);
        $daftar->register($name, $email, $password, $confirmPassword,$jenis_kelamin);
    }
    echo "
        <script>
        alert('Berhasil Registrasi');
        window.location = '../../pages/register/register.php';
        </script>";     
?>