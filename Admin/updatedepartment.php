<?php
include 'connectionstring.php';
$conn->beginTransaction();
$query="update department_details set Department_Name=?,Status=? where Department_Id=?";
$res=$conn->prepare($query);

$data=array($_POST['departmentname'],$_POST['status'],$_POST['id']);

$success=$res->execute($data);
if($success == true)
{
	$conn->commit();
	//echo "Record updated successfully";
	$_SESSION['SM']= "Record updated successfully";
	  session_write_close();
	   header('location:department_details.php');
}
else
{
	$conn->rollback();
	//echo "Failed to update record";
	$_SESSION['EM']="Failed to updated the record";
	session_write_close();
	 header('location:department_details.php');
}
