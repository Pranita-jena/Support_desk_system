<?php 
	include "connectionstring.php";
	$conn->beginTransaction();
	$query="delete from complaintype_details where complain_id=?";
	$res=$conn->prepare($query);
	$data=array($_GET['id']);
	$status=$res->execute($data);
	var_dump($status);
	        exit;
	
	if($status == true){
			$conn->commit();
			$_SESSION['SM']= "Record deleted successfully";
		    session_write_close();
		    header('location:complaintypedetails_design.php');
			exit;
			
    }else{
			$conn->rollback();
			$_SESSION['EM']="Failed to deleted the record";
			session_write_close();
			header('location:complaintypedetails_design.php');
			exit;
	}
	
	
