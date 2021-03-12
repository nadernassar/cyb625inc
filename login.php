<?php
//login.php
header('Content-Type: text/plain');
//include("database_connection.php");
session_start(); 
if(isset($_COOKIE["isadmin"]))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  
  $file = 'users.dat';
$searchfor = $_POST["user_email"];

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);
// escape special characters in the query
$pattern = preg_quote($searchfor, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^$pattern.*$/m";

  if((preg_match_all($pattern, $contents, $matches)) && ($_POST["user_password"]=="CYB625!z$3cure"))
  {
    echo ("you are". implode($matches[0]));
    $_SESSION["user_email"] = $matches[0];
     setcookie("isadmin", 0, time()+3600);
     //header("location:index.php");
  }else  {
   $message = "<div class='alert alert-danger'>Wrong Email / password </div>";
  }
 }//outwe Else
}


?>

<!DOCTYPE html>
<html>
 <head>
  <title>CYB625 Inc.</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <script type="text/javascript">
alert("This site uses cookies, but we don't collect personal information!!");
</script>
  <br />
  <div class="container">
   <h2 align="center">Welcome to CYB625 Inc.</h2>
   <br />
   <h3><p>Your mission is to escalate your privilege to be an admin.</p>
   <p>First, you need to log in using your Pace email and password as CYB625!z$3cure then escalate your privilege to be an admin </br></br> </p>
   <p>Once you are an admin, capture the flag and paste it in your exam question </br></br> Good Luck!</p>
   </h3>
   <div class="panel panel-default">

    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <span><?php echo $message; ?></span>
     <form method="post">
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="user_email" id="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_password" id="user_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <br />
   <p>Admin email - john_smith@gmail.com</p>
   
  </div>
 </body>
</html>