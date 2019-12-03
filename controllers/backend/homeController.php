<?php 
	include "models/backend/homeModel.php";
	class homeController extends Controller{
		use homeModel;
		public function __construct()
        {
            $this->Authentication();
        }
		public function index(){
			$list_product = $this->list_product();
			$info = $this->info();
			$category = $this->list_category();
			$this->renderHTML("views/backend/home.php",array("info"=>$info,"list_product"=>$list_product,"category"=>$category));
		}
		public function add(){
			$category = $this->category();
			$info = $this->info();
			$this->renderHTML("views/backend/add_product.php",array("info"=>$info,"category"=>$category));
		}
	}
 ?>