<?php 
// add new category
function category_add_new($cat_name){
    $sql = "insert into food_categories (cat_name) values(?)";
    return pdo_execute($sql,$cat_name);
}


// update category 
function category_update($cat_id,$cat_name){
    $sql = "update food_categories set cat_name = ? where cat_id = ?";
    return pdo_execute($sql,$cat_name,$cat_id);
}

// show list categories
function category_show_list(){
    $sql = "select * from food_categories";
    return pdo_get_all_rows($sql);
}

// delete category
function category_delete($cat_id){
    $sql = "delete from food_categories where cat_id = ?";
    return pdo_execute($sql,$cat_id);
}

// Number of food in this category
function contain_food($cat_id){
    $sql = "select count(*)  as total from food where cat_id = ?";
    return pdo_get_one_row($sql,$cat_id);
}
// get 1 cat
function category_get_one($cat_id){
    $sql = "select * from food_categories where cat_id = ?";
    return pdo_get_one_row($sql,$cat_id);
}
?>