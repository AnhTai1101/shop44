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

    } 
?>