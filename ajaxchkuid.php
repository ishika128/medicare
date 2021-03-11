<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from signup where userid='$uid' ";
$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==0)
{
    echo " u can take it ";
}
else
{
    echo "its already available";
}

?>
