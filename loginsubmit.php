<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("loginclass.php");
$db1= new dbclass();
$db1->connect();

if (isset($_POST['loginformsubmit']))
{
$userid=$_POST["username"];
$password=$_POST["userpassword"];
$userrole=$_POST["userrole"];
$login1= new loginclass();
$conn1=$db1->conn;
$login1->checklogin($conn1,$userid,$password,$userrole);

if ($login1->message1=="nosuccess")
{
header("location:index.php?message1=".$login1->message1);
}
	
if ($login1->message1=="success")
{
header("location:mainpage.php");
}	
	
	
}

?>