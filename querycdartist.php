<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();

$querycdartist=$_REQUEST['querycdartist1'];

$cd1=new cdclass();
$cd1->querycdartist($querycdartist);

echo ",".$cd1->cdnumber.","; 	  
echo $cd1->cdtitle.",";
echo $cd1->cdartist.",";
echo $cd1->cdcomposer.",";
echo $cd1->cdentrydt.",";
echo $cd1->cdavailable.",";

?>
