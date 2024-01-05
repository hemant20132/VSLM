<?php
include ("dbconfig.php");
include ("db.php");
include ("membershipclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['addmembershipsubmit']))
{
$membershipname=$_POST['membershipname'];
$membershipaddress=$_POST['membershipaddress'];
$membershipphone=$_POST['membershipphone'];
$membershipemail=$_POST['membershipemail'];
$membershipstartdt=date('Y-m-d',strtotime($_POST['membershipstartdt']));
$membershipexpiredt=date('Y-m-d',strtotime($_POST['membershipexpiredt']));
$membershipcreditcardno =$_POST['membershipcreditcardno'];
$membershipfeesdue=$_POST['membershipfeesdue'];
$membershipadd1=new membershipclass();
$membershipadd1->add($conn1,$membershipname, $membershipaddress, $membershipphone, $membershipemail, $membershipstartdt, $membershipexpiredt, $membershipcreditcardno, $membershipfeesdue);

if ($membershipadd1->message20=="successful")
{
header("location:membership.php?message20=".$membershipadd1->message20);
}

if ($membershipadd1->message20=="Error")
{
header("location:membership.php?message20=".$membershipadd1->message20);
}

}
?>