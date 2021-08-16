<?php
include 'connectionstring.php';
$conn->beginTransaction();



$query='update it_team_details  set IT_Team_M_Name=?,UserName=?,Mob_No=?,Email_ID=?,Status=? where IT_Team_M_ID=?';

$res=$conn->prepare($query);

$data=array($_POST['employeename'],$_POST['uname'],$_POST['mob'],$_POST['email'],$_POST['status'],$_POST['id']);

$success=$res->execute($data);

/*var_dump($success);
exit;*/

if($success == true)
{
	$conn->commit();
	//echo "Record updated successfully";
	  $_SESSION['SM']= "Record updated successfully";
	  session_write_close();
	  header('location:itteamdetails_design.php');
	 
}
else
{
	$conn->rollback();
	//echo "Failed to update record";
	$_SESSION['EM']="Failed to updated the record";
	session_write_close();
    header('location:itteamdetails_design.php');
}
