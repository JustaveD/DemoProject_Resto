<h1>List of customer</h1>
<style>
  .ban td {
    background-color: #e76f51;
  }
</style>
<table>
  <tr>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Avatar</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Date join</th>
  </tr>
  <?php
  $customers = customer_get_all();
  foreach ($customers as $cus) {
    extract($cus);
    // $cus_date = implode(array_reverse(explode($cus_date_resgister,"-")));
    if(!$cus_admin){

      $cus_date =  implode("-", array_reverse(explode("-", $cus_date_resgister)));
      if ($cus_ban) {
        echo "
        <tr class='ban'>
        <td>$first_name $last_name</td>
        <td>$username</td>
        <td>$cus_email</td>
        <td><img src='$ROOT_URL.$cus_avatar'></td>
        <td>$cus_address</td>
        <td>$cus_phone</td>
        <td>$cus_date</td>
        <td><a href='?btn_process=freedom&id=$cus_id'><i class='fas fa-bolt'></i></a><a href='?btn_process=delete&id=$cus_id'><i class='fas fa-trash-alt'></i></a></td>
        </tr>";
      }else{
        echo "
        <tr >
        <td>$first_name $last_name</td>
        <td>$username</td>
        <td>$cus_email</td>
        <td><img src='$ROOT_URL.$cus_avatar'></td>
        <td>$cus_address</td>
        <td>$cus_phone</td>
        <td>$cus_date</td>
        <td><a href='?btn_process=ban&id=$cus_id'><i class='fas fa-ban'></i></a><a href='?btn_process=delete&id=$cus_id'><i class='fas fa-trash-alt'></i></a></td>
        </tr>";
      }
    }
  }

  ?>



</table>