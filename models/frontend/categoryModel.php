<?php
    trait categoryModel{
        public function list_category($id){
            // $id = (int)$id;
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from product where category_id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array('id'=>$id));
            $info = $query->fetchAll();
            return $info;
        }
    }
?>