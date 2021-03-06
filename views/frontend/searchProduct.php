<?php $this->layout = "views/frontend/layout.php"; ?>
	<!-- Title Page -->
	<!-- <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section> -->


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Danh mục
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="san-pham" class="s-text13 active1">
									Tất cả
								</a>
							</li>
							<?php foreach($list_category as $list_category): ?>
							<li class="p-t-4">
								<a href="danh-muc-san-pham/<?php echo $list_category->id; ?>" class="s-text13">
									<?php echo $list_category->name; ?>
								</a>
							</li>
							<?php endforeach; ?>
<!-- 
							<li class="p-t-4">
								<a href="#" class="s-text13">
									Quần áo nam
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Trẻ em
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Phụ kiện
								</a>
							</li> -->
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Lọc theo:
						</h4>

						<!-- <div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Giá
							</div>

							<div class="wra-filter-bar">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Nhập số tiền vào đây">
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Lọc
									</button>
								</div>
							</div>
						</div> -->

						<!-- <div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Màu
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div> -->
						<form action="san-pham/search" method="post">
							<div class="search-product pos-relative bo4 of-hidden">
								<input class="search s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Tìm kiếm theo tên...">

								<button type='submit' class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Sắp xếp sản phẩm</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Giá</option>
									<option>0 đ - 200.000đ</option>
									<option>200.000đ - 400.000đ</option>
									<option>400.000 đ - 700.000đ</option>
									<option>700.000 đ - 1.500.000đ</option>
									<option>1.500.000đ+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Hiển thị 1->12 trong <?php isset($total) ? $number = $total : $number = 0; echo $number; ?> sản phẩm
						</span>
					</div>

					<!-- Product -->
					<div class="row">
					<!-- kiểm tra xem nếu -->
					<?php if($number !== 0): ?>
						<?php foreach($data as $data): ?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo $data->image; ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="chi-tiet-san-pham/<?php echo Controller::removeUnicode($data->title); ?>/<?php echo $data->id; ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div id="<?php echo $data->id; ?>" class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Thêm vào giỏ
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="chi-tiet-san-pham/<?php echo Controller::removeUnicode($data->title); ?>/<?php echo $data->id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $data->title; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
									<?php echo strrev(chop(chunk_split(strrev($data->price),3,"."),".")); ?>đ
									</span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>

					</div>
					<!-- Pagination -->
					
				<?php else: echo "Rất tiếc..! Không có sản phẩm nào mà bạn tìm kiếm!" ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- <script>
		function search(){
			var search = $('search').val;
			location.replace('san-pham/search/'+search);
		};
	</script> -->