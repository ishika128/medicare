<?php
session_start();
include_once("connection.php");
$uid=$_GET["useridl"];
$password=$_GET["passwordl"];
//$query="select * from signup where userid='$uid'";
$query = "select * from signup where userid='$uid'and password='$password'";

$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==0)
{
    echo "unauthorized ";
}
else
{
    $row=mysqli_fetch_array($table);
    $_SESSION["activeuser"]=$uid;
//    echo "authorized";
    $category=$row["category"];
    echo $category ;
}

?>
