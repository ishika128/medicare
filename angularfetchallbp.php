<?php
include_once("connection.php");
$uid=$_GET["uid"];
$fromdate=$_GET["fromdate"];
$txttodate=$_GET["txttodate"];





$query="select * from bprecords where uid='$uid'and dateofrecord>='$fromdate'and dateofrecord<='$txttodate'";
$table=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
     $ary[]=$row;
}

echo json_encode($ary);
?>
