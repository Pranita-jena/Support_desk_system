<?php
 include "connectionstring.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   <title>Admin Panel</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
        <div class="container-fluid bg-light" style="margin-top:30px;" >
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
                                  <a class="navbar-brand text-white" href="#">Change Password</a>
                                  <button type="submit" class="btn btn-dark btn-sm  text-white">Logout</button>
                             </nav>
                         <!--nav bar end--> 
         
                         <!-- 2nd nav bar start-->
                         
                                 <nav aria-label="breadcrumb ">
                 
                                      <ol class="breadcrumb arr-right bg-secondary-50 ">
                                     
                                            <li class="breadcrumb-item "><a href="#" class="text-dark">My Settings</a></li>
                                         
                                            <li class="breadcrumb-item "><a href="#" class="text-dark">Change Password</a></li>
                                         
                                      </ol>
                                     
                                </nav>
                             
                        <!-- 2nd nav bar end-->
                                <br>
                                <div class="container">
                                     <div class="alert alert-primary">
                                          <strong>
                                                    <i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;&nbsp;Welcome to the admin panel,this could be an  <a href="#"                                                     class="alert-link">informative message</a>.
                                          </strong>
                                     </div>
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
                                    
                                
                                
                                <div class="card " style="height:500px">
                                      <div class="card-header">
                                        <strong>CHANGE PASSWORD</strong>
                                      </div>
                                      <form action="updatepassword.php" method="post">
                                      <div class="card-body">
                                          <div class="col-sm-8">
                                              <div class="card-header" style="height:100px">              
                                                  <div class="form-group" >
                                                        <label for="dept"><strong>OLD PASSWORD</strong></label>
                                                        <input type="text" class="form-control" name="oldpwd" required><br>
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                     </div>
                                     
                                     <div class="card-body">
                                          <div class="col-sm-8">
                                              <div class="card-header" style="height:100px">              
                                                  <div class="form-group">
                                                    <label for="dept"><strong>NEW PASSWORD</strong></label>
                                                    <input type="text" class="form-control" name="newpwd" id="pwd" required><br>
                                                  </div>
                                              </div>
                                          </div>
                                     </div>
                                     
                                     <div class="card-body">
                                          <div class="col-sm-8">
                                              <div class="card-header" style="height:100px">              
                                                  <div class="form-group">
                                                        <label for="dept"><strong>CONFIRM PASSWORD</strong></label>
                                                        <input type="text" class="form-control" name="" id="conpwd" required><br>
                                                  </div>
                                              </div>
                                          </div>
                                     </div>
                                     
                                     
                                      <div class="card-footer text-muted text-right">
                                         <button type="submit" class="btn btn-primary btn-sm"  onclick="return validateForm() ">Update</button>
                                         <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                                      </div>
                                  </div>
                                              </form><br>
                                            
                         </div>
                 </div>
       </div>
       <script>
         function validateForm(){
		     if(document.getElementById('pwd').value != document.getElementById('conpwd').value){
			 alert('Password Mismatch');	
		     conpwd.focus();
		     return false;
			 
			 }
		 } 
       </script>
  </body>
</html>
