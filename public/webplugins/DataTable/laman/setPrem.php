<?php 
session_start();
include "dbcon.php";
echo $id = $_SESSION['id'];
$_SESSION['type']=2;
$change = "UPDATE user_tbl SET user_feature_id = 2 WHERE user_id = $id";
$qry = $connect->query($change);
header('location:products.php');
 ?>