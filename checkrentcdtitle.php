<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$rentcdtitle=$_REQUEST['rentcdtitle1'];
$cd1=new cdclass();
$cd1->checkrentcdtitle($conn1,$rentcdtitle);

echo "&".$cd1->cdnumber."&";
echo $cd1->cdartist."&";
echo $cd1->cdcomposer."&";
echo $cd1->cdavailable."&";
?>
