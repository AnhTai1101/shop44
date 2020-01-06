<?php $this->layout = "views/backend/layout.php"; ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Danh sách sản phẩm</h3>
            <br>
            <br>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">Tất cả danh mục</option>
                            <option value="">Quần dài</option>
                            <option value="">Áo dài</option>
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
                        <i class="zmdi zmdi-plus"></i>add item</button>
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
                    <a href="index.php?area=backend&controller=home&p=<?php echo $i; ?>" class="badge badge-pill badge-info <?php if($i == $page) echo ' active-pagination'; ?>"><?php echo $i; ?>&nbsp;</a>
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
    <div class="row">
        <div class="col-lg-6">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                <div class="au-card-title" style="background-image:url('assets/backend/images/bg-title-01.jpg');">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                        <i class="zmdi zmdi-account-calendar"></i>Danh mục tin tức</h3>
                    <button class="au-btn-plus">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="au-task js-list-load">
                    <div class="au-task__title">
                        <p>Có tổng tất cả danh mục</p>
                    </div>
                    <div class="au-task-list js-scrollbar3">
                        <div class="au-task__item au-task__item--danger">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Meeting about plan for Admin Template 2018</a>
                                </h5>
                                <span class="time">10:00 AM</span>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--warning">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Create new task for Dashboard</a>
                                </h5>
                                <span class="time">11:00 AM</span>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--primary">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Meeting about plan for Admin Template 2018</a>
                                </h5>
                                <span class="time">02:00 PM</span>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--success">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Create new task for Dashboard</a>
                                </h5>
                                <span class="time">03:30 PM</span>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--danger js-load-item">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Meeting about plan for Admin Template 2018</a>
                                </h5>
                                <span class="time">10:00 AM</span>
                            </div>
                        </div>
                        <div class="au-task__item au-task__item--warning js-load-item">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#">Create new task for Dashboard</a>
                                </h5>
                                <span class="time">11:00 AM</span>
                            </div>
                        </div>
                    </div>
                    <div class="au-task__footer">
                        <button class="au-btn au-btn-load js-load-btn">load more</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                <div class="au-card-title" style="background-image:url('assets/backend/images/bg-title-02.jpg');">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                        <i class="zmdi zmdi-comment-text"></i>Danh mục sản phẩm</h3>
                    <button class="au-btn-plus">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="au-inbox-wrap js-inbox-wrap">
                    <div class="au-message js-list-load">
                        <div class="au-message__noti">
                            <p>Có tổng tất cả
                                <span><?php echo count($category); ?></span>

                                danh mục
                            </p>
                        </div>
                        <div class="au-message-list">
                            <!-- <div class="au-message__item unread">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap">
                                            <div class="avatar">
                                                <img src="assets/backend/images/icon/avatar-02.jpg" alt="John Smith">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">John Smith</h5>
                                            <p>Have sent a photo</p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span>12 Min ago</span>
                                    </div>
                                </div>
                            </div> -->
                            <?php foreach($category as $categories): ?>
                            <div class="au-message__item unread">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap online">
                                            <div class="avatar">
                                                <img src="<?php echo $categories->image; ?>" alt="Nicholas Martinez">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name"><?php echo $categories->name; ?></h5>
                                            <p><?php echo $categories->title; ?></p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span><?php echo date('d-m-Y - H:m:s',strtotime($categories->update_at)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- <div class="au-message__item">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap online">
                                            <div class="avatar">
                                                <img src="assets/backend/images/icon/avatar-04.jpg" alt="Michelle Sims">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">Michelle Sims</h5>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span>Yesterday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="au-message__item">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap">
                                            <div class="avatar">
                                                <img src="assets/backend/images/icon/avatar-05.jpg" alt="Michelle Sims">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">Michelle Sims</h5>
                                            <p>Purus feugiat finibus</p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span>Sunday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="au-message__item js-load-item">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap online">
                                            <div class="avatar">
                                                <img src="assets/backend/images/icon/avatar-04.jpg" alt="Michelle Sims">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">Michelle Sims</h5>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span>Yesterday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="au-message__item js-load-item">
                                <div class="au-message__item-inner">
                                    <div class="au-message__item-text">
                                        <div class="avatar-wrap">
                                            <div class="avatar">
                                                <img src="assets/backend/images/icon/avatar-05.jpg" alt="Michelle Sims">
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">Michelle Sims</h5>
                                            <p>Purus feugiat finibus</p>
                                        </div>
                                    </div>
                                    <div class="au-message__item-time">
                                        <span>Sunday</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="au-message__footer">
                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                        </div>
                    </div>
                    <div class="au-chat">
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                <div class="avatar-wrap online">
                                    <div class="avatar avatar--small">
                                        <img src="assets/backend/images/icon/avatar-02.jpg" alt="John Smith">
                                    </div>
                                </div>
                                <span class="nick">
                                    <a href="#">John Smith</a>
                                </span>
                            </div>
                        </div>
                        <div class="au-chat__content">
                            <div class="recei-mess-wrap">
                                <span class="mess-time">12 Min ago</span>
                                <div class="recei-mess__inner">
                                    <div class="avatar avatar--tiny">
                                        <img src="assets/backend/images/icon/avatar-02.jpg" alt="John Smith">
                                    </div>
                                    <div class="recei-mess-list">
                                        <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                        <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                    </div>
                                </div>
                            </div>
                            <div class="send-mess-wrap">
                                <span class="mess-time">30 Sec ago</span>
                                <div class="send-mess__inner">
                                    <div class="send-mess-list">
                                        <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="au-chat-textfield">
                            <form class="au-form-icon">
                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                <button class="au-input-icon">
                                    <i class="zmdi zmdi-camera"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://thuyanhdo.000webhostapp.com/">Colorlib</a>.</p>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<!-- END MAIN CONTENT-->