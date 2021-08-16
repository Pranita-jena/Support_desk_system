<?php
 
 include "connectionstring.php";
 
 $sql=" select Employee_name,Emp_id from employee_details where Department_id='".$_POST['Department_Id']."'";

 echo '<option value="">Select Employee Name</option>';
 foreach($conn->query($sql) as $var)
 {
?>
   <option value="<?php echo $var['Emp_id'] ?>"><?php echo $var['Employee_name'] ?></option>
   
   <?php
   
   }
   
   ?>
 
