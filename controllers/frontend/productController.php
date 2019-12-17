<?php 
	include "models/frontend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function all(){
			$all = $this->allProduct();
			$this->renderHTML("views/frontend/homeProduct.php",array("all"=>$all));
		}
		public function index(){
			$product = $this->info_product();
			$this->renderHTML("views/frontend/homeProduct.php");
		}
		public function productDetail(){
			$infoProduct = $this->info_product();
			$this->renderHTML("views/frontend/productDetail.php",array("infoProduct"=>$infoProduct));
		}
	}
 ?>