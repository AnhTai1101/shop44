<?php 
	include "models/backend/homeModel.php";
	class homeController extends Controller{
		use homeModel;
		public function __construct()
        {
            $this->Authentication();
        }
		public function index(){
			// $list_product = $this->list_product();
			$info = $this->info();
			$category = $this->list_category();
			//số bản ghi trong 1 trang tất cả danh mục
			// $page = isset($_GET['page']) ? $_GET['page'] : 1;
			$recordPerPage = 12;
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
			$this->renderHTML('views/backend/home.php',array("list_product"=>$list_product,"info"=>$info,"category"=>$category,"numPage"=>$numPage,"total"=>$total,"page"=>$page));
		}
		public function add(){
			$category = $this->category();
			$info = $this->info();
			$this->renderHTML("views/backend/add_product.php",array("info"=>$info,"category"=>$category));
		}
	}
 ?>