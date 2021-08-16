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
                  <a class="navbar-brand text-white" href="#">Edit IT Team</a>
                  <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                </nav>

                <!-- 2nd nav bar start-->
         
                     <nav aria-label="breadcrumb ">
     
                          <ol class="breadcrumb arr-right bg-secondary-50 ">
                         
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Manage Users</a></li>
                             
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Edit IT Team</a></li>
                         
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
                        <strong>EDIT IT TEAM</strong>
                        </div>
                             <div class="row"> 
                                                  <div class="card-body">
                                                      <div class="col-xs-6">
                                                          <form action="update_itteam_code.php" method="post">
                                                          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                                                          <?php
																
																$cmd="select * from it_team_details where IT_Team_M_ID =".$_GET['id'];
																$memberdata=$conn->query($cmd);
																foreach($memberdata as $row)
																{
															?>
    
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>EMPLOYEE NAME</strong></label>
                                                                
                                                                <input type="text" class="form-control" value="<?php echo $row['IT_Team_M_Name']; ?>" name="employeename"
                                                                 id="Department">
                                                                
                                                                 
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>USER NAME</strong></label>
                                                                <input type="text" class="form-control" value="<?php echo $row['UserName']; ?>" name="uname"
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
                                                                <label for="dept"><strong> MOBILE NO.</strong></label>
                                                                <input type="text" class="form-control" value="<?php  echo $row['Mob_No']?>" name="mob" id="Department">
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>EMAIL ID</strong></label>
                                                                <input type="text" class="form-control" value="<?php  echo $row['Email_ID']?>" name="email" id="Department">
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
                                                            <label for="dept"><strong>STATUS</strong></label><br />
                                                             <select name="status" id="status">
                                                           <option value="">Select Status</option>
                                                           <option value="Active" <?php if($row['Status']=="Active") echo "selected=\"selected\"" ?>>Active</option>
                                                           <option value="InActive" <?php if($row['Status']=="InActive") echo "selected=\"selected\"" ?>>InActive</option>
                                                             </select>    
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card-body">
                                                  <div class="col-xs-6"></div>
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
