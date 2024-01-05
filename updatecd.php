<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['updatecdsubmit']))
{
	
$ucdnumber=intval($_POST["updatecdnumber"]);
$ucdtitle=$_POST["updatecdtitle"];
$ucdartist=$_POST["updatecdartist"];
$ucdcomposer=$_POST["updatecdcomposer"];
$ucdentrydt=$_POST["updatecdentrydt"];
$ucdavailable=$_POST["updatecdavailable"];

$cdupdate1=new cdclass();
$cdupdate1->update($conn1,$ucdnumber,$ucdtitle,$ucdartist,$ucdcomposer,$ucdentrydt,$ucdavailable);

if ($cdupdate1->message7=="successful")
{
header("location:mainpage.php?message7=".$cdupdate1->message7);
}

if ($cdupdate1->message7=="Error")
{
header("location:mainpage.php?message7=".$cdupdate1->message7);
}


}
?>




