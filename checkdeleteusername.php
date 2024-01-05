<?php
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

$deleteusername=$_REQUEST['deleteusername1'];
$user1=new userclass();
$user1->checkdeleteusername($conn1,$deleteusername);

echo "&".$user1->usernumber."&";
echo $user1->useraddress."&";
echo $user1->userrole."&";
echo $user1->useremail."&";
echo $user1->userpass."&";
echo $user1->userfeesdue."&";

?>
