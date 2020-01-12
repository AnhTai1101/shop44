<?php $this->layout = "views/backend/layout.php"; ?>
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Danh sách sản phẩm</h3>
        <br>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">Danh mục</option>
                        <?php foreach($category as $category): ?>
                        <option value=""><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Bán chạy</option>
                        <option value="">Tuần qua</option>
                        <option value="">Tháng trước</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>Chỉ xem</button>
                    &nbsp;&nbsp;&nbsp;
                    <span>Hiển thị <?php echo count($list_product); ?> trong tổng số <?php echo $total; ?></span>
            </div>
            <div class="table-data__tool-right">
                <a href="index.php?area=backend&controller=product&action=add">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</button>
                </a>
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <!-- <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label> -->
                            Ảnh
                        </th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Này Nhập</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th></th>
                    </tr>
                </thead>
                <?php if($total > 0): ?>
                <tbody>
                <?php foreach($list_product as $list_product): ?>
                    <tr class="tr-shadow">
                    
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>
                            <div class="image">
                                <img style="width:100px;" src="<?php echo $list_product->image; ?>" alt="">
                            </div>
                        </td>
                        <td><?php echo $list_product->id; ?></td>
                        <td>
                            <span class="block-email"><?php echo $list_product->title; ?></span>
                        </td>
                        <td class="desc"><?php echo strrev(chop(chunk_split(strrev($list_product->price),3,"."),".")); ?> đ</td>
                        <td><?php echo date('H:i:s d-m-Y', strtotime($list_product->update_at)); ?></td>
                        <td>
                            <span class="status--process"><?php echo $list_product->status; ?></span>
                        </td>
                        <td><?php echo $list_product->name; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="index.php?area=backend&controller=product&action=edit&id=<?php echo $list_product->id; ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>&nbsp;
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?area=backend&controller=product&action=delete&id=<?php echo $list_product->id; ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </a>
                                <!--<button class="item" data-toggle="tooltip" data-placement="top" title="Tăng">
                                        <i class="zmdi zmdi-mail-send"></i> 
                                    <i class="zmdi zmdi-plus-1"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Giảm">
                                    <i class="zmdi zmdi-more"></i> 
                                    <i class="zmdi zmdi-neg-1"></i>
                                </button>-->
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                <?php endforeach; ?>
                </tbody>
                    
            </table>
                <div <?php if($numPage <2) echo "style='display: none;'"; ?> class="pagination flex-m flex-w p-t-26">
                Trang &nbsp;
                <?php for( $i =1; $i<= $numPage; $i++): ?>
                <a href="index.php?area=backend&controller=product&p=<?php echo $i; ?>" class="badge badge-pill badge-info <?php if($i == $page) echo ' active-pagination'; ?>"><?php echo $i; ?>&nbsp;</a>
                <?php endfor; ?>
                <!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                <a href="#" class="item-pagination flex-c-m trans-0-4">2</a> -->
            </div>
            <?php else: echo "Không có sản phẩm trong giỏ hàng"; ?>
            <?php endif; ?>
        </div>
        <br><br>
        <!-- END DATA TABLE -->
    </div>
</div>