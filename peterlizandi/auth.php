
<?php
session_start();
if(isset($_SESSION['hname'])){
header("Location: hservices.php");
exit(); }
else{
header("Location: login.php");
}
?>
