<?php
include_once("connection.php");
$patientuid=$_POST["patientuid"];
$doctorname=$_POST["doctorname"];
$dovisit=$_POST["dovisit"];
$nextdov=$_POST["nextdov"];
$hospital=$_POST["hospital"];
$city=$_POST["city"];
$discussion=$_POST["discussion"];
$problem=$_POST["problem"];
$slippic=$_FILES["slippic"]["name"];
$tempname=$_FILES["slippic"]["tmp_name"];
move_uploaded_file($tempname,"uploads/".$slippic);
$query="insert into slips values(NULL,'$patientuid','$doctorname','$dovisit','$nextdov','$hospital','$city','$discussion','$problem','$slippic')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "submitted";
}
else
{
    echo $msg ;
}


?>
