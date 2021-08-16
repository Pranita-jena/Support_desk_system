
<nav class="navbar navbar-expand-sm bg-dark ">
  <a class="navbar-brand text-white" href="">Website IT Team</a> 
</nav>

<div class="card ">
  <div class="card-header bg-secondary-50" style="height:40px">
   
		<div class="user">
        
                        <?php
                            $query="select IT_Team_M_Name from it_team_details where IT_Team_M_ID='".$_SESSION['IT_Team_M_ID']."'";
                            foreach ($conn->query($query) as $itm){
                        ?>
                            <p style="font-size:15px; width:300px"><i class='fas fa-user-alt'></i> <?php echo $itm['IT_Team_M_Name'] ?><?php } ?> 
                        <?php
                            $query2="select count(*) from  employee_complain_details where IT_Team_M_ID='".$_SESSION['IT_Team_M_ID']."' and complain_status='Pending'";
                            foreach($conn->query($query2) as $itm){
							$count=$itm[0];
                        ?>
                        (<?php echo $count ?> Pending Complain)
                            <?php } ?>    
                        </p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
  </div>
</div>
<br>
<nav class="navbar navbar-sm">
        <div>
               <a href="viewusercomplain_design.php" style="color:#000000"><i class='fas fa-user-plus'></i>&nbsp; Complain Details</a><br>
               <a href="editprofile_design.php" style="color:#000000"><i class='fas fa-pencil-alt'></i>&nbsp;&nbsp;  Edit Profile</a><br>
               <a href="changepassword_design.php" style="color:#000000"><i class='fas fa-list'></i>&nbsp;&nbsp;  Change Password</a>

       </div>
</nav>

<hr>
<div class="card-footer">
    <h6>IT Support Desk - &copy;2021 ,</h6>
<p> All right reserved</p>
  </div>

</head>
<body>
</body>
</html>

