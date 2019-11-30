<?php
    class logoutController{
        public function index(){
            unset($_SESSION['email']);
            header("location:index.php");
        }
    }
?>