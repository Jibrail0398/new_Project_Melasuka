<?php

    
    abstract class User {
        protected $email;
        protected $password;
        protected $role;
        protected $name;
        protected $confirm_password;
        protected $jenis_kelamin;
    
        public function __construct($email,$connect) {
            $this->email = $email;
            $this->connect = $connect;
        }
        public function register($name,$email,$password,$confirm_password,$jenis_kelamin){
            $this->password = $password;
            $this->confirm_password = $confirm_password;
            $this->name = $name;
            $this->jenis_kelamin = $jenis_kelamin;
            if($this->confirm_password != $this->password) {
                echo "
                <script>
                alert('konfirmasi password tidak sesuai');
                window.location = '../../pages/register/register.php';
                </script>
                ";                
                die;
            }
            $usedEmail = mysqli_query($this->connect,"SELECT email_user FROM data_users WHERE email_user = '$this->email'");
            if(mysqli_num_rows($usedEmail) > 0) {
                echo "email sudah digunakan";
                die;
            }
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            $created_at = date('Y-m-d H:i:s',time());
                
            $users = mysqli_query($this->connect,"INSERT INTO data_users (name,email_user,password,tanggal_daftar,jenis_kelamin) VALUES
                                    ('$this->name','$this->email','$this->password','$created_at','$this->jenis_kelamin')");
            return $users;
        }
    
        public function login($password) {            
            $this->password = $password;
            session_start();
            $user = mysqli_query($this->connect,"SELECT * FROM data_users WHERE email_user = '$this->email'");
            $data = mysqli_fetch_assoc($user);
            if(mysqli_num_rows($user) > 0) {
                if(password_verify($password,$data['password'])){
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['role'] = $data['role'];
                    if($_SESSION['role'] == 'Admin'){
                        header('Location:../../pages/ManajemenObat/ManajemenObat.php');
                    }else if($_SESSION['role'] == 'Owner'){
                        header('Location:../../pages/dashboard/dashboard.php');
                        // header('Location:./../pages/user');
                        // echo("Berhasil Login sebagai Owner");
                    }else{
                        // header('Location:./../');
                        echo("Berhasil login sebagai Customer");
                    }
                }else{
                    echo "
                <script>
                alert('Password salah');
                window.location = '../../pages/register/register.php';
                </script>
                ";   
                }
            }else{
                echo "
                <script>
                alert('konfirmasi password tidak sesuai');
                window.location = '../../pages/login/login.php';
                </script>
                ";   
            }
            
        }
        // public function logout() {
        //     session_destroy();
        //     header('Location:../pages/login/login.php');
        // }
    }
    
    class Owner extends User {
    
        public function addAdmin($adminUsername) {
            // Implement logic to add an admin
        }
    }
    
    class Admin extends User {
        
        public function manageCustomers() {
            // Implement logic to manage customers
        }
    }
    
    class Customer extends User {
    
        public function makePurchase($item) {
            // Implement logic for customers to make purchases
        }
    }


?>