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
              <a class="navbar-brand text-white">Complain Description</a>
              <a href="logout.php" class="btn btn-dak btn-sm  text-white">Logout</a>
            </nav>
         <!--nav bar end--> 
         
         <!-- 2nd nav bar start-->
         
                 <nav aria-label="breadcrumb ">
 
                      <ol class="breadcrumb arr-right bg-secondary-50 ">
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">Manage Users</a></li>
                     
                        <li class="breadcrumb-item "><a href="" class="text-dark">Complain Description</a></li>
                     
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
                <strong>ADD COMPLAIN DESCRIPTION</strong>
              </div>
       <div class="row">
              <div class="card-body">
                  <div class="col-sm-12">
                      <form action="insert_complaindesc.php" method="post">
                      <div class="card-header" style="height:100px">              
                          <div class="form-group">
                            <label for="dept"><strong>COMPLAIN TYPE</strong></label>
                                           <select class="form-control" name="complaintype" required>
                                           
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                            $sql="select *  from  complaintype_details where status='Active'";
                                                                            $data=$conn->query($sql);
                                                                            foreach($data as $var)
                                                                            {
                                                                        ?>
                                                                            <option value="<?php echo $var['complain_id']; ?>"><?php echo $var['complain_type']; ?>
                                                                            </option>
                                                                       <?php
                                                                            }
                                                                        ?>
                                            </select>                        
                                                                  
                                                                    
                            <span id="err" style="color:#FF0000"></span>
                          </div>
                      </div>
                  </div>
             </div>
             
             <div class="card-body">
                  <div class="col-sm-12">
                      
                      <div class="card-header" style="height:100px">              
                          <div class="form-group">
                            <label for="dept"><strong>COMPLAIN DESCRIPTION</strong></label>
                            <input type="text" class="form-control" name="cdesc" id="Department"><br>
                            <span id="err" style="color:#FF0000"></span>
                          </div>
                      </div>
                  </div>
             </div>
      </div>      
              <div class="card-footer text-muted text-right">
                 <button type="submit" class="btn btn-primary btn-sm">Save</button>
                 <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
              </div>
          </div>
                    </form>
                    
                    <br>
 <div class="card">
      <div class="card-header">
         <strong> COMPLAIN DESCRIPTION DETAILS</strong>
      </div>
      <div class="card-body">
      <form action="alldelet_complaindesc_code.php" method="post">
        <table class="table">
            <thead class="thead-light">
                  <tr>
                        <th><input type="checkbox" name="checkall" /></th>
                        <th>SL No</th>
                        <th>Complain Type</th>
                        <th>Complain Description</th>
                        <th>Status</th>
                        <th>Action</th>
                  </tr>
            </thead>
        <tbody>
        <?php
              $cmd="select * from complain_description_details left outer join complaintype_details on complain_description_details.complain_id = complaintype_details.complain_id   order by complain_type  asc"; 
              $data=$conn->query($cmd);
              $slno=1;
              foreach($data as $var)
             {
              ?>
                  <tr>
                        <td><input type="checkbox" name="chkUser[]" id="chkUser" value="<?php echo $var['complain_desc_id'] ?>"/></td>
                        <td ><?php echo $slno++; ?></td>
                        <td ><?php echo $var['complain_type']?></td>
                        <td ><?php echo $var['complain_desc']?></td>
                        <td ><?php echo $var['status']?></td>
                        <td >
                            </div>   
                              <a href="edit_complaindesc_design.php?id=<?php echo $var['complain_desc_id'] ?>"><i class='fas fa-edit'></i></a>
                              <a href="delete_complaindesc_code.php?id=<?php echo $var['complain_desc_id'] ?>"><i class='fas fa-trash'></i></a>
                            </div>
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
      <!--2nd column end-->
     </div>
  </div>
  <!--script start-->
   <script src="jquerylibrary.js"></script>
   <script>
     $(document).ready(function(){
	     $('#Department').change(function(){
		      $.ajax({
			        url:"checkdepartmentdetails.php",
					data:{department: $('#Department').val()},
					type:'post',
					success:function(response)`{
						if(response == 1)
						 {
							$('#err').text('Department name already exists');
						 }
						 else
						 {
							$('#err').text('');
						 }
					}
			  
			  })
		 
		 }) 
	 
	 })
   
   </script>
  <!--script end-->
  <!--multiple delete-->
   
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