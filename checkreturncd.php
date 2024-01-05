<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();

$rentcdnumber=$_REQUEST['returncdnum1'];
$cd1=new cdclass();
$cd1->checkrentcdnumber($returncdnumber);


echo ",".$cd1->cdtitle.",";
echo $cd1->membershipid.",";
echo $cd1->cdartist.",";
echo $cd1->cdcomposer.",";
echo $cd1->cdrentdt.",";
echo $cd1->cdreturneddt.",";
echo $cd1->cdduedt.",";
echo $cd1->cdfee.",";


?>
