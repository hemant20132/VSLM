<?php
include ("dbconfig.php");
include ("db.php");
include ("membershipclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['deletemembershipsubmit']))
{
$deletemembershipnumber=$_POST['deletemembershipnumber'];
$deletemembershipname=$_POST['deletemembershipname'];
$deletemembershipaddress=$_POST['deletemembershipaddress'];
$deletemembershipphone=$_POST['deletemembershipphone'];
$deletemembershipemail=$_POST['deletemembershipemail'];
$deletemembershipstartdt=date('Y-m-d',strtotime($_POST['deletemembershipstartdt']));
$deletemembershipexpiredt=date('Y-m-d',strtotime($_POST['deletemembershipexpiredt']));
$deletemembershipcreditcardno =$_POST['deletemembershipcreditcardno'];
$deletemembershipfeesdue=$_POST['deletemembershipfeesdue'];

$membershipdelete1=new membershipclass();
$membershipdelete1->delete($conn1,$deletemembershipnumber,$deletemembershipname, $deletemembershipaddress, $deletemembershipphone, $deletemembershipemail, $deletemembershipstartdt, $deletemembershipexpiredt, $deletemembershipcreditcardno, $deletemembershipfeesdue);

if ($membershipdelete1->message22=="successful")
{
header("location:membership.php?message22=".$membershipdelete1->message22);
}

if ($membershipdelete1->message22=="Error")
{
header("location:membership.php?message22=".$membershipdelete1->message22);
}

}



?>




