<?php
ob_start();
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['updateusersubmit']))
{
$updateusernumber=intval($_POST['updateusernumber']);
$updateusername=$_POST['updateusername'];
$updateuseraddress=$_POST['updateuseraddress'];
$updateuserrole=$_POST['updateuserrole'];
$updateuseremail=$_POST['updateuseremail'];
$updateuserpassword=$_POST['updateuserpassword'];
$updateuserfeesdue=intval($_POST['updateuserfeesdue']);

$userupdate1=new userclass();
$userupdate1->update($conn1,$updateusernumber,$updateusername,$updateuseraddress,$updateuserrole,$updateuseremail,$updateuserpassword,$updateuserfeesdue);

if ($userupdate1->message11=="successful")
{
header("location:user.php?message11=".$userupdate1->message11);
}
if ($userupdate1->message7=="Error")
{
header("location:user.php?message11=".$userupdate1->message11);
}

}



?>




