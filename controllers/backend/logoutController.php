<?php
    class logoutController{
        public function index(){
            unset($_SESSION['email']);
            unset($_SESSION['master_id']);
            header("location:index.php");
        }
    }
?>