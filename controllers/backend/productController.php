<?php 
	include "models/backend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function __construct()
        {
            $this->Authentication();
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
		public function delete(){
			$this->delete_product();
			header("location:index.php?area=backend");
		}
		public function edit(){
			$info_product = $this->info_product();
			$info = $this->info();
			$this->renderHTML("views/backend/info_product.php",array("info_product"=>$info_product,"info"=>$info));
		}
		public function go_edit(){
            $this->edit_product();
			header("location:index.php?area=backend");
		}
		public function go_add(){
			$this->insert_product();
			header("location:index.php?area=backend");
		}
	}
 ?>