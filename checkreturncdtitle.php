<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$returncdtitle=$_REQUEST['returncdtitle1'];
$cd1=new cdclass();
$cd1->checkreturncdtitle($conn1,$returncdtitle);

	  echo "&".$cd1->cdnumber."&";
	  echo $cd1->cdmembershipid."&";
	  echo $cd1->cdartist."&";
	  echo $cd1->cdcomposer."&";
	  echo $cd1->cdrentdt."&";
	  echo $cd1->cdreturneddt."&";
	  echo $cd1->cdduedt."&";
	  echo $cd1->cdfee."&";

?>
