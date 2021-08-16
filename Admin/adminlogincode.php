<?php 
include 'connectionstring.php';
$query="SELECT admin_id FROM `adminlogin` where username='".$_POST['uname']."' and password='".$_POST['password']."'";

$mid=0;
$data = $conn->query($query);

foreach($data as $var)
{
	$mid=$var['admin_id'];
	
}

if($mid > 0)
{
	session_start();
	$_SESSION['admin_id']=$mid;
	session_write_close();
	header('Location:department_details.php');
}
else
{
	echo "The emailid or password you have entered is incorrect";
}

