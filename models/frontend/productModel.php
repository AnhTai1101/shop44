<?php
    trait productModel{
		public function searchProduct(){
			$search = isset($_POST['search-product']) ? $_POST['search-product'] : 'banhang';
			$conn = Connection::getInstance();
            $query = $conn->prepare("select * from product where title like '%$search%'");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $info = $query->fetchAll();
            return $info;
		}
		public function list_category(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from categories");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
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
        public function oneProduct($id){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT * FROM product WHERE category_id=:id order by id desc");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array('id'=>$id));
            $result = $query->fetchAll();
            return $result;
        }
        public function model_getAll($fromRecord,$recordPerPage){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();			
			//chuan bi cau truy van
			$query = $conn->prepare("select * from product order by id desc limit $fromRecord,$recordPerPage");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute();
			//duyet tat ca cac ban ghi nem ve mot bien
			$result = $query->fetchAll();
			return $result;
		}
        public function model_get($id,$fromRecord,$recordPerPage){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();			
			//chuan bi cau truy van
			$query = $conn->prepare("select * from product where category_id=:id order by id desc limit $fromRecord,$recordPerPage");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute(array('id'=>$id));
			//duyet tat ca cac ban ghi nem ve mot bien
			$result = $query->fetchAll();
			return $result;
		}
        // hàm này tính tổng tất cả các bản ghi có cùng loại. ( số lượng sản phẩm)
        public function model_total_category(){
            // lấy id của danh mục sản phẩm
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi cau truy van
			$query = $conn->prepare("select * from product where category_id=:id order by id desc");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute(array("id"=>$id));
			//dem so luong ban ghi
			$numberRecord = $query->rowCount();
			return $numberRecord;
        }
        // hàm này tính tổng tất cả bản ghi trong tất cả các danh mục
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
    } 
?>