<?php  
    $this->layout = "views/frontend/layout.php";
?>
	<pre><?php //print_r($_SESSION['cart']); ?></pre>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<form action="gio-hang-cua-ban/update" method="POST">
				<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Sản phẩm</th>
								<th class="column-3">Giá</th>
								<th class="column-4 p-l-70">Số lượng</th>
								<th class="column-5">Tổng</th>
							</tr>
							<?php $total = 0; ?>
							<?php foreach($_SESSION['cart'] as $cart): ?>
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="<?php echo $cart['image']; ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2"><?php echo $cart['name']; ?></td>
								<td class="column-3"><?php echo strrev(chop(chunk_split(strrev($cart['price']),3,"."),".")); ?>đ</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="number<?php echo $cart['id']; ?>" value="<?php echo $cart['number']; ?>">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td  style="position: relative ;" class="column-5"><?php echo strrev(chop(chunk_split(strrev($cart['number']*$cart['price']),3,"."),".")); ?>đ 
									<a style="position: absolute;top: 4px;right: 10px;" href="gio-hang-cua-ban/delete/<?php echo $cart['id']; ?>">
										<span  class="lnr lnr-cross"></span>
									</a>
								</td>
								<?php $total = $total + $cart['number']*$cart['price']; ?>
							</tr>
							<?php endforeach; ?>
							<!--  <tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="images/item-05.jpg" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2">Mug Adventure</td>
								<td class="column-3">$16.00</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="num-product2" value="1">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td>
								<td class="column-5">$16.00</td>
							</tr> -->
						</table>
					</div>
				</div>

				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m w-full-sm">
						<!-- <div class="size11 bo4 m-r-10">
							
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Mã giảm giá (nếu có)">
						</div> -->
						Bạn có thể được giảm giá sản phẩm này tới &nbsp; <span class="text-primary"> 200k</span> &nbsp;
						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Áp dụng
							</button>
						</div>
					</div>

					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Cập nhật
						</button>
					</div>
				</div>
			</form>
			<!-- Total -->
			<form action="gio-hang-cua-ban/callMail" method="POST">
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text20 p-b-24">
						Tổng đơn hàng
					</h5>

					<!--  -->
					<!-- <div class="flex-w flex-sb-m p-b-12">
						<span class="s-text18 w-size19 w-full-sm">
							Chưa tính phí vận chuyển:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							<?php //echo strrev(chop(chunk_split(strrev($total),3,"."),".")); ?>đ
						</span>
					</div> -->

					<!--  -->
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							Ghi chú:
						</span>

						<div class="w-size20 w-full-sm">
							<p class="s-text8 p-b-23">
								Bạn cần chọn địa chỉ giao hàng.
							</p>

							<span class="s-text19">
								Chọn địa chỉ
							</span>

							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="selection-2" name="tinh">
									<option>Chọn Tỉnh /Thành phố...</option>
									<option>Hà Nội</option>
									<option>Hồ chí Minh</option>
									<option>Đà nẵng</option>
									<option>Khác...</option>
								</select>
							</div>

							<div class="size13 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="huyen" placeholder="Quận /Huyện">
							</div>
							<!-- <div class="size13 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="Phường /Xã">
							</div> -->
							<div class="size13 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="duong" placeholder="Tên đường + số nhà">
							</div>
	<!-- 
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
							</div> -->
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email" placeholder="Email">
							</div>
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="number" name="phone" placeholder="Số điện thoại">
							</div>

							<!-- <div class="size14 trans-0-4 m-b-10">
								Button
								<a href="">
									<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Gửi shop
									</button>
								</a>
							</div> -->
						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Tổng:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							<?php echo strrev(chop(chunk_split(strrev($total),3,"."),".")); ?> đ
						</span>
					</div>

					<div class="size15 trans-0-4">
						<!-- Button -->
						<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Hoàn thành
						</button>
					</div>
				</div>
			</form>
		</div>
	</section>