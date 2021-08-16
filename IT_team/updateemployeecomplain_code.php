<?php
include "connectionstring.php";

$conn->beginTransaction();

date_default_timezone_set('Asia/Calcutta');
$date=date("Y,m,d");
$time=date("h.i A");

	$query = "update employee_complain_details set complain_status=?,complain_resolve_date=?,complain_resolve_time=? where emp_complain_id= ?  ";
	$res=$conn->prepare($query);
	$data=array('Resolve',$date,$time,$_GET['id']);
	$success=$res->execute($data);

    if($success==true){
        $conn->commit();
        $_SESSION['SM']= "Record Updated successfully";
        session_write_close();
        header('Location:viewusercomplain_design.php');
        exit;
    }
    else if($success==false){
        $conn->rollback();
        $_SESSION['SM']= "Failed to Update Record";
		session_write_close();
		header('location:viewusercomplain_design.php');
    }


?>
