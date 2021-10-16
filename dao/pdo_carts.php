<!-- Đang làm tính số hàng trong giỏ hàng của id đang đăng nhapa -->
<!-- Viết Dao cảu table cart -->
<!-- Refactor lại mấy cái file ajax php -->

<?php 

// Count how many food in cart of login_id
function cart_count_food_in_cart($cus_id){
    $sql = 'select count(*) as food_quantity from shopping_cart where cus_id = ?';
    return pdo_get_one_row($sql, $cus_id);
}

// get all food in cart of specific cus_id
function cart_get_all_food_of_specific_cus_id($cus_id){
    $sql = "select * from shopping_cart where cus_id = ?";
    return pdo_get_all_rows($sql,$cus_id);
}
