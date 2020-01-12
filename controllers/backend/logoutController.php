<?php
    class logoutController{
        public function index(){
            unset($_SESSION['email']);
            unset($_SESSION['master_id']);
            header("location: http://localhost:8000/PHP44/Project01/");
        }
    }
?>