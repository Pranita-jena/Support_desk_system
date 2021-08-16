<?php 

	include "connectionstring.php";
	$conn->beginTransaction();
	$query="insert into complaintype_details(complain_type) values(?)";
	$res=$conn->prepare($query);
	$data=array($_POST['complain']);
	$status=$res->execute($data);
	if($status == true)
	{
		$conn->commit();
		$_SESSION['SM']= "Record inserted successfully";
		session_write_close();
		header('location:complaintypedetails_design.php');
	}
	else
	{
		$conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:complaintypedetails_design.php');
	}
?>