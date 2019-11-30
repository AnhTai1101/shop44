<?php $this->layout = "views/backend/layout.php"; ?>
<div class="container">
    <form class="info-product" action="index.php?area=backend&controller=product&action=add" method="POST">
        <div class="form-group">
            <label for="id">ID sản phẩm</label>
            <input type="number" class="form-control" id="id">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="title">Tên sản phẩm</label>
            <input type="text" class="form-control" id="title" name="title">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input name="price" type="number"> .đ
        </div>
        <div class="form-group">
            <label for="content">Thông tin giới thiệu</label>
            <input type="text" class="form-control" id="content" name="content">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="description">Chi tiết sản phẩm:</label>
            <input type="text" class="form-control" id="description" name="description">
            <?php //print_r($info_product); ?>
        </div>
        <div class="form-group">
            <label for="status">Số lượng:</label>
            <input type="number" class="form-control" id="status" name="status">
            <?php //print_r($info_product); ?>
        </div>
        <!-- <div class="form-group">
            <label for="category_id">Danh mục sản phẩm:</label>
            <input type="number" class="form-control" id="category_id" name="category_id">
            <?php //print_r($info_product); ?>
        </div> -->
        <div class="form-group">
            <label for="news_id">Danh mục tin tức:</label>
            <input type="text" class="form-control" id="news_id" name="news_id">
            <?php //print_r($info_product); ?>
        </div>
        <div>
            <label for="category">Danh mục:</label>
            <select name="category_id" id="category">
            <?php foreach($category as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh chính</div>
            <div class="col-md-10">
                <input type="file" name="img">
            </div>
		</div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh phụ 1:</div>
            <div class="col-md-10">
                <input type="file" name="image1">
            </div>
		</div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-2">Ảnh phụ 2</div>
            <div class="avatar-wrap col-md-2">
                    <img src="assets/backend/images/icon/avatar-02.jpg" alt="Ảnh chính">
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
<br><br>