<?php
    include "models/backend/orderModel.php";
    class orderController extends Controller{
        use orderModel;
        public function index(){
            $info = $this->info();
            $category = $this->list_category();
            $list_order = $this->list_order();
            $this->renderHTML('views/backend/order.php',array('list_order'=>$list_order,'info'=>$info,'caregory'=>$category));
        }
    }
?>