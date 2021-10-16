<?php
session_start();
require "../dao/pdo.php";
// Nếu sản phẩm là lần đầu được add vào thì exist sẽ là false, ngược lại nếu cus_id đã add sản phẩm đó có thì true
$result = ['status' => '', 'notExist' => true];

// Kết nối database
$conn = pdo_get_connection();

$food_id = $_GET['food_id'];
$add_quantity = (int)$_GET['add_quantity'];
$cus_id = $_SESSION['login_id'];


$sql = "select * from shopping_cart";
$all_carts = pdo_get_all_rows($sql);
$check = false;
if (!empty($all_carts)) {

    foreach ($all_carts as $cart) {
        if ($cart['cus_id'] == $cus_id && $cart['food_id'] == $food_id) {
            $cart_id = $cart['cart_id'];
            $sql = "update shopping_cart set cart_quantity = cart_quantity + ? where cart_id = ?";
            $result['status'] = pdo_execute($sql, $add_quantity, $cart_id);
            $result['notExist'] = false;
            $check = true;
        }
    }
    if (!$check) {
        $sql = "insert into shopping_cart (cus_id,food_id,cart_quantity) values (?,?,?)";
        $result['status'] = pdo_execute($sql, $cus_id, $food_id, $add_quantity);
    }
} else {
    $sql = "insert into shopping_cart (cus_id,food_id,cart_quantity) values (?,?,?)";
    $result['status'] = pdo_execute($sql, $cus_id, $food_id, $add_quantity);
}



// Nếu là request ajax thì trả kết quả JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Mình sleep 1 giây để các bạn check nhé, khi sử dụng thì bỏ đoạn sleep này đi
    sleep(0.3);

    // Trả kết quả về cho ajax
    die(json_encode($result));
}
