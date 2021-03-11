<?php
include_once("connection.php");
$uid=$_GET["uid"];
$password=$_GET["password"];
$mobile=$_GET["mobile"];
$type=$_GET["category"];
//$date=date("Y/m/d");
$query="insert into signup values('$uid','$password','$mobile',CURRENT_DATE(),'$type')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
    echo "signup successfully";
else
    echo $msg;

?>
