<?php 
	include "models/frontend/homeModel.php";
	class homeController extends Controller{
		use homeModel;
		public function index(){
			$list_product = $this->list_product();
			$this->renderHTML("views/frontend/home.php",array("list_product"=>$list_product));;
		}
	}
 ?>