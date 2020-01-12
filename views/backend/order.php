<?php $this->layout = 'views/backend/layout.php'; ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php $i = 1; ?>
            <?php foreach($list_order as $list_product): ?>
            <h4>Giỏ hàng <?php echo $i; $i++; ?> </h4>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>order ID</th>
                                    <th>name</th>
                                    <th class="text-right">price</th>
                                    <th class="text-right">quantity</th>
                                    <th class="text-right">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2018-09-29 05:57</td>
                                    <td>100398</td>
                                    <td>iPhone X 64Gb Grey</td>
                                    <td class="text-right">$999.00</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">$999.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2020 Colorlib. All rights reserved. Template by Super Admin.</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<pre>
    <?php print_r($list_order); ?>
</pre>