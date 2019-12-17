<?php
    trait productModel{
        public function info_product(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from product where id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array('id'=>$id));
            $info = $query->fetchAll();
            return $info;
        }
        public function allProduct(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

    } 
?>