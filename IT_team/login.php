<?php 
include 'connectionstring.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
  
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"     
     integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  </head>
  
  <body>
  
    <div class="container-fluid" style="background-image:url(../image/cupimg.png); height:730px; margin-top:20px">
          <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                       <h1 style="color:#FFFFFF;margin-top:140px;margin-left:120px;">IT Team Login Form</h1>
                       <div class="card" style="height:320px; width:500px; margin-top:60px; margin-left:80px">
                              <div class="card-header bg-white"  style="height:100px;" >
                                  <div class="row">
                                        <div class="col-md-11">
                                             <h4>Login to our side</h4>
                                             <p> Enter your username and password to log on: </p>
                                        </div>
                                        <div class="col-md-1">     
                                             <i class='fas fa-lock  text-secondary' style="font-size:40px; float:right; padding-top:10px;"></i>
                                        </div>
                                  </div>
                              </div>
                        <div class="card-body alert alert-secondary" style="padding:20px; height:200px ">
                                        <form action="itteamlogin.php" method="post">
                                                        <input type="text" class="form-control" placeholder="Enter User Name" name="uname" id="username"><br>
                                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="pwd"><br>
                                                        <button type="submit" class="btn btn-warning btn-block btn-md">Sign in</button><br>
                                                        <span id="err" style="color:#FF0000"></span>
                                         </form>        
                       </div>
                              
                      </div>
                </div>
               <div class="col-md-3"></div>
         </div>
    </div>
  </body>
</html>