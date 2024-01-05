<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("membershipclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['updatemembershipsubmit']))
{
$updatemembershipnumber=$_POST['updatemembershipnumber'];
$updatemembershipname=$_POST['updatemembershipname'];
$updatemembershipaddress=$_POST['updatemembershipaddress'];
$updatemembershipphone=$_POST['updatemembershipphone'];
$updatemembershipemail=$_POST['updatemembershipemail'];

$updatemembershipstartdt=date('Y-m-d',strtotime($_POST['updatemembershipstartdt']));
$updatemembershipexpiredt=date('Y-m-d',strtotime($_POST['updatemembershipexpiredt']));

$updatemembershipcreditcardno =$_POST['updatemembershipcreditcardno'];
$updatemembershipfeesdue=$_POST['updatemembershipfeesdue'];

$membershipupdate1=new membershipclass();
$membershipupdate1->update($conn1,$updatemembershipnumber,$updatemembershipname, $updatemembershipaddress, $updatemembershipphone, $updatemembershipemail, $updatemembershipstartdt, $updatemembershipexpiredt, $updatemembershipcreditcardno, $updatemembershipfeesdue);


if ($membershipupdate1->message13=="successful")
{
header("location:membership.php?message13=".$membershipupdate1->message13);
}

if ($membershipupdate1->message13=="Error")
{
header("location:membership.php?message13=".$membershipupdate1->message13);
}

}



?>




