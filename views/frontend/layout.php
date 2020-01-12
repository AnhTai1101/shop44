<!DOCTYPE html>
<html lang="en">

<head>
    <title>Web Demo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <base href="assets/frontend/"> -->
    <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="assets/frontend/css/style.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/frontend/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>

                <span class="topbar-child1">
					Miễn phí vận chuyển đối với đơn hàng có giá trị từ 1.000.000đ
				</span>

                <div class="topbar-child2">
                    <span class="topbar-email">
						WebShop.com
					</span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
							<option>VNĐ</option>
							<option>USD</option>
						</select>
                    </div>
                </div>
            </div>

            <div class="wrap_header">
                <!-- Logo -->
                <a href="trangchu.html" class="logo">
                    <img src="assets/frontend/images/icons/logo.png" alt="IMG-LOGO">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="trangchu.html">Trang chủ</a>
                                <ul class="sub_menu">
                                    <li><a href="trangchu.html">Trang chủ V1</a></li>
                                    <li><a href="home-02.html">Trang chủ V2</a></li>
                                    <li><a href="home-03.html">Trang chủ V3</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="san-pham">Shop</a>
                            </li>

                            <li class="sale-noti">
                                <a href="san-pham">Sale</a>
                            </li>

                            <li>
                                <a href="gio-hang-cua-ban">Giỏ hàng</a>
                            </li>

                            <li>
                                <a href="blog.html">Bài viết</a>
                            </li>

                            <li>
                                <a href="about.html">Thông tin thêm</a>
                            </li>

                            <li>
                                <a href="contact.html">Địa chỉ</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">
                    <a id="show_login" href="#" class="header-wrapicon1 dis-block">
                        <!-- <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> -->
                    </a>
                    <img onclick="show_login()" src="assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">

                    <span class="linedivide1"></span>
                    <div class="header-wrapicon2">
                        <img src="assets/frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="number-cart header-icons-noti"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ; ?></span>
                        <div class="header-cart header-dropdown">
                        
                        <ul class="name_cart header-cart-wrapitem">
                            <?php $total = 0; ?>
                            <?php if(isset($_SESSION['cart'])): ?>
                            <?php foreach($_SESSION['cart'] as $cart): ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo $cart['image']; ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="chi-tiet-san-pham/<?php echo Controller::removeUnicode($cart['name']); ?>/<?php echo $cart['id']; ?>" class="header-cart-item-name">
                                       <?php echo $cart['name']; ?>
                                    </a><br>
                                    <span class="header-cart-item-info">
                                        Số lượng: <?php echo $cart['number']; ?> cái
                                    </span>
                                    <span class="header-cart-item-info">
                                    <?php echo strrev(chop(chunk_split(strrev($cart['price']),3,"."),".")); ?>đ
                                    <?php $total += $cart['number']*$cart['price']; ?>
                                    </span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                            
                            <?php else : echo "Bạn chưa mua gì! <br><br>" ?>
                        <?php endif; ?>
                        </ul>

                        <div id="" class="total-cart header-cart-total">
                            Total: 
                        <?php echo strrev(chop(chunk_split(strrev($total),3,"."),".")); ?>đ
                        
                        </div>
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="gio-hang-cua-ban" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Xem giỏ
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- <a href="index.php?controller=cart">
                    </a> -->
                    <!-- Header cart noti -->
                    
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap_header_mobile">
            <!-- Logo moblie -->
            <a href="trangchu.html" class="logo-mobile">
                <img src="assets/frontend/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Button show menu -->
            <div class="btn-show-menu">
                <!-- Header Icon mobile -->
                <div class="header-icons-mobile">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    </a>

                    <span class="linedivide2"></span>

                    <div class="header-wrapicon2">
                        <img src="assets/frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="number-cart header-icons-noti"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ; ?></span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="name_cart header-cart-wrapitem">
                            <?php $total1 = 0; ?>
                            <?php foreach($_SESSION['cart'] as $cart): ?>
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?php echo $cart['image']; ?>" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="chi-tiet-san-pham/<?php echo $cart['name']; ?>/<?php echo $cart['id']; ?>" class="header-cart-item-name">
                                        <?php echo $cart['name']; ?>
										</a>

                                        <span class="header-cart-item-info">
                                        <?php echo strrev(chop(chunk_split(strrev($cart['price']),3,"."),".")); ?>đ
										</span>
                                    </div>
                                </li>
                                <?php $total1 = $total1 + $cart['number']*$cart['price']; ?>
                            <?php endforeach; ?>
                            </ul>

                            <div class="total-cart header-cart-total">
                            <?php echo strrev(chop(chunk_split(strrev($total1),3,"."),".")); ?>đ
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="gio-hang-cua-ban" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem giỏ
									</a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Thanh toán
									</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
						<span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="wrap-side-menu">
            <nav class="side-menu">
                <ul class="main-menu">
                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <span class="topbar-child1">
							Miễn phí ship đối với những đơn hàng nào có giá trị trên 1.000.000đ
						</span>
                    </li>

                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <div class="topbar-child2-mobile">
                            <span class="topbar-email">
								fashe@example.com
							</span>

                            <div class="topbar-language rs1-select2">
                                <select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
                            </div>
                        </div>
                    </li>

                    <li class="item-topbar-mobile p-l-10">
                        <div class="topbar-social-mobile">
                            <a href="#" class="topbar-social-item fa fa-facebook"></a>
                            <a href="#" class="topbar-social-item fa fa-instagram"></a>
                            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                        </div>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="trangchu.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="trangchu.html">Trang chủ V1</a></li>
                            <li><a href="home-02.html">Trang chủ V2</a></li>
                            <li><a href="home-03.html">Trang chủ V3</a></li>
                        </ul>
                        <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="san-pham">Shop</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="san-pham">Sale</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="gio-hang-cua-ban">Features</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="blog.html">Blog</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="about.html">About</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(assets/frontend/images/master-slide-02.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Sản phẩm bán chạy mùa hè 2019
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="san-pham" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Vào Shop
							</a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(assets/frontend/images/master-slide-03.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                        Sản phẩm bán chạy mùa hè 2019 
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="san-pham" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Vào Shop
							</a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(assets/frontend/images/master-slide-04.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                        Sản phẩm bán chạy mùa hè 2019 
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="san-pham" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Vào Shop
							</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <pre>
    <?php //print_r($_SESSION); ?>
    </pre>
    <?php echo $this->view; ?>


    <!-- Footer -->
    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
        <div class="flex-w p-b-90">
            <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    Thông tin liên lạc
                </h4>

                <div>
                    <p class="s-text7 w-size27">
                        Bạn có thể đặt câu hỏi cho chúng tôi nếu cần thiết qua đường dây nóng 1900.090. Hoặc qua các mạng xã hội.
                    </p>

                    <div class="flex-m p-t-30">
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                    </div>
                </div>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Danh mục sản phẩm
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Nam
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Nữ
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Trẻ em
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Phụ kiện
						</a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Bài tin
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Search
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							About Us
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Contact Us
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Returns
						</a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Giúp đỡ
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Track Order
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							Returns
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="trangchu.html" class="s-text7">
							Trang chủ
						</a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
							FAQs
						</a>
                    </li>
                </ul>
            </div>

            <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    Tin mới
                </h4>

                <form>
                    <div class="effect1 w-size9">
                        <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                        <span class="effect1-line"></span>
                    </div>

                    <div class="w-size2 p-t-20">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Nhận tin
						</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="t-center p-l-15 p-r-15">
            <a href="#">
                <img class="h-size2" src="assets/frontend/images/icons/paypal.png" alt="IMG-PAYPAL">
            </a>

            <a href="#">
                <img class="h-size2" src="assets/frontend/images/icons/visa.png" alt="IMG-VISA">
            </a>

            <a href="#">
                <img class="h-size2" src="assets/frontend/images/icons/mastercard.png" alt="IMG-MASTERCARD">
            </a>

            <a href="#">
                <img class="h-size2" src="assets/frontend/images/icons/express.png" alt="IMG-EXPRESS">
            </a>

            <a href="#">
                <img class="h-size2" src="assets/frontend/images/icons/discover.png" alt="IMG-DISCOVER">
            </a>

            <div class="t-center s-text8 p-t-20">
                Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Super Amind</a>
            </div>
        </div>
    </footer>



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>
    <div class="fix ">
        <br>
        <h2>Thông tin đăng nhập</h2>
        <form class="form-horizontal" action="index.php?area=backend&controller=login&action=login" method="POST">
            <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">          
                <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật khẩu" name="password">
            </div>
            </div>
            <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                <label><input type="checkbox" name="remember"> Nhớ tài khoản</label>
                </div>
            </div>
            </div>
            <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Đăng nhập</button>
            </div>
            </div>
        </form>
    </div>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="assets/frontend/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="assets/frontend/vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
    
     
    </script>

    <!--===============================================================================================-->
    <script src="assets/frontend/js/main.js"></script>
    <script src="assets/frontend/js/1.js"></script>

</body>

</html>