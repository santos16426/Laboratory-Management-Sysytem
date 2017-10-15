<?php 
include "dbcon.php";
session_start();
echo $seller_id = $_POST['seller_id'];
echo $bidder_id = $_POST['bidder_id'];
echo $product_id = $_POST['product_id'];
echo $transact_price = $_POST['transact_price'];
date_default_timezone_set('Singapore');
echo $current_date =date('Y-m-d H:i:s');
$bidstring = "INSERT INTO biddingtrans_tbl(bidder_id,seller_id,transact_date,transact_price,product_id) VALUES ($bidder_id,$seller_id,'$current_date',$transact_price,$product_id)";
$bidquery =$connect->query($bidstring);
header('location:products.php');
 ?>