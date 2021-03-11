<?php
include_once("connection.php");
$uid=$_GET["uid"];
$name=$_GET["name"];
$age=$_GET["age"];
$gender=$_GET["gender"];
$email=$_GET["email"];
$city=$_GET["city"];
$address=$_GET["address"];
$mobile=$_GET["mobile"];
$problems=$_GET["problems"];
$query="update patients set name='$name',age='$age',gender='$gender',email='$email',city='$city',address='$address',contact='$mobile',problems='$problems' where uid='$uid'";

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "updated!!";
    
}
else
{
    echo $msg ;
}
?>
