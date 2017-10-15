<?php 
include "dbcon.php";
echo $bidder_id = $_POST['bidder_id'];echo '<br>';
echo $seller_id = $_POST['seller_id'];echo '<br>';
echo $product_id = $_POST['product_id'];echo '<br>';
echo $price = $_POST['price'];echo '<br>';
$change_prod_stat = "UPDATE product_tbl SET product_status = 3 WHERE product_id = $product_id";
$product_change_query = $connect->query($change_prod_stat);
date_default_timezone_set('Singapore');
echo $current_date =date('Y-m-d H:i:s');
$bidstring = "INSERT INTO biddingtrans_tbl(bidder_id,seller_id,transact_date,transact_price,product_id) VALUES ($bidder_id,$seller_id,'$current_date',$price,$product_id)";
$bidquery =$connect->query($bidstring);
$query = "SELECT *,CONCAT(user_fname,' ',user_lname) as name FROM biddingtrans_tbl b,user_tbl u,product_tbl p WHERE b.seller_id = p.product_user_id and u.user_id = b.bidder_id and b.product_id = p.product_id and b.product_id = $product_id ORDER BY transact_date ASC";
                     $result = $connect->query($query);
$product_change_query = $connect->query($change_prod_stat);
while($finalTransact = mysqli_fetch_array($result))
{
  $finalSeller_id =   $finalTransact['seller_id'];
  $finalBidder_id =   $finalTransact['bidder_id'];
  $finalProd_id   =   $finalTransact['product_id'];
  $finalBid_id    =   $finalTransact['bid_id'];
  $finalPrice     =   $finalTransact['transact_price'];
  $finalDate      =   $finalTransact['transact_date'];
  
}
$finalTransStr = "INSERT INTO transactfinal_tbl(seller_id,bidder_id,product_id,bid_id,last_price,trans_date) VALUES($finalSeller_id,$finalBidder_id,$finalProd_id,$finalBid_id,$finalPrice,'$finalDate')";
$finalTransQry = $connect->query($finalTransStr);
header('location:products.php');
?>