<?php
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");
$db1= new dbclass();
$db1->connect();

if (isset($_POST['deleteusersubmit']))
{
$deleteusernumber=$_POST['deleteusernumber'];
$deleteusername=$_POST['deleteusername'];
$deleteuseraddress=$_POST['deleteuseraddress'];
$deleteuserrole=$_POST['deleteuserrole'];
$deleteuseremail=$_POST['deleteuseremail'];
$deleteuserpassword=$_POST['deleteuserpassword'];
$deleteuserfeesdue=$_POST['deleteuserfeesdue'];

	
$userdelete1=new userclass();
$userdelete1->delete($deleteusernumber,$deleteusername,$deleteuseraddress,$deleteuserrole,$deleteuseremail,$deleteuserpassword,$deleteuserfeesdue);

if ($userdelete1->message12=="successful")
{		
header("location:user.php?message7=".$userdelete1->message12);
}
if ($userdelete1->message12=="Error")
{
header("location:user.php?message7=".$userdelete1->message12);
}

}
?>




