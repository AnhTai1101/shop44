<?php
    trait homeModel{
        public function list_product(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        public function list_category(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from categories");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        public function info(){
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from user where email=:email");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute(array('email'=>$email));
            $info = $query->fetchAll();
            return $info;
        }
        public function get_id(){
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $password = md5($password);
            $conn = Connection::getInstance();
            $query = $conn->prepare("select email from user where email=:email and password=:password");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("email"=>$email,"password"=>$password));
            $result = $query->fetch();
            return $result;
        }
        
    }
?>