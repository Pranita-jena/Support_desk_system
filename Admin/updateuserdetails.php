<?php
include 'connectionstring.php';
$conn->beginTransaction();



$query='update employee_details set Department_id=?,Employee_name=?,IP_Address=?,System_name=?,Mob_no=?,Email_id=? where Emp_id=?';

$res=$conn->prepare($query);

$data=array($_POST['department'],$_POST['employeename'],$_POST['ipaddress'],$_POST['systemname'],$_POST['mobileno'],$_POST['email'],$_POST['eid']);

//var_dump($data);
//exit;

$success=$res->execute($data);

if($success == true)
{
	$conn->commit();
	//echo "Record updated successfully";
	  $_SESSION['SM']= "Record updated successfully";
	  session_write_close();
	  header('location:userdetails.php');
	 
}
else
{
	$conn->rollback();
	//echo "Failed to update record";
	$_SESSION['EM']="Failed to updated the record";
	session_write_close();
    header('location:userdetails.php');
}
