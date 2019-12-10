<?php
    include "models/frontend/cartModel.php";
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
            $this->renderHTML("views/frontend/cart.php");
        }
        public function add(){
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0 ;
            $this->cart_add($id);
            // header("location:index.php?");
            return true;
        }
    }
?>