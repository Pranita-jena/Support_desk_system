<?php
	include "connectionstring.php";
	$conn->beginTransaction();
	$query = "insert into employee_complain_details(Department_Id,Emp_id,complain_id,complain_desc_id,IT_Team_M_ID,complain_forward_date,complain_forward_time,complain_status,Email_id) values(?,?,?,?,?,?,?,?,?)";
	
	date_default_timezone_set('Asia/Calcutta');
	$my_date = date("Y-m-d");
	$time = date("h,i A");
	
	$res=$conn->prepare($query);
	$data=array($_POST['department'],$_POST['employeename'],$_POST['complaintype'],$_POST['complaindescription'],$_POST['empname'],$my_date,$time,'Pending',$_POST['emailid']);
	
	$success=$res->execute($data);
	var_dump($success);
	exit;
	if(success){
	      $conn->commit();
		  $_SESSION['SM']= "Record inserted successfully";
		  session_write_close();
		  header('location:usercomplaindetails.php');
		  
    }else{
        $conn->rollback();
		$_SESSION['EM']="Failed to insert the record";
		session_write_close();
		header('location:usercomplaindetails.php');
		
    }
	
	



?>