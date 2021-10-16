<?php 

require "../dao/pdo.php";

$sql = "SELECT * FROM customer WHERE cus_date_resgister >= NOW() - INTERVAL 1 WEEK order by cus_date_resgister";
$data = pdo_get_all_rows($sql);


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  
    // Trả kết quả về cho ajax
    die(json_encode($data));
}