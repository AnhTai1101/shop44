$('.block2-btn-addcart').get()
$('.block2-btn-addcart').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();

    
    $(this).on('click', function() {
        // console.log(window.location.pathname)
        // return false;

        $.ajax({
            // url : window.location.pathname, // cái này là lấy địa chỉ trang web hiện tại
            url : 'trangchu.html',
            type : "get", // chọn phương thức gửi là get
            dateType:"json", // dữ liệu trả về dạng text
            data : { // Danh sách các thuộc tính sẽ gửi đi
                area : 'frontend',
                controller : 'cart',
                action : 'add',
                id : $(this).attr('id')
            },
            success : function (result){
                // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                swal(nameProduct, "đã thêm thành công vào giỏ hàng ! ", "Đông ý");
                // $('#number-cart').text(result);
                var nameCart = JSON.parse(result);
                // $('#name_cart').text(console.log(nameCart));
                // $('#name_cart').text(nameCart[1].name);
                var html = '';
                var total = 0;
                $.each(nameCart , function(key, value) { 
                    total += value.number*value.price;
                    html += '<li class="header-cart-item">';
                        html += '<div class="header-cart-item-img">';
                            html += '<img src="';
                                html += value.image;
                            html += '" alt="IMG">';
                        html += '</div>';
                        html += '<div class="header-cart-item-txt">';
                            html += '<a href="';
                            html += 'chi-tiet-san-pham/' + (value.name).replace(/ /g, "-") + '/' + value.id;
                            html += '" class="header-cart-item-name">';
                                html += value.name;
                            html += '</a>';
                            html += '<span class="header-cart-item-info">';
                                html += 'Số lượng: ' + value.number + 'cái';
                            html += '</span>';
                            html += '<span class="header-cart-item-info">';
                                html +='Giá: ' + value.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' .đ';
                            html += '</span>';
                        html += '</div>';
                    html += '</li>';
                });
                total = 'Total: ' + total + ' .đ'
                $('.name_cart').html(html);
                $('.number-cart').text(Object.keys(nameCart).length);
                $('.total-cart').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                console.log(Object.keys(nameCart).length);

            }
        });
        // $.get('index.php?area=frontend&controller=cart&action=add&id=4');
        // swal(nameProduct, "is added to cart !", "success");
    });
});

$('.block2-btn-addwishlist').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");
    });
});
function show_login(){
    $('.fix').toggle(500);
};
$('.add-cart-detail').click(function(){
    $.ajax({
        url : 'trangchu.html',
        type : "get", // chọn phương thức gửi là get
        dateType:"json", // dữ liệu trả về dạng text
        data : { // Danh sách các thuộc tính sẽ gửi đi
            area : 'frontend',
            controller : 'cart',
            action : 'add_detail',
            id : $(this).attr('id'),
            size : $('#size').val(),
            color : $('#color').val(),
            number : $('#number-product').val()
        },
        success : function(result1){
            swal("Sản phẩm đã update thành công tại giỏ hàng", "Đồng ý!");
            var nameCart1 = JSON.parse(result1);
            var html1 = '';
            var total1 = 0;
            $.each(nameCart1 , function(key, value) { 
                total1 += value.number*value.price;
                html1 += '<li class="header-cart-item">';
                    html1 += '<div class="header-cart-item-img">';
                        html1 += '<img src="';
                            html1 += value.image;
                        html1 += '" alt="IMG">';
                    html1 += '</div>';
                    html1 += '<div class="header-cart-item-txt">';
                        html1 += '<a href="';
                        html1 += 'chi-tiet-san-pham/' + (value['name-no']).replace(/ /g, "-") + '/' + value.id;
                        html1 += '" class="header-cart-item-name">';
                            html1 += value.name;
                        html1 += '</a>';
                        html1 += '<span class="header-cart-item-info">';
                            html1 += 'Số lượng: ' + value.number + 'cái';
                        html1 += '</span>';
                        html1 += '<span class="header-cart-item-info">';
                            html1 +='Giá: ' + value.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' .đ';
                        html1 += '</span>';
                    html1 += '</div>';
                html1 += '</li>';
            });
            total1 = 'Total: ' + total1 + ' .đ'
            $('.name_cart').html(html1);
            $('.number-cart').text(Object.keys(nameCart1).length);
            $('.total-cart').text(total1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            console.log(Object.keys(nameCart1).length);
            console.log(nameCart1);
        }
    })
});
$('.num-product').click(function(){
    $.ajax({
        url : 'trangchu.html',
        type : "get", // chọn phương thức gửi là get
        dateType:"json", // dữ liệu trả về dạng text
        data : { // Danh sách các thuộc tính sẽ gửi đi
            area : 'frontend',
            controller : 'cart',
            action : 'update_cart',
            id : $(this).attr('id'),
            size : $('#size').val(),
            color : $('#color').val(),
            number : $('#number-product').val()
        },
    })
});