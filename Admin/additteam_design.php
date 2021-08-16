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
                  <a class="navbar-brand text-white" href="#">Add Users</a>
                  <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                </nav>

                <!-- 2nd nav bar start-->
         
                     <nav aria-label="breadcrumb ">
     
                          <ol class="breadcrumb arr-right bg-secondary-50 ">
                         
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Manage Users</a></li>
                             
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Add Users</a></li>
                         
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
                        <strong>ADD NEW USER</strong>
                        </div>
                             <div class="row"> 
                                                  <div class="card-body">
                                                      <div class="col-xs-6">
                                                          <form action="insertitteam_code.php" method="post">
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>EMPLOYEE NAME</strong></label>
                                                                <input type="text" class="form-control" placeholder="" name="employeename" id="name" required>
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>USER NAME</strong></label>
                                                                <input type="text" class="form-control" placeholder="" name="uname" id="username" required>
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
                                                                <input type="text" class="form-control" placeholder="" name="mob" onKeyPress="return validate(event)"
                                                                 id= "mobile" required>
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>EMAIL ID</strong></label>
                                                                <input type="email" class="form-control" placeholder="" name="email" id="emailid" required>
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
                                                            <label for="dept"><strong>PASSWORD</strong></label>
                                                            <input type="password" class="form-control" placeholder="" name="password" id="pass">
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                                             <div class="card-body">
                                                  <div class="col-xs-6">
                                                     
                                                      <div class="card-header" style="height:100px">              
                                                          <div class="form-group">
                                                            <label for="dept"><strong>CONFIRM PASSWORD</strong></label>
                                                            <input type="password" class="form-control" placeholder="" name="connpass" id="conpass" >
                                                          </div>
                                                      </div>
                                                  </div>
                                             </div>
                             </div>
                         
                          <div class="card-footer text-muted text-right">
                             <input type="submit" class="btn btn-primary btn-sm" value="Save" onClick="return validateForm()">
                             <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                                 </form>
                          </div>
                       </div>
                </div>
         </div>
   </div>
</div>
<script>

function validateForm(){
    var name=document.getElementById("name");
	if(name.value == "")
	{
	   alert("Please Enter Employee Name");
	   name.focus();
	   return false;
	}
	var uname=document.getElementById("username");
	if(uname.value == "")
	{
	   alert("Please Enter User Name");
	   uname.focus();
	   return false;
	}
	var contact=document.getElementById("mobile");
	 if(contact.value==""){
		
		alert("Enter Mobile Number");
		contact.focus();
		return false;
	 }
	 if(contact.value.length !== 10){
	      alert("Mobile Number Should be 10 digit");
		  contact.focus();
		  return false;
	 
	 }
	var email=document.getElementById("emaillid");
	if(email.value == "")
	{
	   alert("Please Enter Email Id");
	   email.focus();
	   return false;
	}
	var emailPattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	if(emailPattern.test(email.value) == false){
		alert('Invalid emailid');
		email.focus();
		return false;
	}
   var password=document.getElementById("pass");
   if(password.value == ""){
	    alert("Please Enter Password");
		  password.focus();
		  return false;
	 
	 }
	 
   var pass=document.getElementById("conpass");
   if(pass.value == ""){
	    alert("Please Enter Confirm Password");
		  pass.focus();
		  return false;
	 
	 }
	 
   if(password.value != pass.value)
	 {
	   alert("Password Mismatch");
		  pass.focus();
		  return false;
	 }
} 

function validate(key){
	var ascCode=key.keyCode
	  if(!(ascCode == 8 || ascCode == 46) && (ascCode < 48 || ascCode > 57)){
		return false;	
	} else{
		return true;	
	}
	
}

</script>
</body>
</html>
