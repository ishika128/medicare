<?php
include_once("connection.php");
$city=$_GET["city"];
$query="select * from doctor where city='$city'";
$table=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
