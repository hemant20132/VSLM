<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$cdnumber=$_REQUEST['returncdnumber'];
$membershipid=$_REQUEST['returncdmembershipid'];
$cdtitle=$_REQUEST['returncdtitle'];
$cdartist=$_REQUEST['returncdartist'];
$cdcomposer=$_REQUEST['returncdcomposer'];
$cdrenteddt=$_REQUEST['returnrentedcddt'];
$cdreturndt=$_REQUEST['returncddt'];
$cdreturncdduedt=$_REQUEST['returncdduedt'];
$cdreturncdfee=$_REQUEST['returncdfee'];

$cd1=new cdclass();
$cd1->returncd($conn1,$cdnumber,$membershipid,$cdtitle,$cdartist,$cdcomposer,$cdrenteddt,$cdreturndt,$cdreturncdduedt,$cdreturncdfee);

if ($cd1->message11=="successfulreturn")
{
	header("location:reservecd.php?message11=".$cd1->message11);
}

if ($cd1->message11=="Error")
{
	header("location:reservecd.php?message11=".$cd1->message11);
}	

?>
