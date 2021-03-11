<?php
include_once("connection.php");
$uid=$_GET["uid"];
$dateofrecord=$_GET["dateofrecord"];
$pulse=$_GET["pulse"];
$dia=$_GET["dia"];
$syst=$_GET["syst"];
$query="insert into bprecords values('$uid','$dateofrecord','$pulse','$dia','$syst')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "data saved";
}
else
{
    echo $msg;
}



?>
