<?php
    include "models/backend/loginModel.php";
    class loginController extends Controller{
        use loginModel;
        public function index(){
			//hien thi view
			$this->renderHTML("views/backend/login.php");
		}
		public function login(){
			//goi ham model_login
			$data = $this->get_id();
			//print_r($data);
			//kiem tra du lieu
			if(isset($data->email)){
				//dang nhap thanh cong
				$_SESSION["email"] = $data->email;				
				$_SESSION["avatar"] = $data->avatar;				
			}
			header("location:index.php?area=backend");//<=>index.php?area=backend&controller=home&action=index
		}
    }
?>