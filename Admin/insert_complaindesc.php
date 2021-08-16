<?php 

	include "connectionstring.php";
	$conn->beginTransaction();
	$query="insert into complain_description_details(complain_id,complain_desc) values(?,?)";
	$res=$conn->prepare($query);
	$data=array($_POST['complaintype'],$_POST['cdesc']);
	$status=$res->execute($data);
	/*var_dump($status);
	exit;*/
	if($status == true)
	{
		$conn->commit();
		$_SESSION['SM']= "Record inserted successfully";
		session_write_close();
		header('location:complaindescription_design.php');
	}
	else
	{
		$conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:complaindescription_design.php');
	}
?>