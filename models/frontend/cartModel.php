<?php
    trait cartModel{
        public function list_product(){
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT product.*,categories.name FROM product INNER JOIN categories ON product.category_id = categories.id");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
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
        public function info(){
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from user where email=:email");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute(array('email'=>$email));
            $info = $query->fetchAll();
            return $info;
        }
        public function cart_add($id){
            // Nếu như đã tồn tại sản phẩm trong giỏ hàng ta 
           
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['number']++;
            }else{  
                $conn = Connection::getInstance();
                $query = $conn->prepare("SELECT * FROM product WHERE id=:id");
                $query->execute(array("id"=>$id));
                $query->setFetchMode(PDO::FETCH_OBJ);
                $product = $query->fetch();
                // -- 
                // phân trang
                $_SESSION['cart'][$id] = array(
                    "id"=>$id,
                    "name"=>$product->title,
                    "price"=>$product->price,
                    "number"=>1,
                    "image"=>$product->image,
                    "image1"=>$product->image1,
                    "image2"=>$product->image2,
                    "content"=>$product->content
                );
            };
            
        }
    }
?>