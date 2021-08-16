<?php 
	include 'connectionstring.php';
	$conn->beginTransaction();
	$query="delete from employee_complain_details where emp_complain_id=?";
	$res=$conn->prepare($query);
	$data=array($_GET['id']);
	$status=$res->execute($data);
	/*var_dump($status);
	        exit;*/
	if($status == true){
			$conn->commit();
			$_SESSION['SM']= "Record deleted successfully";
		    session_write_close();
		    header('location: usercomplaindetails.php');
			exit;
			
    }else{
		$conn->rollback();
		$_SESSION['EM']="Failed to deleted the record";
		session_write_close();
	    header('location: usercomplaindetails.php');
		exit;
	}
	