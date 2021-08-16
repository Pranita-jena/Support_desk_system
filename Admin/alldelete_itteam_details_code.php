<?php
include "connectionstring.php";
$conn->beginTransaction();

$rowCount = count($_POST["chkUser"]);

for($i=0;$i<$rowCount;$i++){

    //$dltid=$rowCount[$i];
    $query="delete from it_team_details where IT_Team_M_ID=?";
    $res=$conn->prepare($query);
    $data=array($_POST["chkUser"][$i]);
    //echo "<pre>";
   //print_r($data);
   //exit;
    $success=$res->execute($data);
}
/*var_dump($success);
	        exit;*/
if( $success == true){
    $conn->commit();
    $_SESSION['SM']= "Record deleted successfully";
    session_write_close();
    header('location:itteamdetails_design.php');
	exit;
}
else{
    $conn->rollback();
    $_SESSION['EM']="Failed to deleted the record";
	session_write_close();
	header('location:itteamdetails_design.php');
	exit;
}
