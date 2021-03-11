<?php
include_once("connection.php");
$uid=$_GET["uid"];
$dateofrecord=$_GET["dateofrecord"];
$timerecord=$_GET["timerecord"];
$sugartime=$_GET["meal"];
$sugarresult=$_GET["resultb"];
$medintake=$_GET["medintake"];
$urineresult=$_GET["resultu"];
$query="insert into sugarrecord values('$uid','$dateofrecord','$timerecord','$sugartime','$sugarresult','$medintake','$urineresult')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "saved succesfully" ;
}
else
{
    echo $msg ;
}

?>
