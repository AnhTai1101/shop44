<?php 
	include "models/backend/loginModel.php";
	include "models/backend/productModel.php";
	class homeController extends Controller{
		use loginModel;
		use productModel;
		public function __construct()
        {
            $this->Authentication();
        }
		public function index(){
			$list_product = $this->list_product();
			$info = $this->info();
			$category = $this->category();
			$this->renderHTML("views/backend/home.php",array("info"=>$info,"list_product"=>$list_product,"category"=>$category));
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
		public function add(){
			$category = $this->category();
			$info = $this->info();
			$this->renderHTML("views/backend/add_product.php",array("info"=>$info,"category"=>$category));
		}
	}
 ?>