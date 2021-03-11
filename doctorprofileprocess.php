<?php
include_once("connection.php");

$btn=$_POST["btn"];
if($btn=="submit")
{
    submit($dbcon);
}
else
{
 if($btn=="update")
 {
     update($dbcon);
 }
}
function submit($dbcon)
{
$uid=$_POST["uid"];
$name=$_POST["name"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$website=$_POST["website"];
$sp=$_POST["sp"];
$qual=$_POST["qual"];
$st=$_POST["st"];
$we=$_POST["we"];
$address=$_POST["add"];
$city=$_POST["city"];
$ppic=$_FILES["ppic"]["name"];
$tmpname=$_FILES["ppic"]["tmp_name"];
move_uploaded_file($tmpname,"uploads/".$ppic);
$cpic=$_FILES["cpic"]["name"];
$tmppname=$_FILES["cpic"]["tmp_name"];
move_uploaded_file($tmppname,"uploads/".$cpic);
$info=$_POST["info"];
$query="insert into doctor values('$uid','$ppic','$name','$contact','$email','$website','$sp','$qual','$st','$we','$address','$city','$cpic','$info');";
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


}
function update($dbcon)
{
$uid=$_POST["uid"];
$name=$_POST["name"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$website=$_POST["website"];
$sp=$_POST["sp"];
$qual=$_POST["qual"];
$st=$_POST["st"];
$we=$_POST["we"];
$address=$_POST["add"];
$city=$_POST["city"];
$ppic=$_FILES["ppic"]["name"];
$tmpname=$_FILES["ppic"]["tmp_name"];
move_uploaded_file($tmpname,"uploads/".$ppic);
$cpic=$_FILES["cpic"]["name"];
$tmppname=$_FILES["cpic"]["tmp_name"];
move_uploaded_file($tmppname,"uploads/".$cpic);
$info=$_POST["info"];
$jasus=$_POST["jasus"];
$jasuss=$_POST["jasuss"];
    
if($ppic=="")
{
    $filename=$jasus;   
}
else
{
    $filename=$ppic;
    move_uploaded_file($tmpname,"uploads/".$ppic);
}
if($cpic=="")
{
    $filenamee=$jasuss;
    
}
else
{
    $filenamee=$cpic;
     move_uploaded_file($tmppname,"uploads/".$cpic);
}

$query="update doctor set  ppic='$filename',name='$name',contact='$contact',email='$email',website='$website',sp='$sp',qual='$qual',st='$st',we='$we',address='$address',city='$city',cpic='$filenamee',info='$info' where uid='$uid'";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo "updated!!" ;
}
else
{
    echo $msg ;
}
}


?>
