<?php


// Kết nối database
$conn = pdo_get_connection();
  
// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  
// Kiểm tra trang hiện tại có bé hơn 1 hay không
if ($page < 1) {
    $page = 1;
}
  
// Số record trên một trang
$limit = 6;
  
// Tìm start
$start = ($limit * $page) - $limit;
  
// Câu truy vấn
// Trong câu truy vấn này chúng ta sẽ lấy limit tăng lên 1
// Lý do là vì ta không có viết code đếm record nên dựa vào tổng số kết quả trả về để:
// - Nếu kết quả trả về bằng $limit + 1 thì còn phân trang
// - Nếu kết quả trả về bé hơn $limit + 1 thì nghĩa là hết dữ liệu nên ngưng phân trang
$sql = "select * from food limit $start,".($limit + 1);

  
// Thực hiện câu truy vấn
// $query = pdo_execute($sql) or die ('Lỗi câu truy vấn');
  
// Duyệt kết quả rồi đưa vào mảng result
$result =  pdo_get_all_rows($sql);
// while ($row = $query->)
// {
//     // Thêm vào result
//     array_push($result, $row);
// }

// Nếu là request ajax thì trả kết quả JSON
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    // Mình sleep 1 giây để các bạn check nhé, khi sử dụng thì bỏ đoạn sleep này đi
    sleep(1);
     
    // Trả kết quả về cho ajax
    die (json_encode($result));
}
else // Ngược lại thì hiển thị bình thường. Trường hợp này dùng load trong file list.php
{
    $total = count($result);
    // Bỏ đi kết quả cuối cùng vì kết quả này dùng để check phân trang thôi
    for ($i = 0; $i < $total - 1; $i++)
    {
        extract($result[$i]);
       echo "
       <div class='box'>
                <div class='image'>
                    <img src='$ROOT_URL.$food_image_url'>
                    <a href='' class='fas fa-heart ajax-favorite' food_id='$food_id'></a>
                </div>
                <div class='content'>
                    <div class='stars'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star-half-alt'></i>
                    </div>
                    <a href='../detail?food_id=$food_id'><h3>$food_name</h3></a>
                    <p>$food_des</p>
                    
                </div>
                <span class='price'>$$food_price</span>
                <div food_id='$food_id' add_quantity='1' class='ajax-addToCart' class='btn'>add to cart</div>
            </div>
       
       ";
    }
    
}
?>

