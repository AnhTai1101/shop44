<?php $this->layout = "views/frontend/layout.php"; ?>
   <!-- Banner -->
   <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="assets/frontend/images/banner-02.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Váy đầm
							</a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="assets/frontend/images/banner-05.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Kính mắt
							</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="assets/frontend/images/banner-03.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Đồng hồ
							</a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="assets/frontend/images/banner-07.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Giày
							</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="assets/frontend/images/banner-04.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
									Balo
							</a>
                        </div>
                    </div>

                    <!-- block2 -->
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img src="assets/frontend/images/icons/bg-01.jpg" alt="IMG">

                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                Đăng nhập để có thể được giảm giá tới 10%
                            </h4>

                            <p class="t-center w-size4">
                               Hãy là người đầu tiên biết tới những khuyến mại của chúng tôi
                            </p>

                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Đăng nhập
								</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Những sản phẩm nổi bật
                </h3>
            </div>
            <pre>
                <?php //print_r($_SESSION); ?>
            </pre>
            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php foreach($list_product as $list_product): ?>
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="<?php echo $list_product->image; ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div id="<?php echo $list_product->id; ?>" class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Thêm vào giỏ
										</button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="chi-tiet-san-pham/<?php echo Controller::removeUnicode($list_product->title); ?>/<?php echo $list_product->id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $list_product->title; ?>
								</a>

                                <span class="block2-price m-text6 p-r-5">
									<?php echo strrev(chop(chunk_split(strrev($list_product->price),3,"."),".")); ?>đ
								</span>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Banner2 -->
    <section class="banner2 bg5 p-t-55 p-b-55">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                    <div class="hov-img-zoom pos-relative">
                        <img src="assets/frontend/images/banner-08.jpg" alt="IMG-BANNER">

                        <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
                            <span class="m-text9 p-t-45 fs-20-sm">
								Sản phẩm đẹp
							</span>

                            <h3 class="l-text1 fs-35-sm">
                                Đặt hàng
                            </h3>

                            <a href="#" class="s-text4 hov2 p-t-20 ">
								Xem sản phẩm
							</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                    <div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
                        <img src="assets/frontend/images/shop-item-09.jpg" alt="IMG-BANNER">

                        <div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
                            <div class="t-center">
                                <a href="index.php?controller=product&id=1" class="dis-block s-text3 p-b-5">
									Gafas sol Hawkers one
								</a>

                                <span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

                                <span class="block2-newprice m-text8">
									$15.90
								</span>
                            </div>

                            <div class="flex-c-m p-t-44 p-t-30-xl">
                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 days">
										69
									</span>

                                    <span class="s-text5">
										days
									</span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 hours">
										04
									</span>

                                    <span class="s-text5">
										hrs
									</span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 minutes">
										32
									</span>

                                    <span class="s-text5">
										mins
									</span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 seconds">
										05
									</span>

                                    <span class="s-text5">
										secs
									</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Những bài viết bạn nên biết
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="assets/frontend/images/blog-01.jpg" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
									Thứ 6 ngày 13: Best sale
								</a>
                            </h4>

                            <span class="s-text6">Bởi</span> <span class="s-text7">Anh chủ shop</span>
                            <span class="s-text6">vào</span> <span class="s-text7"> 22/5/2019</span>

                            <p class="s-text8 p-t-16">
                                KHUYẾN MÃI THỨ 6 NGÀY 13 - THÊM 25% GIẢM GIÁ
                                Bắt nguồn từ các nước phương Tây, thứ 6 ngày 13 được coi là ngày thiếu may mắn trong năm, những nỗi sợ hãi mang tên thứ 6 ngày 13 luôn khiến ai đó chúng ta giật mình. Để biến mọi lo âu thành sự may mắn, niềm hạnh phúc, LUPERI sẽ biến thứ 6 ngày 13 của bạn và kì nghỉ cuối tuần này trở thành "NGÀY ĐÁNG ĐƯỢC MONG NGÓNG NHẤT" 
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="assets/frontend/images/blog-02.jpg" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                Xuân vàng nhân văn - vạn deal đón lộc
								</a>
                            </h4>

                            <span class="s-text6">Bởi</span> <span class="s-text7">Anh chủ shop</span>
                            <span class="s-text6">vào</span> <span class="s-text7">15/12/2019</span>

                            <p class="s-text8 p-t-16">
                            Chào đón Tết Canh Tý, Nhà Sách Nhân Văn gửi đến chương trình Khai hội “Xuân Vàng Nhân Văn - Vạn Deal Đón Lộc” giảm thêm 30% tối đa 50k cho đơn hàng sách bất kỳ tại https://nhanvan.vn khi thanh toán bằng ví điện tử MoMo.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="assets/frontend/images/blog-03.jpg" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                Mở thẻ nhận quà
								</a>
                            </h4>

                            <span class="s-text6">Bởi</span> <span class="s-text7">Anh chủ shop</span>
                            <span class="s-text6">vào</span> <span class="s-text7">12/12/2019</span>

                            <p class="s-text8 p-t-16">
                                Làm đẹp là phải làm ngay. Đăng kí nhanh gói vay “Beauty Up” để được hỗ trợ tài chính đến 200 triệu- sẵn sàng thay đổi ngoại hình và sở hữu vẻ ngoài không khuyết điểm.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram -->
    <section class="instagram p-t-20">
        <div class="sec-title p-b-52 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                @ Theo dõi trên trang Facebook của chúng tôi
            </h3>
        </div>

        <div class="flex-w">
            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="assets/frontend/images/gallery-03.jpg" alt="IMG-INSTAGRAM">

                <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                    <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
                    </span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Shop Thời Trang Online Love Tree với phương châm "Đồng hành cùng phong cách thời trang của bạn" sẽ là nơi mua sắm an toàn và uy tín, bởi chúng tôi luôn đề cao tiêu chí mang đến cho quý khách những sản phẩm chất lượng nhất với giá cả luôn phải chăng. 
                        </p>

                        <span class="s-text9">
							Photo by @Admin
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="assets/frontend/images/gallery-07.jpg" alt="IMG-INSTAGRAM">

                <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                    <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
                    </span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Shop Thời Trang Online Love Tree với phương châm "Đồng hành cùng phong cách thời trang của bạn" sẽ là nơi mua sắm an toàn và uy tín, bởi chúng tôi luôn đề cao tiêu chí mang đến cho quý khách những sản phẩm chất lượng nhất với giá cả luôn phải chăng. 
                        </p>

                        <span class="s-text9">
							Photo by @Admin
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="assets/frontend/images/gallery-09.jpg" alt="IMG-INSTAGRAM">

                <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                    <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
                    </span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Shop Thời Trang Online Love Tree với phương châm "Đồng hành cùng phong cách thời trang của bạn" sẽ là nơi mua sắm an toàn và uy tín, bởi chúng tôi luôn đề cao tiêu chí mang đến cho quý khách những sản phẩm chất lượng nhất với giá cả luôn phải chăng. 
                        </p>

                        <span class="s-text9">
							Photo by @Admin
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="assets/frontend/images/gallery-13.jpg" alt="IMG-INSTAGRAM">

                <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                    <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
                    </span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Shop Thời Trang Online Love Tree với phương châm "Đồng hành cùng phong cách thời trang của bạn" sẽ là nơi mua sắm an toàn và uy tín, bởi chúng tôi luôn đề cao tiêu chí mang đến cho quý khách những sản phẩm chất lượng nhất với giá cả luôn phải chăng. 
                        </p>

                        <span class="s-text9">
							Photo by @Admin
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="assets/frontend/images/gallery-15.jpg" alt="IMG-INSTAGRAM">

                <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                    <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
                    </span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Shop Thời Trang Online Love Tree với phương châm "Đồng hành cùng phong cách thời trang của bạn" sẽ là nơi mua sắm an toàn và uy tín, bởi chúng tôi luôn đề cao tiêu chí mang đến cho quý khách những sản phẩm chất lượng nhất với giá cả luôn phải chăng. 
                        </p>

                        <span class="s-text9">
							Photo by @Admin
						</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Giao hàng miễn phí toàn quốc
                </h4>

                <a href="#" class="s-text11 t-center">
					Bấm để vào xem
				</a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Chính sách đổi trả 30 ngày
                </h4>

                <span class="s-text11 t-center">
					Không cần thiết phải gặp lỗi, vẫn đổi trả
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Gia nhập chuỗi cửa hàng
                </h4>

                <span class="s-text11 t-center">
					Liên hệ Anh chủ shop
				</span>
            </div>
        </div>
    </section>