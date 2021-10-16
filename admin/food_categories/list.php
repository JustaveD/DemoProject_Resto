<h1>List of categories</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contain food</th>
        <th>Tool</th>
    </tr>
    <?php
    $cats = category_show_list();
    
    foreach ($cats as $cat) {
        extract($cat);
        
        extract(contain_food($cat_id));
        echo "
                    <tr>
                        <td>$cat_id</td>
                        <td>$cat_name</td>
                        <td>$total</td>
                        <td><a href='?btn_edit&id=$cat_id'><i class='fas fa-edit'></i></a><a href='?btn_process=delete&id=$cat_id'><i class='fas fa-trash-alt'></i></a></td>
                    </tr>";
    }
    ?>



</table>