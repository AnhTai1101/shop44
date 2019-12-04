<?php $this->layout = "views/backend/layout.php"; ?>
<div class="container">
    <form class="info-product" action="index.php?area=backend&controller=product&action=go_edit" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID sản phẩm</label>
            <input type="number" class="form-control" value="<?php echo $info_product[0]->id; ?>" id="id" name="id">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="title">Tên sản phẩm</label>
            <input type="text" class="form-control" value="<?php echo $info_product[0]->title; ?>" id="title" name="title">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input type="number" value="<?php echo $info_product[0]->price//strrev(chop(chunk_split(strrev($info_product[0]->price),3,"."),".")); ?>" class="form-control" id="price" name="price">
            <?php //print_r(date('d/m/Y - H:i:s')); ?>
            <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); print_r(date('H:i:s - d/m/Y')) ?>
        </div>
        <div class="form-group">
            <label for="content">Thông tin giới thiệu</label>
            <input type="text" class="form-control" value="<?php echo $info_product[0]->content; ?>" id="content" name="content">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="description">Chi tiết sản phẩm:</label>
            <input type="text" class="form-control" value="<?php echo $info_product[0]->description; ?>" id="description" name="description">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="status">Số lượng:</label>
            <input type="number" class="form-control" value="<?php echo $info_product[0]->status; ?>" id="status" name="status">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="category_id">Danh mục sản phẩm:</label>
            <input type="number" class="form-control" value="<?php echo $info_product[0]->category_id; ?>" id="category_id" name="category_id">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="news_id">Danh mục tin tức:</label>
            <input type="text" class="form-control" value="<?php echo $info_product[0]->news_id; ?>" id="news_id" name="news_id">
            <?php //print_r($info_product); ?>
        </div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh chính</div>
            <div class="avatar-wrap col-md-2">
                    <img src="<?php echo $info_product[0]->image; ?>" alt="Ảnh chính">
            </div>
            <div class="col-md-8">
                <input type="file" name="image">
            </div>
		</div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh phụ 1:</div>
            <div class="avatar-wrap col-md-2">
                    <img src="<?php echo $info_product[0]->image1; ?>" alt="Ảnh phụ 1">
            </div>
            <div class="col-md-8">
                <input type="file" name="image1">
            </div>
		</div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh phụ 2</div>
            <div class="avatar-wrap col-md-2">
                    <img src="<?php echo $info_product[0]->image2; ?>" alt="Ảnh phụ 2">
            </div>
            <div class="col-md-8">
                <input type="file" name="image2">
            </div>
		</div>
        <!-- <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div> -->
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
