<h1>List of food</h1>
<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Views</th>
    <th>Image</th>
    <th>Price</th>
    <th>Tool</th>
  </tr>
  <?php
  $foods = food_get_all_rows();
  foreach ($foods as $food) {
    extract($food);
    echo "
                    <tr>
                        <td>$food_name</td>
                        <td>$food_des</td>
                        <td>$food_views</td>
                        <td><img src='$ROOT_URL.$food_image_url'></td>
                        <td>$food_price</td>
                        <td><a href='?btn_edit&id=$food_id'><i class='fas fa-edit'></i></a><a href='?btn_process=delete&id=$food_id'><i class='fas fa-trash-alt'></i></a></td>
                    </tr>";
  }
  ?>



</table>