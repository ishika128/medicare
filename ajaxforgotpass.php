<?php
include_once("connection.php");
include_once("SMS_OK_sms.php");
$uidp=$_GET["uidp"];
$query="select * from signup where userid='$uidp'";
$table=mysqli_query($dbcon,$query);
$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==0)
{
    echo "no user exist with this uid";
}
else
{
    $resp=SendSMS($row["mobile"],"password :-".$row["password"]);
    echo "sent to ur registered number ".$resp ;
}
?>