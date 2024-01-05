<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;

if (isset($_POST['addcdsubmit']))
{
$cdnumber=intval($_POST["cdnumber"]);
$cdtitle=$_POST["cdtitle"];
$cdartist=$_POST["cdartist"];
$cdcomposer=$_POST["cdcomposer"];
$cdentrydt=$_POST["cdentrydt"];
$cdavailable=$_POST["cdavailable"];

$cdadd1= new cdclass();

$cdadd1->checkduplicate($conn1,$cdtitle,$cdartist,$cdcomposer);

if ($cdadd1->message10=="cdnotexists")
{
		$cdadd1->add($cdnumber,$cdtitle,$cdartist,$cdcomposer,$cdentrydt,$cdavailable);
		if ($cdadd1->message4=="successful")
		{
		header("location:mainpage.php?message4=" .$cdadd1->message4);
		}
		if ($cdadd1->message4=="Error")
		{
		header("location:mainpage.php?message4=" . $cdadd1->message4);
		}
}

if ($cdadd1->message10=="cdexists")
{
header("location:mainpage.php?message10=".$cdadd1->message10);
}

}
?>