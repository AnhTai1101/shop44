<?php
    include "models/backend/orderModel.php";
    class orderController extends Controller{
        use orderModel;
        public function index(){
            $info = $this->info();
			$category = $this->list_category();
            $this->renderHTML('views/backend/order.php',array('info'=>$info,'caregory'=>$category));
        }
    }
?>