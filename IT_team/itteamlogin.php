<?php
include "connectionstring.php";

$query = "select IT_Team_M_ID from it_team_details where UserName='".$_POST['uname']."' and Password='".$_POST['password']."' ";
$data=$conn->query($query);
$mid=0;
foreach($data as $var)
{
  $mid=$var['IT_Team_M_ID'];
}
if($mid > 0)
{
  session_start();
  $_SESSION['IT_Team_M_ID']=$mid;
  session_write_close();
  header("location: viewusercomplain_design.php");
}else{
   echo "Incorrect Username and Password";
}



/*$password=$_POST['password'];
$pass_str= password_hash($password, PASSWORD_BCRYPT);
$pass_chk=password_verify($password,$pass_str);
if($pass_chk){

	$sql = "select IT_Team_M_ID from it_team_details where UserName='".$_POST['uname']."'";
	$data=$conn->query($sql);
	$mid=0;
	foreach($data as $var)
		{
		  $mid=$var['IT_Team_M_ID'];
		 
		}
		 var_dump($mid);
	      exit;
	if($mid > 0)
		{
		 session_start();
		 $_SESSION['IT_Team_M_ID']=$mid;
		 session_write_close();
		 header("location: viewusercomplain_design.php");
		 
		 
		}else{
	     echo "Incorrect Username and Password";
	    }
}else
{
  echo "Password Mismatch";
}
*/

?>