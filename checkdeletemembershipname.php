<?php
include ("dbconfig.php");
include ("db.php");
include ("membershipclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$deletemembershipname=$_REQUEST['deletemembershipname1'];
$membership1=new membershipclass();
$membership1->checkdeletemembershipname($conn1,$deletemembershipname);

echo "&".$membership1->membershipnumber."&";
echo $membership1->membershipaddress."&";
echo $membership1->membershipphone."&";
echo $membership1->membershipemail."&";
echo $membership1->membershipstartdt."&";
echo $membership1->membershipexpiredt."&";
echo $membership1->membershipcreditcardno."&";
echo $membership1->membershipfeesdue."&";

?>
