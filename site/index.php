
<?php 

    if(isset($_GET['message'])){
        $message = $_GET['message'];
        $status = $_GET['status'];
        include "message.php";
    }
   
    include $VIEW_NAME;
?>