<?php
session_start();
include "dbcon.php";
$query = "SELECT * FROM user_tbl e LEFT OUTER JOIN gender_tbl g ON e.user_gender_id = g.gender_id LEFT OUTER JOIN userfeature_tbl f on e.user_feature_id = f.userfeature_id  WHERE e.status =1";
$result=$connect->query($query);
$users = array();
$empUser = ($_POST['username']);
$empPass = ($_POST['password']);
$concatinput = $empUser.$empPass;
$check = false;
$current_id;
while($query=mysqli_fetch_array($result))
{
	$accuser = $query['user_email']; 
	$accpass = $query['user_password']; 
	$concat = $accuser.$accpass;
	$users[] = array(
		'username' =>	$query['user_email'],
		'password'	=>	$query['user_password'],	
		'users' => $concat,
		'id'	=> $query['user_id'],
		'type' 	=> $query['user_feature_id']
		);
}
foreach ($users as $activeusers) {
	if($activeusers['users']==$concatinput)
	{
		if($activeusers['username']==$empUser && $activeusers['password']==$empPass)
		{
			echo $check = true;
			echo $current_id = $activeusers['id'];
			echo$type = $activeusers['type'];
		}
	}

}
if($check == true)
{
	echo $_SESSION['id'] = $current_id;
	echo $_SESSION['type'] = $type;
	
	header('location:products.php');
}
else
{
	
	header('location:index.php');
}
?>