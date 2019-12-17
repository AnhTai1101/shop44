<?php
    include "models/frontend/cartModel.php";
    class testController extends Controller{
        use cartModel;
        public function index(){
            $this->renderHTML("views/frontend/test.php");
        }
        public function test(){
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0 ;
            $name = $this->cart_add($id);
            echo $id;
        }
    }
?>