<?php 

	include "connectionstring.php";
	$conn->beginTransaction();
	$query="insert into department_details(Department_Name) values(?)";
	$res=$conn->prepare($query);
	$data=array($_POST['departmentname']);
	$status=$res->execute($data);
	if($status == true)
	{
		$conn->commit();
		$_SESSION['SM']= "Record inserted successfully";
		session_write_close();
		header('location:department_details.php');
	}
	else
	{
		$conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:department_details.php');
	}
?>