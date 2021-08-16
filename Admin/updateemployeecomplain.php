<?php

	include "connectionstring.php";
	
	$conn->beginTransaction();
	$query = "UPDATE employee_complain_details SET Department_Id=?,Emp_id=?,Email_id=?,complain_id=?,complain_desc_id=?,IT_Team_M_ID=? WHERE emp_complain_id=?";
	$res=$conn->prepare($query);
	$data= array(
	$_POST['department'],
	$_POST['employeename'],
	$_POST['emailid'],
	$_POST['complaintype'],
	$_POST['complaindescription'],
	$_POST['empname'],
	$_POST['ucid']
	);
	
	$success=$res->execute($data);
    
	/*var_dump($data);
	exit;*/
    if($success){
        $conn->commit();
        $_SESSION['SM']='Complain details updated successfully.';
        session_write_close();
        header('Location: usercomplaindetails.php');
        exit;
    }else{
        $conn->rollback();
        $_SESSION['EM']='Failed to update complain details.';
        session_write_close();
        header('Location: usercomplaindetails.php');
        exit;
    }
?>
