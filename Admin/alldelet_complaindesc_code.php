<?php

	include "connectionstring.php";
	$conn->beginTransaction();
	$rowCount = count($_POST["chkUser"]);
	
	for($i=0;$i<$rowCount;$i++){
		$query="delete from complain_description_details where complain_desc_id=?";
		$res=$conn->prepare($query);
		$data=array($_POST["chkUser"][$i]);
		$success=$res->execute($data);
	}
	/*var_dump($success);
	  exit;*/
	if( $success == true){
		$conn->commit();
		$_SESSION['SM']= "Record deleted successfully";
		session_write_close();
		header('location:complaindescription_design.php');
	}
	else{
		$conn->rollback();
		$_SESSION['SM']= "Failed to deleted Record";
		session_write_close();
		header('location:complaindescription_design.php');
    }