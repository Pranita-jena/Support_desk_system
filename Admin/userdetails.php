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
                      <a class="navbar-brand text-white" href="">User Details</a>
                      <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                 </nav>
             
             <!--nav bar end--> 
         
         <!-- 2nd nav bar start-->
         
                 <nav aria-label="breadcrumb ">
 
                      <ol class="breadcrumb arr-right bg-secondary-50 ">
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">Manage Users</a></li>
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">Userdetails</a></li>
                     
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
            
            <div class="card">
                <div class="card-header">
                     <strong> USER DETAILS</strong>
                     <a href="adduser.php" style="float:right"><button> ADD  NEW USER</button></a>
                </div>
                <div class="card-body">
                  <form action="alldeleteuser_code.php" method="post">
                     <table class="table" >
                         <thead class="thead-light">
                              <tr>
                                    <th><input type="checkbox" name="checkall" /></th>
                                    <th>SL No</th>
                                    <th>Dept. Name</th>
                                    <th>Employee Name</th>
                                    <th>IP Address</th>
                                    <th>System Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email Id</th>
                                    <th>Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            <?php
                                  $cmd="select * from employee_details left outer join department_details on employee_details.Department_Id = department_details.Department_Id   order by Employee_name asc"; 
                                  $data=$conn->query($cmd);
                                  $slno=1;
                                  foreach($data as $var)
                                 {
                                  ?>
                                      <tr>
                                            <td><input type="checkbox" name="chkUser[]" id="chkUser" value="<?php echo $var['Emp_id'] ?>"/></td>
                                            <td ><?php echo $slno++; ?></td>
                                            <td ><?php echo $var['Department_Name']?></td>
                                            <td ><?php echo $var['Employee_name']?></td>
                                            <td ><?php echo $var['IP_Address']?></td>
                                            <td ><?php echo $var['System_name']?></td>
                                            <td ><?php echo $var['Mob_no']?></td>
                                            <td ><?php echo $var['Email_id']?></td>
                                            <td >
                                                 
                                              <a href="edituser.php?id=<?php echo $var['Emp_id'] ?>"><i class='fas fa-edit'></i></a>
                                              <a href="deleteuser.php?id=<?php echo $var['Emp_id'] ?>"><i class='fas fa-trash'></i></a>
                                            
                                        </td>
                                    <?php  }?> 
                                  </tr>
                    </tbody>
                   </table>
                    <tfoot>
                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                    </tfoot>
                    
                    </form>
               </div>
            </div>
            
         </div>
         
       </div>
  </div>
</div>

   
<script src="http://code.jquery.com/jquery-1.8.2.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function () {
                $('input[name="chkUser[]"]').click(function () {
				
                if ($('input[name="chkUser[]"]').length == $('input[name="chkUser[]"]:checked').length) {
                	$('input:checkbox[name="checkall"]').attr("checked", "checked");
                }
                else {
                	$('input:checkbox[name="checkall"]').removeAttr("checked");
                }
                });
                $('input:checkbox[name="checkall"]').click(function () {
                //var slvals = []
				
				//alert($(this).is(':checked'));
                if ($(this).is(':checked')) {
                	$('input[name="chkUser[]"]').attr("checked", true);
                }
                else {
                	$('input[name="chkUser[]"]').attr("checked", false);
                //slvals = null;
                }
                });
            })
        </script>     

</body>
</html>