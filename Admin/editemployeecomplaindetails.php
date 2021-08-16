<?php
 include "connectionstring.php";
?>
<?php 
if(isset($_SESSION['admin_id']))
{

}
else
{
	header('Location:adminlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <body>
 <div class="container-fluid bg-light" style="margin-top:30px">
     <div class="row">
        <!--nav bar start-->
        <div class="col-md-3 alert alert-secondary" style="height:500; ">

				<?php
                include 'admin_navbar.php' ;
                ?>

       </div>
        <!--nav bar end-->
        
        <!--form table -->
       <div class="col-md-9" style="height:500;">
                <nav class="navbar navbar-expand-sm bg-dark ">
                  <a class="navbar-brand text-white" href="#">Edit User</a>
                  <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                </nav>

                <!-- 2nd nav bar start-->
         
                     <nav aria-label="breadcrumb ">
     
                          <ol class="breadcrumb arr-right bg-secondary-50 ">
                         
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Manage Users</a></li>
                             
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Edit Users</a></li>
                         
                          </ol>
                         
                     </nav>
             
                <!-- 2nd nav bar end-->
                
                <div class="container">
                    <div class="alert alert-primary">
                          <strong><i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;&nbsp;Welcome to the admin panel,this could be an  <a href="#" class="alert-link">                                 informative message</a>.
                          </strong>
                    </div>
                   
							   <?php
                             if(isset($_SESSION['SM'])){
                            ?>
                            <div class="alert alert-success" role="alert">
                              <?php 
                                echo $_SESSION['SM'];
                                unset($_SESSION['SM']);
                              ?>
                            </div>
                            <?php } ?>
                            
                            <?php
                             if(isset($_SESSION['EM'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                              <?php 
                                echo $_SESSION['EM'];
                                unset($_SESSION['EM']);
                              ?>
                            </div>
                            <?php } ?>
                   
                    <div class="card ">
                        <div class="card-header">
                        <strong>EDIT USER</strong>
                        </div>
                             <div class="row"> 
                                                  <div class="card-body">
                                                      <div class="col-xs-6">
                                                          <form action="updateemployeecomplain.php" method="post">
                                                          
                               <?php
							   
                              $cmd="select  department_details.Department_Name,complaintype_details.complain_type,complain_description_details.complain_desc,"
							  ."employee_details.Employee_name,it_team_details.IT_Team_M_Name, employee_complain_details.* from "
							  ." department_details inner join employee_complain_details on department_details.Department_Id=employee_complain_details.Department_Id "
							  ." inner join complaintype_details on  complaintype_details.complain_id=employee_complain_details.complain_id "
							  ." inner join complain_description_details on complain_description_details.complain_desc_id=employee_complain_details.complain_desc_id "
							  ." inner join employee_details on employee_details.Emp_id = employee_complain_details.Emp_id "
							  ." inner join it_team_details on it_team_details.IT_Team_M_ID = employee_complain_details.IT_Team_M_ID  where emp_complain_id='".$_GET['id']."' " ; 
							  
							  
                              $data=$conn->query($cmd);
                             
                              foreach($data as $var)
                               {
                              ?>
                                       <input type="hidden" id="ucid" name="ucid" value="<?php echo $var['emp_complain_id']; ?>" />                   
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>DEPARTMENT NAME</strong></label>
                                                                
                                                                 <select class="form-control" name="department" id="deptname" required>
                                                                        <option value="">Select Department</option>
                                                                        <?php
                                                                            $sql="select Department_Name,Department_Id from department_details where Status='Active'";
                                                                            $data=$conn->query($sql);
                                                                            foreach($data as $itm)
                                                                            {
                                                                        ?>
                                                                            <option <?php echo($itm['Department_Id']==$var['Department_Id'] ? 'selected="selected"' : '') ?>  value="<?php echo $itm['Department_Id']; ?>"><?php echo $itm['Department_Name']; ?>
                                                                            </option>
                                                                       <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                
                                                                 
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>EMPLOYEE NAME</strong></label>
                                                                     <select class="form-control" name="employeename" id="employeename" required>
                                                                         <option value="">Select Employee Name</option>
                                                                         <?php
																			$query1="select Employee_name,Emp_id from employee_details";
																			foreach ($conn->query($query1) as $row1){
																			?>
																			<option <?php echo($row1['Emp_id']==$var['Emp_id'] ? 'selected="selected"' : '') ?> value="<?php echo $row1['Emp_id']; ?>"><?php echo $row1['Employee_name']; ?></option><?php } ?>
                           
                                                                     </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                             </div>
 
                             <div class="row"> 
                                                  <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong> EMAIL ID</strong></label>
                                                                     <select class="form-control" name="emailid" id="emailid" required>
                                                                         <option value="">Select Email Id</option>
                                                                         <?php
																			$query5="select Email_id,Emp_id from employee_details";
																			foreach ($conn->query($query5) as $row5){
																				
																			?>
																			
																			<option <?php echo($row5['Emp_id']==$var['Emp_id'] ? 'selected="selected"' : '') ?> value="<?php echo $row5['Emp_id']; ?>"><?php echo $row5['Email_id']; ?></option><?php } ?>
                                                                     </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                         
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>COMPLAIN TYPE</strong></label>
                                                                     <select class="form-control" name="complaintype" id="complaintype" required>
                                                                         <option value="">Select Complain Type</option>
                                                                         <?php
																		     $sql="select complain_id,complain_type from complaintype_details where status='Active'";
																			 $data=$conn->query($sql);
																			 foreach($data as $item)
																			 {
																			 ?>
                                                                               <option <?php echo($item['complain_id']==$var['complain_id'] ? 'selected="selected"' : '') ?> value="<?php echo $item['complain_id']; ?>"> <?php echo $item['complain_type']; ?>
                                                                               </option>
                                                                               
                                                                             <?php
																			 }
																			 ?>
                                                                     </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                              </div>
                     
                              <div class="row"> 
                                              <div class="card-body">
                                                  <div class="col-xs-6">
                                                      
                                                      <div class="card-header" style="height:100px">              
                                                          <div class="form-group">
                                                            <label for="dept"><strong>COMPLAIN DESCRIPTION</strong></label>
                                                            <select class="form-control" name="complaindescription" id="complaindescription" required>
                                                               <option>Select Complain Description</option>
                                                               <?php
																	$query3="select complain_desc_id,complain_desc from complain_description_details where status='Active'";
																	foreach ($conn->query($query3) as $row3){
																	?>
																	<option <?php echo($row3['complain_desc_id']==$var['complain_desc_id'] ? 'selected="selected"' : '') ?> value="<?php echo $row3['complain_desc_id']; ?>"><?php echo $row3['complain_desc']; ?></option>
																	<?php } ?>
                                                            </select>
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                                             <div class="card-body">
                                                  <div class="col-xs-6">
                                                     
                                                      <div class="card-header" style="height:100px">              
                                                          <div class="form-group">
                                                            <label for="dept"><strong>FORWARD COMPLAIN TO</strong></label>
                                                              <select class="form-control" name="empname" id="empname" required>
                                                               <option>Select Employee Name</option>
                                                                   <?php
																      $sql="select IT_Team_M_ID,CONCAT(IT_Team_M_Name, '(',UserName,')') AS empname from it_team_details                                                                            where Status='Active'"; 
																	  $data=$conn->query($sql);
																	  foreach($data as $itm)
																	  {
																   ?>
                                                                    <option <?php echo($itm['IT_Team_M_ID']==$var['IT_Team_M_ID'] ? 'selected="selected"' : '') ?> value="<?php echo $itm['IT_Team_M_ID'];?>"><?php echo $itm['empname'];?></option> 
                                                                   
                                                                   <?php } ?>
                                                                   
                                                              </select>
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                             </div>
                         
                          <div class="card-footer text-muted text-right">
                             <button type="submit" class="btn btn-primary btn-sm">Save</button>
                             <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                                 </form>
                                 <?php } ?>
                          </div>
                       </div>
                </div>
         </div>
   </div>
</div>

 <script type="text/javascript">
            $(document).ready(function(){
                $('#deptname').change(function(){
                    
                    $.ajax({
                        url:'fetchemployeename.php',
                        type:'post',
                        data:{Department_Id : $(this).val()},
                        datatype:'html',
                        
                        beforeSend:function(){
                                            // empty and show loading...
                                            $('#employeename').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
                                            $('#employeename').empty().append(response);
                                    }
                     });
                 });
                 
                 
				 $('#employeename').change(function(){
                     
                     $.ajax({
                            url:'fetchemailid.php',
                            type:'post',
                            data:{empid: $(this).val()},
                            datatype:'html',
                            
                            beforeSend:function(){
                                            // empty and show loading...
                                            $('#emailid').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
                                            $('#emailid').empty().append(response);
                                    }
                     });
                 });
                 
                 
                 $('#complaintype').change(function(){
                     
                     $.ajax({
                            url:'fetchcompdesc.php',
                            type:'post',
                            data:{complaintypeid: $(this).val()},
                            datatype:'html',
                            
                            beforeSend:function(){
                                            // empty and show loading...
                                            $('#complaindescription').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
                                            $('#complaindescription').empty().append(response);
                                    }
                     });
                 });
                 
             });
        </script>

</body>

</html>
