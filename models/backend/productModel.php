<?php
    trait productModel{
        public function info(){
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from user where email=:email");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute(array('email'=>$email));
            $info = $query->fetchAll();
            return $info;
        }
        public function oneProduct(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT * FROM product WHERE category_id=:id order by id desc");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array('id'=>$id));
            $result = $query->fetchAll();
            return $result;
        }
        public function model_total(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi cau truy van
			$query = $conn->prepare("select * from product");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute();
			//dem so luong ban ghi
			$numberRecord = $query->rowCount();
			return $numberRecord;
        }
        public function model_getAll($fromRecord,$recordPerPage){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();			
			//chuan bi cau truy van
			$query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id order by id desc limit $fromRecord,$recordPerPage");
			//chon che de duyet ban ghi
			$query->setFetchMode(PDO::FETCH_OBJ);
			//thuc hien truy van
			$query->execute();
			//duyet tat ca cac ban ghi nem ve mot bien
			$result = $query->fetchAll();
			return $result;
		}
        public function list_category(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from categories");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        public function list_product(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        public function info_product(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id WHERE product.id =:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id));
            $result = $query->fetchAll();
            return $result;
        }
        public function delete_product(){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("DELETE FROM product WHERE id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id));
        }
        public function edit_product(){
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : 0;
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            //--
            // Phân trang
            // insert trừ ảnh
            $conn = Connection::getInstance();
            $query = $conn->prepare("UPDATE product SET category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("id"=>$id,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));
            // -- 
            // phân trang
            $image = '';
            if(isset($_FILES['image'])){
                if($_FILES['image']['error'] != 0){
                    // phan nay de sau viet
                }else{
                    // đường dẫn file upload
                    $file_upload = "assets/upload/product";
                    // kiểm tra xem nếu file upload chưa được tạo thì ta sẽ tạo ra file upload
                    if(file_exists($file_upload) == FALSE){
                        mkdir("$file_upload");
                    }
                    // chuyển file vào trong thư mục upload
                    //-- 
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image']['tmp_name'];
                    // tên đường dẫn vật lý
                    $destination = $file_upload . '/' . time() . '_' . $_FILES['image']['name'];
                    // lưu file vào đường dẫn vật lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xét xem nếu lưu thành công thì sẽ làm các bước tiếp theo
                    //--
                    // Phân trang
                    // lấy ảnh cũ để xóa
                    $image_old = $conn->prepare("SELECT image FROM product WHERE id=:id");
                    $image_old->setFetchMode(PDO::FETCH_OBJ);
                    $image_old->execute(array("id"=>$id));
                    $delete_image = $image_old->fetch();
                    if(isset($delete_image->image)){
                        // xóa ảnh cũ
                        unlink($delete_image->image);
                    }
                    // end xóa ảnh cũ
                    // đưa vào database
                    if($upload == TRUE){
                        $image = $destination; 
                        $query = $conn->prepare("UPDATE product SET image=:image WHERE id=:id");
                        $query->execute(array("id"=>$id,"image"=>$image));
                    }
                    // end database
                }
            }
            // end edit image
            // phân trang
            $image1 = '';
            if(isset($_FILES['image1'])){
                if($_FILES['image1']['error'] != 0){
                    // phan nay de sau viet
                }else{
                    // đường dẫn file upload
                    $file_upload = "assets/upload/product";
                    // kiểm tra xem nếu file upload chưa được tạo thì ta sẽ tạo ra file upload
                    if(file_exists($file_upload) == FALSE){
                        mkdir("$file_upload");
                    }
                    // chuyển file vào trong thư mục upload
                    //-- 
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image1']['tmp_name'];
                    // tên đường dẫn vật lý
                    $destination = $file_upload . '/' . time() . '_' . $_FILES['image1']['name'];
                    // lưu file vào đường dẫn vật lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xét xem nếu lưu thành công thì sẽ làm các bước tiếp theo
                    //--
                    // Phân trang
                    // lấy ảnh cũ để xóa
                    $image_old = $conn->prepare("SELECT image1 FROM product WHERE id=:id");
                    $image_old->setFetchMode(PDO::FETCH_OBJ);
                    $image_old->execute(array("id"=>$id));
                    $delete_image = $image_old->fetch();
                    if(isset($delete_image->image1)){
                        // xóa ảnh cũ
                        unlink($delete_image->image1);
                    }
                    // end xóa ảnh cũ
                    // đưa vào database
                    if($upload == TRUE){
                        $image1 = $destination; 
                        $query = $conn->prepare("UPDATE product SET image1=:image1 WHERE id=:id");
                        $query->execute(array("id"=>$id,"image1"=>$image1));
                    }
                    // end database
                }
            }
            // end edit image
            // phân trang
            $image2 = '';
            if(isset($_FILES['image2'])){
                if($_FILES['image2']['error'] != 0){
                    // phan nay de sau viet
                }else{
                    // đường dẫn file upload
                    $file_upload = "assets/upload/product";
                    // kiểm tra xem nếu file upload chưa được tạo thì ta sẽ tạo ra file upload
                    if(file_exists($file_upload) == FALSE){
                        mkdir("$file_upload");
                    }
                    // chuyển file vào trong thư mục upload
                    //-- 
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image2']['tmp_name'];
                    // tên đường dẫn vật lý
                    $destination = $file_upload . '/' . time() . '_' . $_FILES['image2']['name'];
                    // lưu file vào đường dẫn vật lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xét xem nếu lưu thành công thì sẽ làm các bước tiếp theo
                    //--
                    // Phân trang
                    // lấy ảnh cũ để xóa
                    $image_old = $conn->prepare("SELECT image2 FROM product WHERE id=:id");
                    $image_old->setFetchMode(PDO::FETCH_OBJ);
                    $image_old->execute(array("id"=>$id));
                    $delete_image = $image_old->fetch();
                    if(isset($delete_image->image2)){
                        // xóa ảnh cũ
                        unlink($delete_image->image2);
                    }
                    // end xóa ảnh cũ
                    // đưa vào database
                    if($upload == TRUE){
                        $image2 = $destination; 
                        $query = $conn->prepare("UPDATE product SET image2=:image2 WHERE id=:id");
                        $query->execute(array("id"=>$id,"image2"=>$image2));
                    }
                    // end database
                }
            }
        }
        public function inserts_product(){
            $image = "";
            $image1 = '';
            $image2 = '';
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $created_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : 1;
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            //-- 
            // phân trang 
            $conn = Connection::getInstance();
            $query = $conn->prepare("INSERT INTO product SET created_at=:created_at, image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
        }
        public function insert_product(){
            // tạo biến toàn cục
            $image = '';
            // xét nếu có tồn tại File hay không
            if(isset($_FILES['image'])){
                if($_FILES['image']['error'] != 0){
                    // nếu như có lỗi trong quá trình up load ta sẽ thông báo ở đây
                }else{
                    // nếu như không có lỗi nghĩa là upload thành công ta sẽ thực hiện ở đây
                    // gán đường dẫn cho ảnh khi upload lên
                    $url_upload = "assets/upload/product";
                    // nếu như file chưa tồn tại
                    if(file_exists($url_upload) == FALSE){
                        // đường dẫn chưa tồn tại ta sẽ tạo mới
                        mkdir($url_upload);
                    }
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image']['tmp_name'];
                    // tạo tên đường dẫn vậy lý
                    $destination = $url_upload . '/' . time() . '_' . $_FILES['image']['name'];
                    // chuyển file vào đường dẫn vậy lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xem có lưu thành công không
                    if($upload == TRUE){
                        // nếu lưu thành công ta sẽ đưa tên ảnh vào trong database
                        $image = $destination;
                    }   
                }
            }
            // end set image chính
            //-- 
            // set image phụ 1
            $image1 = '';
            if(isset($_FILES['image1'])){
                if($_FILES['image1']['error'] != 0){
                    // nếu như có lỗi trong quá trình up load ta sẽ thông báo ở đây
                }else{
                    // nếu như không có lỗi nghĩa là upload thành công ta sẽ thực hiện ở đây
                    // gán đường dẫn cho ảnh khi upload lên
                    $url_upload = "assets/upload/product";
                    // nếu như file chưa tồn tại
                    if(file_exists($url_upload) == FALSE){
                        // đường dẫn chưa tồn tại ta sẽ tạo mới
                        mkdir($url_upload);
                    }
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image1']['tmp_name'];
                    // tạo tên đường dẫn vậy lý
                    $destination = $url_upload . '/' . time() . '_' . $_FILES['image1']['name'];
                    // chuyển file vào đường dẫn vậy lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xem có lưu thành công không
                    if($upload == TRUE){
                        // nếu lưu thành công ta sẽ đưa tên ảnh vào trong database
                        $image1 = $destination;
                    }
                }
            }
            // end set image phụ 1
            //--
            // set image phụ 2
            $image2 = '';
            if(isset($_FILES['image2'])){
                if($_FILES['image2']['error'] != 0){
                    // nếu như có lỗi trong quá trình up load ta sẽ thông báo ở đây
                }else{
                    // nếu như không có lỗi nghĩa là upload thành công ta sẽ thực hiện ở đây
                    // gán đường dẫn cho ảnh khi upload lên
                    $url_upload = "assets/upload/product";
                    // nếu như file chưa tồn tại
                    if(file_exists($url_upload) == FALSE){
                        // đường dẫn chưa tồn tại ta sẽ tạo mới
                        mkdir($url_upload);
                    }
                    // lấy tên đường dẫn tương đối
                    $tmpName = $_FILES['image2']['tmp_name'];
                    // tạo tên đường dẫn vậy lý
                    $destination = $url_upload . '/' . time() . '_' . $_FILES['image2']['name'];
                    // chuyển file vào đường dẫn vậy lý
                    $upload = move_uploaded_file($tmpName, $destination);
                    // xem có lưu thành công không
                    if($upload == TRUE){
                        // nếu lưu thành công ta sẽ đưa tên ảnh vào trong database
                        $image2 = $destination;
                    }
                }
            }
            // end set image phụ 2
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $created_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : 1;
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            //-- 
            // phân trang 
            // $conn = Connection::getInstance();
            // $query = $conn->prepare("INSERT INTO product SET image=:image, image1=:image1, image2=:images, category_id=:category_id, status=:status,  update_at=:update_at, title=:title, price=:price, content=:content, news_id=:news_id, description=:description, created_at=:created_at");
            // $query->setFetchMode(PDO::FETCH_OBJ);
            // $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
            // --
            // phân trang
            $conn = Connection::getInstance();
            $query = $conn->prepare("INSERT INTO product SET created_at=:created_at, image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
            //--
            // $conn = Connection::getInstance();
            // $query = $conn->prepare("INSERT INTO product SET created_at=:created_at, image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            // $query->setFetchMode(PDO::FETCH_OBJ);
            // $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
        }
    } 
?>