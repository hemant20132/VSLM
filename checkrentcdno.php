<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$rentcdnumber=$_REQUEST['rentcdnum1'];
$cd1=new cdclass();
$cd1->checkrentcdnumber($conn1,$rentcdnumber);

echo ",".$cd1->cdtitle.",";
echo $cd1->cdartist.",";
echo $cd1->cdcomposer.",";
echo $cd1->cdavailable.",";
?>
