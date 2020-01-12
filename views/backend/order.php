<?php $this->layout = 'views/backend/layout.php'; ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php $i = 1; ?>
            <?php foreach($list_order as $list_product): ?>
            <h4 style="display:inline;">Giỏ hàng <?php echo $i; $i++; ?>  </h4>-><?php echo $list_product->emai; ?>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Ngày mua</th>
                                    <th>ID sản phẩm</th>
                                    <th>Tên</th>
                                    <th class="text-right">Giá</th>
                                    <th class="text-right">Số Lượng</th>
                                    <th class="text-right">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $list_product->date; ?></td>
                                    <td><?php echo $list_product->product_id; ?></td>
                                    <td><?php echo $list_product->name; ?></td>
                                    <td class="text-right"><?php echo $list_product->price; ?></td>
                                    <td class="text-right"><?php echo $list_product->number; ?></td>
                                    <td class="text-right"><?php echo strrev(chop(chunk_split(strrev($list_product->number*$list_product->price),3,"."),".")); ?> đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2020 Colorlib. All rights reserved. Template by Super Admin.</p>
                    </div>
                </div>
            </div>
    </div>
</div>
<pre>
    <?php //print_r($list_order); ?>
</pre>