<?php 
	include "models/frontend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function index(){
			$product = $this->info_product();
			$this->renderHTML("views/frontend/product.php",array("product"=>$product));
		}
	}
 ?>