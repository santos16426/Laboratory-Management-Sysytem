<?php 
include "dbcon.php";
$id = $_POST['product_id'];
date_default_timezone_set('Singapore');
echo $date =date('Y-m-d H:i:s');
$update = "UPDATE product_tbl SET product_status= 6, product_init_time = '$date'  WHERE product_id = $id";
$updatequery = $connect->query($update);
header('location:products.php');
 ?>