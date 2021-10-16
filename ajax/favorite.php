<?php
session_start();
require "../dao/pdo.php";
// Nếu sản phẩm là lần đầu được add vào thì exist sẽ là false, ngược lại nếu cus_id đã add sản phẩm đó có thì true
$result = ['status' => false, 'notExist' => true];

// Kết nối database
$conn = pdo_get_connection();

$food_id = $_GET['food_id'];
$cus_id = $_SESSION['login_id'];


$sql = "select * from favorite";
$all_favorite = pdo_get_all_rows($sql);
$check = false;
if (!empty($all_favorite)) {

    foreach ($all_favorite as $favorite) {
        if ($favorite['cus_id'] == $cus_id && $favorite['food_id'] == $food_id) {
            $result['status'] = false;
            $result['notExist'] = false;
            $check = true;
        }
    }
    if (!$check) {
        $sql = "insert into favorite (cus_id,food_id) values (?,?)";
        $result['status'] = pdo_execute($sql, $cus_id, $food_id);
    }
} else {
    $sql = "insert into favorite (cus_id,food_id) values (?,?)";
    $result['status'] = pdo_execute($sql, $cus_id, $food_id);
}



// Nếu là request ajax thì trả kết quả JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Mình sleep 1 giây để các bạn check nhé, khi sử dụng thì bỏ đoạn sleep này đi
    // sleep(0.3);

    // Trả kết quả về cho ajax
    die(json_encode($result));
}
