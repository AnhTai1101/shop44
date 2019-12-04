<?php
    trait productModel{
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
                    
                    // $query = $conn->prepare("UPDATE product SET image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
                    // $query->setFetchMode(PDO::FETCH_OBJ);
                    // $query->execute(array("id"=>$id,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));

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
                    
                    // $query = $conn->prepare("UPDATE product SET image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
                    // $query->setFetchMode(PDO::FETCH_OBJ);
                    // $query->execute(array("id"=>$id,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));

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
                    
                    // $query = $conn->prepare("UPDATE product SET image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
                    // $query->setFetchMode(PDO::FETCH_OBJ);
                    // $query->execute(array("id"=>$id,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));

                }
            }
            // end edit image
            // $image1 = isset($_POST['image1']) ? "assets/frontend/images/product/".$_POST['image1'] : '';
            // $image2 = isset($_POST['image2']) ? "assets/frontend/images/product/".$_POST['image2'] : '';
            // $conn = Connection::getInstance();
            // $query = $conn->prepare("UPDATE product SET image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
            // $query->setFetchMode(PDO::FETCH_OBJ);
            // $query->execute(array("id"=>$id,"image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));
        }
        public function insert_product(){
            // $image = isset($_POST['image']) ? "assets/frontend/images/product/".$_POST['image'] : '';
            // $image1 = isset($_POST['image1']) ? "assets/frontend/images/product/".$_POST['image1'] : '';
            // $image2 = isset($_POST['image2']) ? "assets/frontend/images/product/".$_POST['image2'] : '';
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y/m/d H:i:s');
            $update_at = $date;
            $created_at = $date;
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            //-- 
            // phân trang 
            // insert trừ ảnh
            $conn = Connection::getInstance();
            $query = $conn->prepare("INSERT INTO product SET created_at=:created_at, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
            // -- end insert trừ ảnh
            // phan trang
            // image chinh
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
                    $upload = move_uploaded_file($tmpName,$description);
                    // xét xem nếu lưu thành công thì sẽ làm các bước tiếp theo
                    if($upload == TRUE){
                        $image = $destination;
                    }$conn = Connection::getInstance();
                    $query = $conn->prepare("UPDATE product SET image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description WHERE id=:id");
                    $query->setFetchMode(PDO::FETCH_OBJ);
                    $query->execute(array("id"=>$id,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description));

                }
            }
            // $conn = Connection::getInstance();
            // $query = $conn->prepare("INSERT INTO product SET created_at=:created_at, image=:image, image1=:image1, image2=:image2, category_id=:category_id, status=:status, update_at=:update_at,title=:title,price=:price,content=:content,news_id=:news_id,description=:description");
            // $query->setFetchMode(PDO::FETCH_OBJ);
            // $query->execute(array("image"=>$image,"image1"=>$image1,"image2"=>$image2,"category_id"=>$category_id,"status"=>$status,"update_at"=>$update_at,"title"=>$title,"price"=>$price,"content"=>$content,"news_id"=>$news_id,"description"=>$description,"created_at"=>$created_at));
        }
    } 
?>