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
            $info = $this->info();
            $this->renderHTML("views/frontend/cart.php",array("info"=>$info));
        }
        public function add(){
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0 ;
            // nếu như tồn tại thì chạy hàm còn không thì bỏ
            // $number = 0;
            // if($id > 0){
            //     $number = $this->cart_add($id);
            // }
            $cart = $this->cart_add($id);
            $cart = json_encode($cart);
            echo $cart;
            // print_r($number);
        }
        // xoa don hang
        public function delete(){
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0 ;
            $this->delete_cart($id);
            // nếu để ajax
            // return true;
            // nếu để chạy thường
            header("location:index.php?controller=cart");
        } 
    }
?>