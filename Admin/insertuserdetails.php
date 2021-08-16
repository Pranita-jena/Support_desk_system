<?php 

	include "connectionstring.php";
	$conn->beginTransaction();
	$query="insert into employee_details(Department_id,Employee_name,IP_Address,System_name,Mob_no,Email_id) values(?,?,?,?,?,?)";
	$res=$conn->prepare($query);
	$data=array($_POST['department'],$_POST['employeename'],$_POST['ipaddress'],$_POST['systemname'],$_POST['mobileno'],$_POST['email']);
	$status=$res->execute($data);
	/*var_dump($status);
	        exit;*/
	if($status == true)
	{
		  $conn->commit();
		  $_SESSION['SM']= "Record inserted successfully";
		  session_write_close();
		  header('location:userdetails.php');
	}
	else
	{
		$conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:userdetails.php');
	}
?>
