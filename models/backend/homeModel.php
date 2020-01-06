<?php
    trait homeModel{
        public function model_total(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi cau truy van
			$query = $conn->prepare("select * from product");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute();
			//dem so luong ban ghi
			$numberRecord = $query->rowCount();
			return $numberRecord;
        }
        public function model_getAll($fromRecord,$recordPerPage){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();			
			//chuan bi cau truy van
			$query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id order by id desc limit $fromRecord,$recordPerPage");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute();
			//duyet tat ca cac ban ghi nem ve mot bien
			$result = $query->fetchAll();
			return $result;
		}
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