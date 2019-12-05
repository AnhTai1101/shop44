<?php
    include "models/backend/cartModel.php";
    class cartController extends Controller{
        /**
         * Class constructor.
         */
        public function __construct()
        {
            $this-> Authentication();
        }
        public function index(){
            $info = $this->info();
            $list_cart = $this->list_cart();
            $this->renderHTML("views/backend/cart.php",array("info"=>$info,"list_cart"=>$list_cart));
        }
    }
?>