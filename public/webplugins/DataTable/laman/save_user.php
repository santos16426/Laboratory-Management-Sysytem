<?php 
include "dbcon.php";
echo $features = $connect->real_escape_string($_POST['jobb']);
echo $fname = $connect->real_escape_string($_POST['fname']);
echo $mname = $connect->real_escape_string($_POST['mname']);
echo $lname = $connect->real_escape_string($_POST['lname']);
echo $bday = $connect->real_escape_string($_POST['bday']);
echo $contact_number = $connect->real_escape_string($_POST['contact_number']);
echo $gender = $connect->real_escape_string($_POST['gender']);
echo $email = $connect->real_escape_string($_POST['email']);
echo $password = $connect->real_escape_string($_POST['password']);
echo $address = $connect->real_escape_string($_POST['address']);
echo $img = $_FILES['img']['name'];
$uploaddir = 'user-img/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);


if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
$insertuser="INSERT INTO user_tbl (user_fname,user_mname,user_lname,user_address,user_contact,user_gender_id,user_feature_id,user_password,user_bday,user_img,user_email) VALUES('$fname','$mname','$lname','$address','$contact_number',$gender,$features,'$password','$bday','$img','$email')";
$insertquery = $connect->query($insertuser);
header('location:registration.php?feedback=success');
} else {
   header('location:registration.php?feedback=error');
}

 ?>