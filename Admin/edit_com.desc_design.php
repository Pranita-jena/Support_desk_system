<?php
 include "connectionstring.php";
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
   <div class="container-fluid bg-light" >
     <div class="row">
    <!-- 1st column-->
         <div class="col-md-3 alert alert-secondary" style="height:500; ">
            <?php
               include 'admin_navbar.php' ;
             ?>   
         </div>
     <!--1st column end-->
     <!--2nd column start-->
         <div class="col-md-9" style="height:500;">
         <!--nav bar start-->
            <nav class="navbar navbar-expand-sm bg-dark ">
              <a class="navbar-brand text-white" href="#">Edit Complain Type </a>
              <button type="submit" class="btn btn-dark btn-sm  text-white">Logout</button>
            </nav>
         <!--nav bar end--> 
         
        <!-- 2nd nav bar start-->
         
                 <nav aria-label="breadcrumb ">
 
                      <ol class="breadcrumb arr-right bg-secondary-50 ">
                     
                        <li class="breadcrumb-item "><a href="#" class="text-dark">Manage Users</a></li>
                     
                        <li class="breadcrumb-item "><a href="#" class="text-dark">Edit Complain Type</a></li>
                     
                      </ol>
                     
                    </nav>
             
        <!-- 2nd nav bar end-->
         <br>
        
        <div class="container"> 
            <div class="alert alert-primary">
              <strong><i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;&nbsp;Welcome to the admin panel,this could be an  <a href="#" class="alert-link">informative message</a>.</strong>
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
                  <strong>EDIT COMPLAIN TYPE</strong>
                </div>
                  
     <div class="row">
              <div class="card-body">
                  <div class="col-xs-6">
                  <form action="update_complaintype_code.php" method="post"> 
                   
                           <?php 
								$cmd="select * from complain_description_details left outer join complaintype_details on complain_description_details.complain_id=complaintype_details.complain_id where complain_desc_id='".$_GET['complain_desc_id']."'";
								$data=$conn->query($cmd);
								foreach($data as $row)
								{
							?>
                  
                      <div class="card-header">              
                          <div class="form-group">
                            <label for="dept"><strong>COMPLAIN TYPE</strong></label>
                                           <input type="hidden" name="id" value="<?php echo $_GET['complain_desc_id'] ?>" /> 
                                           <select class="form-control" name="complaintype" required>
                                           
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                            $sql="select * from complaintype_details ";
                                                                            $data=$conn->query($sql);
                                                                            foreach($data as $var)
                                                                            {
                                                                        ?>
                                                                            <option <?php echo($row['complain_id']== $var['complain_id'] ? 'selected' : '') ?> value="<?php echo $var['complain_id']; ?>"><?php echo $var['complain_type'] ?></option>
                                                                       <?php
                                                                            }
                                                                        ?>
                                            </select>                        
                                                                
                          </div>
                      </div>
                  </div>
             </div>
             <div class="card-body">
                  <div class="col-xs-12">
                      <div class="card-header">              
                          <div class="form-group">
                            <label for="dept"><strong>COMPLAIN DESCRIPTION</strong></label><br>
                            
                                <input type="text" class="form-control" name="cdesc" placeholder="" id="complain" value="<?php echo $row['complain_desc'] ?>" >
                                        
                          </div>
                      </div>
                  </div>
             </div>
 	</div>
      <?php } ?>    
      <div class="card-footer text-muted text-right">
                 <button type="submit" class="btn btn-primary btn-sm">Update</button>
                 <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
      </div>
      </form>
        </div>
         </div>   
      <!--2nd column end-->
     
     
     </div>
  </div>
  </body>
</html>