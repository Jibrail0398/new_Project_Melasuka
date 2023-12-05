<?php
    include("../../core/OOP/user.php");
    include("../../core/config.php");
    global $connect;

    if (isset($_POST["login"])){
       $email = $_POST["email"];
       $password = $_POST["password"];

       $user = new Customer($email, $connect);
       $user->login($password);
    }

?>