<?php
//index.php

if(!isset($_COOKIE["isadmin"]))
{
 header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>CYB625 Inc</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Welcome to CYB625 Inc</h2>
   
   <br />
   
   <?php
   if(isset($_COOKIE["isadmin"]))
   {
       if($_COOKIE["isadmin"]==1){
        echo '<h2 align="center">Welcome Admin, You made it</h2>';
        echo '<h2 align="center">Your Flag is:'. string base64_encode(. $_POST["user_email"] ).'</h2>';
        

       }else{
    echo '<h2 align="center">Welcome User, you are not an admin yet</h2>';
    
    
   }
   }
   ?>
  </div>
  <div align="center">
    <a href="logout.php">Logout</a>
   </div>
   <br />
 </body>
</html>
