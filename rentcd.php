<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$cdnumber=$_REQUEST['rentcdnumber'];
$cdtitle=$_REQUEST['rentcdtitle'];
$cdartist=$_REQUEST['rentcdartist'];
$cdcomposer=$_REQUEST['rentcdcomposer'];
$rentmembercd=$_REQUEST['rentcdmember'];
$cdrenteddt=$_REQUEST['rentcddt'];
$cdduedt=$_REQUEST['rentcdduedt'];
$cd1=new cdclass();

$cd1->rentcd($conn1,$cdnumber,$cdtitle,$cdartist,$cdcomposer,$rentmembercd,$cdrenteddt,$cdduedt);

if ($cd1->message9=="successful")
{
	header("location:reservecd.php?message9=".$cd1->message9);
}

if ($cd1->message9=="Error")
{
	header("location:reservecd.php?message9=".$cd1->message9);
}	

?>
