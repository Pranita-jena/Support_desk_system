<?php 
include "connectionstring.php";

$sql = "select Emp_id,Email_id from employee_details where Emp_id='".$_POST['empid']."'";

echo '<option value="">Select Email Id</option>';
foreach($conn->query($sql) as $itm)
 {
?>

 <option value="<?php echo $itm['Emp_id']?>"><?php echo $itm['Email_id']?></option>
 
 <?php
 }
 ?>