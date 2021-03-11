<?php
//logout.php
setcookie("isadmin", "0", time()-3600);

header("location:login.php");

?>