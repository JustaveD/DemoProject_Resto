// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm

var is_busy = false;
     
// Biến lưu trữ trang hiện tại
var page = 1;
 
// Số record trên mỗi trang
var record_per_page = 6;
 
// Biến lưu trữ rạng thái phân trang 
var stopped = false;
let rootUrl = "/resto";

$(document).ready(function()
{
    // Khi kéo scroll thì xử lý
    $('#load_more').click(function()
    {
        // Element append nội dung
        $element = $('#load-more');
 
        // ELement hiển thị chữ loadding
        $button = $(this);
         
        // Nếu đang gửi ajax thì ngưng
        if (is_busy == true) {
            return false;
        }
         
        // Tăng số trang lên 1
        page++;
 
        // Hiển thị loadding ...
        $button.html('LOADDING ...');
 
        // Gửi Ajax
        $.ajax(
        {
            type: 'get',
            dataType: 'json',
            url: '../../ajax/load_more_get_data.php',
            data: {page: page},
            success: function(result)
            {
                var html = '';
                
                // Trường hợp hết dữ liệu cho trang kết tiếp
                if (result.length <= record_per_page)
                {
                    // Lặp dữ liêụ
                    $.each(result, function (key, obj){
                        
                        html +=`<div class='box'>
                        <div class='image'>
                            <img src='${rootUrl}${obj.food_image_url}'>
                            <a href='' class='fas fa-heart ajax-favorite' food_id='${obj.food_id}'></a>
                        </div>
                        <div class='content'>
                            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star-half-alt'></i>
                            </div>
                            <a href='../detail?food_id=${obj.food_id}'><h3>${obj.food_name}</h3></a>
                            <p>${obj.food_des}</p>
                           
                        </div>
                        <span class='price'>$${obj.food_price}</span>
                        <div food_id='${obj.food_id}' add_quantity='1' class='ajax-addToCart' class='btn'>add to cart</div>
                    </div>`;
                    });
 
                    // Thêm dữ liệu vào danh sách
                    $element.append(html);
 
                    // Xóa button
                    $button.remove();
                }
                else{ // Trường hợp còn dữ liệu cho trang kế tiếp
                    // Lặp dữ liêụ, trường hợp này ta lặp bỏ đi phần record cuối cùng vì ta selec với limit + 1
                    $.each(result, function (key, obj){
                        if (key < result.length - 1){
                            html +=`<div class='box'>
                        <div class='image'>
                            <img src='${rootUrl}${obj.food_image_url}'>
                            <a href='' class='fas fa-heart ajax-favorite' food_id='${obj.food_id}'></a>
                        </div>
                        <div class='content'>
                            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star-half-alt'></i>
                            </div>
                            <a href='../detail?food_id=${obj.food_id}'><h3>${obj.food_name}</h3></a>
                            <p>${obj.food_des}</p>
                           
                        </div>
                        <span class='price'>$${obj.food_price}</span>
                        <div food_id='${obj.food_id}' add_quantity='1' class='ajax-addToCart' class='btn'>add to cart</div>
                    </div>`;
                        }
                    });
 
                    // Thêm dữ liệu vào danh sách
                    $element.append(html);
                }
 
            }
        })
        .always(function()
        {
            // Sau khi thực hiện xong thì đổi giá trị cho button
            $button.html('LOAD MORE');
            is_busy = false;
        });
 
    });
});