<?php
	include "connectionstring.php";
	
	$conn->beginTransaction();
	$query = "update  it_team_details set IT_Team_M_Name=?,UserName=?,Mob_No=?,Email_ID=? where IT_Team_M_ID=? ";
	$res=$conn->prepare($query);
	$data=array($_POST['employeename'],$_POST['username'],$_POST['mobno'],$_POST['email'],$_SESSION['IT_Team_M_ID']);
	$success=$res->execute($data);
	
	if($success == true)
	{
		$conn->commit();
		$_SESSION['SM'] = "Record Updated Successfully";
		session_write_close();
		header("location: viewusercomplain_design.php");
		
	}else{
		$conn->rollback();
		$_SESSION['EM'] = "Failed to Update  Record";
		session_write_close();
		header("location: viewusercomplain_design.php");
	}
	
?>