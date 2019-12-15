<?php 
	include "models/frontend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function index(){
			$product = $this->info_product();
			$this->renderHTML("views/frontend/homeProduct.php",array("product"=>$product));
		}
		public function productDetail(){
			$infoProduct = $this->info_product();
			$this->renderHTML("views/frontend/productDetail.php",array("infoProduct"=>$infoProduct));
		}
	}
 ?>