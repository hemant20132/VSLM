<?php
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$deleteusernum=$_REQUEST['deleteusernum1'];
$user1=new userclass();
$user1->checkdeleteusernumber($conn1,$deleteusernum);

echo "&".$user1->username."&";
echo $user1->useraddress."&";
echo $user1->userrole."&";
echo $user1->useremail."&";
echo $user1->userpass."&";
echo $user1->userfeesdue."&";

?>
