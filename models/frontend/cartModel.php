<?php
    trait cartModel{
        public  function saveCart(){
            $tinh = isset($_POST['tinh']) ? $_POST['tinh'] : 't' ;
            $huyen = isset($_POST['huyen']) ? $_POST['huyen'] : 'h' ;
            $email = isset($_POST['email']) ? $_POST['email'] : 'e' ;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : 'phone' ;
            $duong = isset($_POST['duong']) ? $_POST['duong'] : 'duong' ;
            $send = array("tinh"=>$tinh,"huyen"=>$huyen,"email"=>$email,"phone"=>$phone,"duong"=>$duong);
            return $send;
        }
        public  function updateCart(){
            $totalCart = 0;
            $html = '<h5>Cám ơn quý khách đã ghé thăm cửa hàng và đặt mua sản phầm. Sau đây là thông tin đơn hàng của quý khách.</h5>';
            $html .= '<h2>Thông tin đơn hàng</h2>';
            $html .= '<style> table, th, td { border: 1px solid black; } </style><table> <tr> <th>Tên</th> <th>Số lượng</th> <th> </th> <th>Giá</th> ';
            foreach($_SESSION['cart'] as $cart){
                $html .= '<tr>' ;
                $html .= "<td>". $cart['name']."</td>"; // ->name
                $html .= "<td>". $cart['number']."</td>"; // ->price
                $html .= "<td> </td>";
                $html .= "<td>". $cart['price']."</td>"; // ->number
                $html .= '</tr>' ;
                $totalCart += $cart['price']*$cart['number'];
            }
            $html .= '<tr>' ;
            $html .= "<td> Tổng:</td>"; // ->name
            $html .= "<td></td>"; // ->name
            $html .= "<td> </td>";
            $html .= "<td>". $totalCart ."</td> .đ"; // ->name
            $html .= '</tr>' ;
            $html .= '<h5>Nếu có bất kỳ thắc mắc nào bạn có thể liên hệ với chúng tôi thông qua mail này hoặc gọi điện tới số điện thoại. 0900000990</h5>';
            return $html;
        }
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
            $cart =$_SESSION['cart'];
            return $cart;
        }
        // hàm thêm sản phẩm có thêm thông tin size và color
        public function cart_addDetail($id){
            $size = isset($_GET['size']) ? $_GET['size'] : 0 ;
            $color = isset($_GET['color']) ? $_GET['color'] : 0 ;
            $number = isset($_GET['number']) ? $_GET['number'] : 1 ;
            $conn = Connection::getInstance();
            $query = $conn->prepare("SELECT * FROM product WHERE id=:id");
            $query->execute(array("id"=>$id));
            $query->setFetchMode(PDO::FETCH_OBJ);
            $product = $query->fetchAll();
            // -- 
            // phân trang
            $_SESSION['cart'][$id] = array(
                "id"=>$id,
                "size"=>$size,
                "color"=>$color,
                "name"=>$product[0]->title,
                "price"=>$product[0]->price,
                "number"=>$number,
                "image"=>$product[0]->image,
                "image1"=>$product[0]->image1,
                "image2"=>$product[0]->image2,
                "content"=>$product[0]->content,
                "name-no"=>Controller::removeUnicode($product[0]->title) 
            );
            $cart =$_SESSION['cart'];
            return $cart;
        }
        // tạo hàm xóa mảng trong giỏ hàng
        public function delete_cart($id){
            unset($_SESSION['cart'][$id]);
        }
        // ham xoa toan bo san pham
        public function delete_all(){
            unset($_SESSION['cart']);
        }
        public function update(){
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0 ;
            $number = isset($_POST['number']) ? (int)$_POST['number'] : 0 ;
            $_SESSION['cart'][$id]['number'] = $number;
            return $_SESSION['cart'][$id]['number']*$_SESSION['cart'][$id]['price']; ;
        }
        public function saveDB(){
            $email = isset($_POST['email']) ? $_POST['email'] : 'e' ;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : 'phone' ;
            $product_id = '';
            $number = '';
            $price = '';
            $name = '';
            foreach($_SESSION['cart'] as $cart){
                $product_id .= $cart['id'].',';
                $number .= $cart['number'].',';
                $price .= $cart['price'].',';
                $name .= $cart['name'].',';
            }
            $date = date('Y/m/d H:i:s');
            $conn = Connection::getInstance();
            $query = $conn->prepare("INSERT INTO list_order SET product_id=:product_id, name=:name, number=:number,date=:date,price=:price, email=:email, phone=:phone");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute(array("email"=>$email,"phone"=>$phone,"name"=>$name,"price"=>$price,"product_id"=>$product_id,"date"=>$date,"number"=>$number));
        }
    }
?>