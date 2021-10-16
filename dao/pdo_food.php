<?php

// get all food
function food_get_all_rows()
{
    $sql = "select * from food";
    return pdo_get_all_rows($sql);
}

// insert food
// 
function food_insert($food_name, $cat_id, $food_des, $food_price, $food_image_file)
{
    //Check images
    $food_image_url = "";
    $target_dir = "../../content/images/food/";
    $target_file  = $target_dir . basename($food_image_file["name"]);

    $check = getimagesize($food_image_file["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($food_image_file["tmp_name"], $target_file)) {
            $target_dir = "/content/images/food/";
            $food_image_url = $target_dir . basename($food_image_file["name"]);
        }
    } else {
        $food_image_url = '/content/images/error.jpg';
    }

    //add

    $sql = "insert into food (food_name,cat_id,food_des,food_price,food_image_url) values (?,?,?,?,?)";
    pdo_execute($sql, $food_name, $cat_id, $food_des, $food_price, $food_image_url);
}



// get one food by id
function food_get_one($food_id)
{
    $sql = 'select * from food where food_id = ?';
    return pdo_get_one_row($sql, $food_id);
}

// food update
function food_update($food_id, $food_name, $cat_id, $food_des, $food_price, $food_image_file)
{
    if ($food_image_file['size'] !== 0) {

        //Check images
        $food_image_url = "";
        $target_dir = "../../content/images/food/";
        $target_file  = $target_dir . basename($food_image_file["name"]);

        $check = getimagesize($food_image_file["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($food_image_file["tmp_name"], $target_file)) {
                $target_dir = "/content/images/food/";
                $food_image_url = $target_dir . basename($food_image_file["name"]);
            }
        } else {
            $food_image_url = '/content/images/error.jpg';
        }
        $sql = "update food set food_name = ?, cat_id = ?, food_des = ?, food_price = ?,food_image_url = ? where food_id = ?";
        pdo_execute($sql, $food_name, $cat_id, $food_des, $food_price, $food_image_url, $food_id);
    } else {
        $sql = "update food set food_name = ?, cat_id = ?, food_des = ? ,food_price = ? where food_id = ?";
        pdo_execute($sql, $food_name, $cat_id, $food_des, $food_price, $food_id);
    }
}


// food total
function food_total()
{
    $sql = "select count(*) as food_total from food";
    return pdo_get_one_row($sql);
}

// get 9 foods have most view
 function food_most_view(){
     $sql = "SELECT * from food order by food_views desc limit 9";
     return pdo_get_all_rows($sql);
 }
// get 3 foods main
 function food_3_main(){
     $sql = "SELECT * from food order by food_views desc limit 3";
     return pdo_get_all_rows($sql);
 }

 // delete food
function food_delete($food_id)
{
    // delete image
     // delete image
     $food = food_get_one($food_id);
     $file_name = $food['food_image_url'];
     $file_name = "../.." . $file_name;
     unlink($file_name);

    // delete info in database
    $sql = "delete from food where food_id = ?";
    pdo_execute($sql, $food_id);
}

// increase view food
function food_increase_view($food_id){
    $sql = "update food set food_views = food_views + 1 where food_id = ?";
    return pdo_execute($sql, $food_id);
}

// food search
function food_search($search_keyword){
    $search_keyword = '%'.$search_keyword.'%';
    $sql = "select * from food where food_des like ? or food_name like ?";
    return pdo_get_all_rows($sql, $search_keyword,$search_keyword);
}