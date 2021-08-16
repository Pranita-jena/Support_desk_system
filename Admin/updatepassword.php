<?php
include 'connectionstring.php';

$query="select password from adminlogin where admin_id=".$_SESSION['admin_id'];

$data=$conn->query($query);
foreach($data as $var)
	{
	
		$pwd=$var['password'];//comes from db
	}

if($pwd == $_POST['oldpwd'])
{
	$conn->beginTransaction();
	$cmd="update adminlogin set password=? where admin_id=?";
	$res=$conn->prepare($cmd);
	/*var_dump($pwd);
	exit;*/
	$data=array($_POST['newpwd'],$_SESSION['admin_id']);
	$success=$res->execute($data);
	if($success == true)
	{
		  $conn->commit();
		  $_SESSION['SM']= "Record Updated successfully";
		  session_write_close();
		  header('location:changepassword.php');
	}
	else
	{
		  $conn->rollback();
		  $_SESSION['SM']= "Failed to Update Password";
		  session_write_close();
		  header('location:changepassword.php');
	}
	
}
else{
   $_SESSION['EM']= "Old Password Is Incorrect";
   header('location:changepassword.php');
   
}