<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="delete from doctor where uid='$uid'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
echo $count."records deleted";



?>

		