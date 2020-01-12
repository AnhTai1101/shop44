<?php 
	include "models/backend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function __construct()
        {
            $this->Authentication();
		}
		public function one_product(){
			$info = $this->info();
			$category = $this->list_category();
			$list_product = $this->oneProduct();
			$total = count($list_product);
			$this->renderHTML('views/backend/oneProduct.php',array("list_product"=>$list_product,"info"=>$info,"category"=>$category,"total"=>$total));
		}
		public function index(){
			// $list_product = $this->list_product();
			$info = $this->info();
			$category = $this->list_category();
			//số bản ghi trong 1 trang tất cả danh mục
			// $page = isset($_GET['page']) ? $_GET['page'] : 1;
			$recordPerPage = 8;
			//----
			//phan trang	
			//tính tổng số tất cả bản nghi
			$total = $this->model_total();			
			//tính tổng số trang
			$numPage = ceil($total/$recordPerPage);//ham ceil de lay tran
			//lay bien p truyen tu url -> bien nay the hien la dang o may
			// nhận thông tin xem đang nằm tại trang bao nhiêu
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])? $_GET["p"]-1:0;
			$page = $p + 1;
			// biến này nhận số bản ghi bắt đầu trong trang số p
			$fromRecord = $p*$recordPerPage;			
			//----
			//goi ham model_get() trong class newsModel de lay du lieu
			// biến này sẽ lấy ra số bản ghi trong trang đó (bản ghi bắt đầu và số bản ghỉ)
			$list_product = $this->model_getAll($fromRecord,$recordPerPage);
			$this->renderHTML('views/backend/product.php',array("list_product"=>$list_product,"info"=>$info,"category"=>$category,"numPage"=>$numPage,"total"=>$total,"page"=>$page));
		}
		public function info(){
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from user where email=:email");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute(array('email'=>$email));
            $info = $query->fetchAll();
            return $info;
        }
		public function delete(){
			$this->delete_product();
			header("location:index.php?area=backend&controller=product&p=1");
		}
		public function edit(){
			$info_product = $this->info_product();
			$category = $this->list_category();
			$info = $this->info();
			$this->renderHTML("views/backend/info_product.php",array("info_product"=>$info_product,"info"=>$info,"category"=>$category));
		}
		public function go_edit(){
            $this->edit_product();
			header("location:index.php?area=backend&controller=product");
		}
		public function go_add(){
			$this->insert_product();
			header("location:index.php?area=backend&controller=product&p=1");
			// $this->renderHTML("views/backend/error.php", array("error",$error));
		}
		public function add(){
			$category = $this->list_category();
			$info = $this->info();
			$this->renderHTML("views/backend/add_product.php",array("info"=>$info,"category"=>$category));
		}
		
	}
 ?>