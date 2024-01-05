<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['addusersubmit']))
{
$username=$_POST['usernumber'];
$username=$_POST['username'];
$useraddress=$_POST['useraddress'];
$userrole=$_POST['userrole'];
$useremail=$_POST['useremail'];
$userpassword=$_POST['userpassword'];
$userfeesdue=$_POST['userfeesdue'];

$useradd1= new userclass();
$useradd1->add($conn1,$username,$useraddress,$userrole,$useremail,$userpassword,$userfeesdue);

if ($useradd1->message12=="successful")
{
header("location:user.php?message12=".$useradd1->message12);
}

if ($useradd1->message12=="Error")
{
header("location:user.php?message12=".$useradd1->message12);
}

}
?>