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
  </head>
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
                  <a class="navbar-brand text-white" href="#">Edit Users</a>
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
                                                          <form action="updateuserdetails.php" method="post">
                                                          
                                                          <?php
																
																$cmd="select * from employee_details where Emp_id=".$_GET['id'];
																$memberdata=$conn->query($cmd);
																foreach($memberdata as $row)
																{
															?>
    
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>DEPARTMENT NAME</strong></label>
                                                                
                                                                <input type="hidden" name="eid" value="<?php echo $row['Emp_id'] ?>" />
                                                                
                                                                 <select class="form-control" name="department" required>
                                                                        <option value="">Select Department</option>
                                                                        <?php
                                                                            $sql="select Department_Name,Department_Id from department_details";
                                                                            $data=$conn->query($sql);
                                                                            foreach($data as $var)
                                                                            {
                                                                        ?>
                                                                            <option <?php echo($row['Department_id'] == $var['Department_Id'] ? 'selected' : '') ?> value="                                                                                    <?php echo $var['Department_Id']; ?>"><?php echo $var['Department_Name']; ?>
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
                                                                <input type="text" class="form-control" value="<?php echo $row['Employee_name']; ?>" name="employeename" 
                                                                id="Department">
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
                                                                <label for="dept"><strong> SYSTEM IP ADDRESS</strong></label>
                                                                <input type="text" class="form-control" value="<?php  echo $row['IP_Address']?>" name="ipaddress" id="Department">
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>SYSTEM NAME</strong></label>
                                                                <input type="text" class="form-control" value="<?php  echo $row['System_name']?>" name="systemname" id="Department">
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
                                                            <label for="dept"><strong>MOBILE NO.</strong></label>
                                                            <input type="text" class="form-control" value="<?php  echo $row['Mob_no']?>" name="mobileno" id="Department">
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                                             <div class="card-body">
                                                  <div class="col-xs-6">
                                                      
                                                      <div class="card-header" style="height:100px">              
                                                          <div class="form-group">
                                                            <label for="dept"><strong>EMAIL ID</strong></label>
                                                            <input type="email" class="form-control" value="<?php  echo $row['Email_id']?>" name="email" id="Department">
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                             </div>
                         <?php } ?>
                          <div class="card-footer text-muted text-right">
                             <button type="submit" class="btn btn-primary btn-sm">Update</button>
                             <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                                 </form>
                          </div>
                       </div>
                </div>
         </div>
   </div>
</div>
</body>
</html>
