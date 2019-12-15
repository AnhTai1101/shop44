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
                1 x $39.00
            </span>
        </div>
    </li>