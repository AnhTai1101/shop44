<?php 
	include "models/frontend/productModel.php";
	class productController extends Controller{
		use productModel;
		public function all(){
			$all = $this->allProduct();
			$this->renderHTML("views/frontend/homeProduct.php",array("all"=>$all));
		}
		public function views(){
			$product = $this->info_product();
			$this->renderHTML("views/frontend/homeProduct.php");
		}
		public function productDetail(){
			$infoProduct = $this->info_product();
			$this->renderHTML("views/frontend/productDetail.php",array("infoProduct"=>$infoProduct));
		}
		public function product_listPage(){
			//số bản ghi trong 1 trang của 1 danh mục
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
			// biến này nhận số bản ghi bắt đầu trong trang số p
			$fromRecord = $p*$recordPerPage;			
			//----
			//goi ham model_get() trong class newsModel de lay du lieu
			// biến này sẽ lấy ra số bản ghi trong trang đó (bản ghi bắt đầu và số bản ghỉ)
			$data = $this->model_get($fromRecord,$recordPerPage);
			$this->renderHTML("views/backend/list_news.php", array("data"=>$data,"numPage"=>$numPage));
		}
		public function index(){
			$list_category = $this->list_category();
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
			$data = $this->model_getAll($fromRecord,$recordPerPage);
			$this->renderHTML("views/frontend/homeProduct.php", array("list_category"=>$list_category,"data"=>$data,"numPage"=>$numPage,"total"=>$total,"page"=>$page));
		}
		public function byProduct(){
			$list_category = $this->list_category();
			$id = isset($_GET['id']) ? $_GET['id'] : 1;
			//số bản ghi trong 1 trang tất cả danh mục
			// $page = isset($_GET['page']) ? $_GET['page'] : 1;
			$recordPerPage = 12;
			//----
			//phan trang	
			//tính tổng số tất cả bản nghi
			$total = $this->model_total_category();			
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
			$data = $this->model_get($id,$fromRecord,$recordPerPage);
			$this->renderHTML("views/frontend/homeProduct.php", array("list_category"=>$list_category,"data"=>$data,"numPage"=>$numPage,"total"=>$total,"page"=>$page));
		}
	}
 ?>