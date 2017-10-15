<?php 
include "dbcon.php";
session_start();
echo $user_id = $_SESSION['id'];
echo $product_type = $connect->real_escape_string($_POST['product_type']);
echo $product_name = $connect->real_escape_string($_POST['product_name']);
echo $product_description = $connect->real_escape_string($_POST['product_description']);
echo $product_init_price = $connect->real_escape_string($_POST['product_init_price']);
echo $product_fixed_price = $connect->real_escape_string($_POST['product_fixed_price']);
echo $img = $_FILES['img']['name'];
$uploaddir = 'prod-img/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);


if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
$insertuser="INSERT INTO product_tbl(product_name,product_description,product_fixedprice,product_init_price,product_type_id,product_img,product_user_id,product_status) VALUES('$product_name','$product_description',$product_fixed_price,$product_init_price,$product_type,'$img',$user_id,1)";
$insertquery = $connect->query($insertuser);
	header('location:sellproduct.php?feedback=success');
} else {
   header('location:sellproduct.php?feedback=error');
}

 ?>