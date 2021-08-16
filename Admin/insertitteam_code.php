<?php 

	include "connectionstring.php";
	$conn->beginTransaction();
	
	$query="insert into it_team_details(IT_Team_M_Name,UserName,Password,Mob_No,Email_ID) values(?,?,?,?,?)";
	$res=$conn->prepare($query);
	/*$password = $_POST['password'];
	$pass_str= password_hash($password, PASSWORD_BCRYPT);*/
	$data=array($_POST['employeename'],$_POST['uname'],$_POST['password'],$_POST['mob'],$_POST['email']);
	$status=$res->execute($data);
	/*var_dump($status);
	        exit;*/
	if($status == true)
	{
		  $conn->commit();
		  $_SESSION['SM']= "Record inserted successfully";
		  session_write_close();
		  header('location:itteamdetails_design.php');
	}
	else
	{
		$conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:itteamdetails_design.php');
	}
?>
