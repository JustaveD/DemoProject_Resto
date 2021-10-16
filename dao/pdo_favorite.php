<?php
// count food in favorite

function favorite_count_food($cus_id){
    $sql = "select count(*) as favorite_quantity from favorite where cus_id = ?";
    return pdo_get_one_row($sql, $cus_id);
}

// get all favorite food of specific cus_id

function favorite_get_all_by_cus_id($cus_id){
    $sql = "select * from favorite where cus_id = ?";
    return pdo_get_all_rows($sql, $cus_id);
}