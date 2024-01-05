<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("registerclass.php");
$db1= new dbclass();
$db1->connect();

if (isset($_POST['registersubmit']))
{
$membername=$_POST["membername"];
$memberaddress=$_POST["memberaddress"];
$memberphone=$_POST["memberphone"];
$memberemail=$_POST["memberemail"];
$memberstartdt=$_POST["memberstartdt"];
$membersenddt=$_POST["membersenddt"];
$membercreditcardno=$_POST['membercreditcardno'];
$conn1=$db1->conn;
$register1= new registerclass();
$register1->insertrecord($membername,$memberaddress,$memberphone,$memberemail,$memberstartdt,$membersenddt,$membercreditcardno,$conn1);
if ($register1->message3=="successful")
{
header("location:index.php?message3=".$register1->message3);
}
	
if ($register1->message3=="Error")
{
header("location:index.php?message3=".$register1->message3);
}

	
}

?>