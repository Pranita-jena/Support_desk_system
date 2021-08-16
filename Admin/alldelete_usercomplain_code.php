<?php
include "connectionstring.php";

    $conn->beginTransaction();
    $rowCount = count($_POST["chkUser"]);
    
    for($i=0;$i<$rowCount;$i++) {
        $query = "delete from employee_complain_details  where emp_complain_id = ? ";
        $res=$conn->prepare($query);
        $data=array($_POST["chkUser"][$i]);
        $success=$res->execute($data);
    }

    if($success==true){
        $conn->commit();
        $_SESSION['SM']='Complain details delete successfully';
        session_write_close();
        header('Location: usercomplaindetails.php');
        exit;
    }
    else if($success==false){
        $conn->rollback();
        $_SESSION['EM']='Failed to delete Complain';
        session_write_close();
        header('Location: usercomplaindetails.php');
        exit;
    }