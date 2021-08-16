  <?php
 include "connectionstring.php";
?>
<?php
if(!isset($_SESSION['IT_Team_M_ID']))
{
  header("location: login.php");
}else{
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
        
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
                       include 'itteam_navbar_design.php' ;
                     ?>   
               </div>
     <!--1st column end-->
     <!--2nd column start-->
               <div class="col-md-9" style="height:500;">
               
                <!--nav bar start-->
                  <nav class="navbar navbar-expand-sm bg-dark ">
                      <a class="navbar-brand text-white" href="">User Complain Details</a>
                      <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                 </nav>
             
             <!--nav bar end--> 
         
         <!-- 2nd nav bar start-->
         
                 <nav aria-label="breadcrumb ">
 
                      <ol class="breadcrumb arr-right bg-secondary-50 ">
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">Manage Complain</a></li>
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">User Complain Details</a></li>
                     
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
                     <strong> USER COMPLAIN DETAILS</strong>
                     
              </div>
              <div class="card-body">
              <form action="" method="post">
                 
                 <table class="table">
                     <thead class="thead-light">
                          <tr>
                                
                                <th>SL No</th>
                                <th>Dept Name</th>
                                <th>Emp Name</th>
                                <th>Complain Type</th>
                                <th>Description</th>
                                <th>Complain Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Resolve Date</th>
                                <th>Time</th>
                                <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
						<?php
                              $cmd="select  department_details.Department_Name,complaintype_details.complain_type,complain_description_details.complain_desc,"
							  ."employee_details.Employee_name,it_team_details.IT_Team_M_Name, employee_complain_details.* from "
							  ." department_details inner join employee_complain_details on department_details.Department_Id=employee_complain_details.Department_Id "
							  ." inner join complaintype_details on  complaintype_details.complain_id=employee_complain_details.complain_id "
							  ." inner join complain_description_details on complain_description_details.complain_desc_id=employee_complain_details.complain_desc_id "
							  ." inner join employee_details on employee_details.Emp_id = employee_complain_details.Emp_id "
							  ." inner join it_team_details on it_team_details.IT_Team_M_ID = employee_complain_details.IT_Team_M_ID  where employee_complain_details.IT_Team_M_ID ='".$_SESSION['IT_Team_M_ID']."' order by emp_complain_id asc " ; 
							  
							  
                              $data=$conn->query($cmd);
                              $slno=1;
                              foreach($data as $var)
                               {
                              ?>
                                  <tr>
                                      <?php if($var['complain_status']=='Pending') { ?>
                                        
                                        <td ><?php echo $slno++; ?></td>
                                        <td ><?php echo $var['Department_Name']?></td>
                                        <td ><?php echo $var['Employee_name']?></td>
                                        <td ><?php echo $var['complain_type']?></td>
                                        <td ><?php echo $var['complain_desc']?></td>
                                        <td ><?php echo $var['complain_forward_date']?></td>
                                        <td ><?php echo $var['complain_forward_time']?></td>
                                        <td ><?php echo $var['complain_status']?></td>
                                        <td ><?php echo $var['complain_resolve_date']?></td>
                                        <td ><?php echo $var['complain_resolve_time']?></td>
                                        <td >
                                               <a href="updateemployeecomplain_code.php?id=<?php echo $var['emp_complain_id'] ?>">Update</a>
                                        </td>
                                    <?php  } elseif($var['complain_status']=='Resolve') { ?>
                                    
                                       
                                       <td style="background-color:#99FF00"><?php echo $slno++; ?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['Department_Name']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['Employee_name']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_type']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_desc']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_forward_date']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_forward_time']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_status']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_resolve_date']?></td>
                                       <td style="background-color:#99FF00"><?php echo $var['complain_resolve_time']?></td>
                                       <td style="background-color:#99FF00"></td>
                                          
                                  </tr>
                                  <?php } ?>
                   </tbody>
                   <?php } ?>
                   </table>
                   </form>
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
