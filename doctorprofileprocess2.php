<?php
include_once("connection.php");

$uid=$_POST["uid"];
$name=$_POST["name"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$website=$_POST["website"];
$qual=$_POST["qual"];
$st=$_POST["st"];
$we=$_POST["we"];
$add=$_POST["add"];
$city=$_POST["city"];

$ppic=$_FILES["ppic"]["name"];
$tmpname=$_FILES["ppic"]["tmp_name"];
move_uploaded_file($tmpname,"uploads/".$ppic);


$cpic=$_FILES["cpic"]["name"];
$tmppname=$_FILES["cpic"]["tmp_name"];
move_uploaded_file($tmppname,"uploads/".$cpic);

$info=$_POST["info"];

$query="insert into doctor values('$uid','$ppic','$name','$contact','$email','$website',$qual','$st','$we','$add','$city','$cpic','$info')";

mysqli_query($dbcon,$query);

$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "submitted!!" ;
}
else
{
    $msg ;
}





?>
