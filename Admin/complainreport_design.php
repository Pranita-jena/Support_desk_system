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
                  <a class="navbar-brand text-white" href="#">Complain Reports</a>
                  <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
                </nav>

                <!-- 2nd nav bar start-->
         
                     <nav aria-label="breadcrumb ">
     
                          <ol class="breadcrumb arr-right bg-secondary-50 ">
                         
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Manage Complain</a></li>
                             
                                <li class="breadcrumb-item "><a href="#" class="text-dark">Complain Report</a></li>
                         
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
                        <strong>QUICK SEARCH</strong>
                        </div>
                             <div class="row"> 
                                                  <div class="card-body">
                                                      <div class="col-xs-6">
                                                          <form action="" method="get">
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>FROM DATE</strong></label>
                                                                <input type="date" class="form-control" name="formdate" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="card-body">
                                                      <div class="col-xs-6">
                                                          
                                                          <div class="card-header" style="height:100px">              
                                                              <div class="form-group">
                                                                <label for="dept"><strong>TO DATE</strong></label>
                                                                <input type="date" class="form-control" name="todate" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                 </div>
                             </div>
 
                             
                         
                          <div class="card-footer text-muted text-right">
                             <input type="submit" class="btn btn-primary btn-sm" value="Search" onClick="return validateForm()">
                             <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                                 </form>
                          </div>
                       </div>
                       
                 <div class="card">
                  <div class="card-header">
                         <strong>COMPLAIN DETAILS</strong>
                  </div>
                  <div class="card-body">
                  <form action="" method="get">
                        <?php
                        /*var_dump($_GET['fromdate']);
                        exit;*/
                        if(isset($_GET['formdate']) && $_GET['formdate']!='' && isset($_GET['todate']) && $_GET['todate']!=''){
                        ?>
                     <table class="table">
                         <thead class="thead-light">
                              <tr>
                                   
                                    <th>SL No</th>
                                    <th>Dept Name</th>
                                    <th>Emp Name</th>
                                    <th>Complain Type</th>
                                    <th>Description</th>
                                    <th>Complain Date</th>
                                    <th>Complain Time</th>
                                    <th>Status</th>
                                    <th>Resolve Date</th>
                                    <th>Resolve Time</th>
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
                                  ." inner join it_team_details on it_team_details.IT_Team_M_ID = employee_complain_details.IT_Team_M_ID  where complain_forward_date between '".$_GET['formdate']."' and '".$_GET['todate']."' " ; 
                                  
                                  
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
                                            
                                            
                                        <?php  } elseif($var['complain_status']=='Resolve') { ?>
                                        
                                           
                                           
                                           <td style="background-color:#99FF00"><?php echo $slno++; ?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['Department_Name']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['Employee_name']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_type']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_desc']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_forward_date']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_forward_time']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_status']?></td>
                                           <td style="background-color:#99FF00" ><?php echo $var['complain_resolve_date']?></td>
                                           <td style="background-color:#99FF00"><?php echo $var['complain_resolve_time']?></td>
                                           
                                      </tr>
                                      <?php } ?>
                        </tbody>
                        <?php } ?>
                       </table>
                        <?php } ?>
                        </form>
                         </div>
                         </div>
                      
                </div>
         </div>
   </div>
</div>
</body>
</html>

