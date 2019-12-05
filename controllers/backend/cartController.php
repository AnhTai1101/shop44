<?php
    include "models/backend/cartModel.php";
    class cartController extends Controller{
        use cartModel;
        /**
         * Class constructor.
         */
        public function __construct()
        {
            // nếu chưa tồn tại giỏ hàng thì sẽ tạo biến để hứng dữ liệu
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
        }
        public function index(){
            $info = $this->info();
            $list_cart = $this->list_cart();
            $this->renderHTML("views/backend/cart.php",array("info"=>$info,"list_cart"=>$list_cart));
        }
        public function add(){
            $this->cart_add();
            header("location:index.php?");
        }
    }
?>