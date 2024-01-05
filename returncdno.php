<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();

$cdnumber=$_REQUEST['returncdnumber'];
$cdtitle=$_REQUEST['returncdtitle'];
$cdartist=REQUEST['returncdartist'];
$cdcomposer=$_REQUEST['returncdcomposer'];
$cdrenteddt=$_REQUEST['returnrentedcddt'];
$cdreturndt=$_REQUEST['returncddt'];
$cdreturncdduedt=$_REQUEST['returncdduedt'];
$cdreturncdfee=$_REQUEST['returncdfee'];
$cd1=new cdclass();

$cd1->returncd ($cdnumber,$membershipid,$cdtitle,$cdartist,$cdcomposer,$cdrenteddt,$cdreturndt,$cdreturncdduedt,$cdreturncdfee);
if ($cd1->message9=="successful")
{
	header("location:reservecd.php?message9=".$cd1->message9);
}
if ($cd1->message9=="Error")
{
	header("location:reservecd.php?message9=".$cd1->message9);
}	
?>
