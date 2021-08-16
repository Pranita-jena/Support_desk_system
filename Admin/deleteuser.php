<?php
	include "connectionstring.php";
	$conn->beginTransaction();
	$query=" delete from employee_details where Emp_id = ? ";
	$res=$conn->prepare($query);
	$data=array($_GET['id']);
	$status=$res->execute($data);
	/*var_dump($status);
	        exit;*/
	if($status == true){
			$conn->commit();
			$_SESSION['SM']= "Record deleted successfully";
		    session_write_close();
		    header('location:userdetails.php');
			exit;
			
    }else{
		$conn->rollback();
		$_SESSION['EM']="Failed to deleted the record";
		session_write_close();
	    header('location:userdetails.php');
		exit;
	}
	
?>