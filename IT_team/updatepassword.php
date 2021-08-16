<?php
 include "connectionstring.php";
 
 $query="select Password from it_team_details where IT_Team_M_ID=".$_SESSION['IT_Team_M_ID'];
 $data=$conn->query($query);
 foreach($data as $var)
 {
     $pwd = $var['Password'];
 }
 
 if($pwd == $_POST['oldpwd'])
 {
     $conn->beginTransaction();
	 $sql="update it_team_details set Password=? where IT_Team_M_ID=? ";
	 $res=$conn->prepare($sql);
	 $data=array($_POST['newpwd'],$_SESSION['IT_Team_M_ID']);
	 $success=$res->execute($data);
	 
	 if($success == true){
	      $conn->commit();
		  $_SESSION['SM']= "Record Updated successfully";
		  session_write_close();
		  header('location:changepassword_design.php');
		
	 
	 }else{
	      $conn->rollback();
	      $_SESSION['SM']= "Failed to Update Password";
		  session_write_close();
		  header('location:changepassword_design.php');
	 }
	 
 }else{
         $_SESSION['EM']= "Old Password Is Incorrect";
         header('location:changepassword_design.php');
 }
 
 
?>