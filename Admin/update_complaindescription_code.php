<?php

	include "connectionstring.php";
	$conn->beginTransaction();
	$query="update complain_description_details set complain_desc=?,complain_id=? where complain_desc_id=?";
	$res=$conn->prepare($query);
	$data=array(
	$_POST['cdesc'],
	$_POST['complaintype'],
	$_POST['id']
	);
	$success=$res->execute($data);
    /*var_dump($success);
	  exit;*/
    if($success){
        $conn->commit();
        $_SESSION['successmessage']='Complain Description update successfully.';
        session_write_close();
        header('Location:complaindescription_design.php');
        exit;
    }else{
        $conn->rollback();
        $_SESSION['warningmessage']='Failed to update complain description.';
        session_write_close();
        header('Location:complaindescription_design.php');
        exit;
    }
                                          
										   
										   