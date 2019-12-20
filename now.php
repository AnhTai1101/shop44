<?php $money=0; ?>
<?php if(isset($_SESSION['cart'])): ?>
<?php foreach($_SESSION['cart'] as $cart): ?>
<li class="header-cart-item">
    <div class="header-cart-item-img">
        <img src="images/item-cart-01.jpg" alt="IMG">
    </div>

    <div class="header-cart-item-txt">
        <a href="#" class="header-cart-item-name">
            <?php echo $cart['name']; ?>
        </a>

        <span class="header-cart-item-info">
            <?php echo strrev(chop(chunk_split(strrev($cart['price']),3,"."),".")); ?>đ
        </span>
    </div>
</li>
<?php $money = $money + $cart['price']; ?>đ
<?php endforeach; ?>
<?php else: ?>
<button class="btn-success">Chưa có thông tin trong giỏ hàng</button>
<?php endif; ?>
    <li class="header-cart-item">
        <div class="header-cart-item-img">
            <img src="images/item-cart-02.jpg" alt="IMG">
        </div>

        <div class="header-cart-item-txt">
            <a href="#" class="header-cart-item-name">
                Converse All Star Hi Black Canvas
            </a>
            <span class="header-cart-item-info">
                Số lượng: <?php echo $cart['number']; ?> cái
            </span>

            <span class="header-cart-item-info">
                1 x $39.00
            </span>
        </div>
    </li>

    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                <img src="<?php echo $list_product->image; ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div id="<?php echo $list_product->id; ?>" class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="index.php?controller=product&id=<?php echo $list_product->id; ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo $list_product->title; ?>
								</a>

                                <span class="block2-price m-text6 p-r-5">
                                <?php echo strrev(chop(chunk_split(strrev($list_product->price),3,"."),".")); ?>đ
								</span>
                            </div>
                        </div>
                    </div>
    