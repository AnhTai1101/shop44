<?php 
	include "models/backend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function __construct()
        {
            $this->Authentication();
        }
		public function edit(){
            $this->edit_product();
			header("location:index.php?area=backend");
		}
		public function add(){
			$this->insert_product();
			header("location:index.php?area=backend");
		}
	}
 ?>