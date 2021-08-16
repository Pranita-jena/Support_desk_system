<?php
include 'connectionstring.php';
$query="select count(*) as totaldepartment from department_details where Department_Name='".$_POST['department']."'";
//echo alert();
$data=$conn->query($query);
//array
//totaldepartment
//    1
foreach($data as $var)
{
	$count=$var['totaldepartment'];//1
}

echo $count;
