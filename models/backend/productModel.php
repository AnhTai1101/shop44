<?php
    trait productModel{
        public function list_product(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        public function info_product(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id WHERE product.id =:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id));
            $result = $query->fetchAll();
            return $result;
        }
        public function delete_product(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("delete from product where id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id));
        }
        public function edit_product(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $image = isset($_POST['image']) ? "assets/frontend/images/product2/".$_POST['image'] : '';
            $image1 = isset($_POST['image1']) ? "assets/frontend/images/product2/".$_POST['image1'] : '';
            $image2 = isset($_POST['image2']) ? "assets/frontend/images/product2/".$_POST['image2'] : '';
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : 0;
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("update product set image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description where id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id,"image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));
        }
        public function insert_product(){
            $image = isset($_POST['image']) ? $_POST['image'] : '';
            $image1 = isset($_POST['image1']) ? $_POST['image1'] : '';
            $image2 = isset($_POST['image2']) ? $_POST['image2'] : '';
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $created_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("insert into product set created_at=:created_at, image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
        }
    } 
?>