<?php
    include "models/frontend/categoryModel.php";
    class categoryController extends Controller{
        use categoryModel;
        public function index(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $list_product = $this->list_category($id);
            $this->renderHTML("views/frontend/category.php", array('list_product'=>$list_product));
            // return $list_product;
            // echo "<pre>";
            // print_r($list_product);
            // echo "</pre>";
        }
    }
?>