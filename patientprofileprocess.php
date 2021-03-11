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
$query="insert into patients values('$uid','$name','$age','$gender','$email','$city','$address','$mobile','$problems')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "record saved!!";
    
}
else
{
    echo $msg ;
}
?>
