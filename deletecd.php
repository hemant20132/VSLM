<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
$db1= new dbclass();
$db1->connect();

if (isset($_POST['deletecdsubmit']))
{
	
$dcdnumber=intval($_POST["deletecdnumber"]);
$dcdtitle=$_POST["deletecdtitle"];
$dcdartist=$_POST["deletecdartist"];
$dcdcomposer=$_POST["deletecdcomposer"];
$dcdentrydt=$_POST["deletecdentrydt"];
$dcdavailable=$_POST["deletecdavailable"];

$cddelete1=new cdclass();
$cddelete1->delete($dcdnumber,$dcdtitle,$dcdartist,$dcdcomposer,$dcdentrydt,$dcdavailable);

if ($cddelete1->message8=="successful")
{
header("location:mainpage.php?message8=".$cddelete1->message8);
}
if ($cddelete1->message8=="Error")
{
header("location:mainpage.php?message8=".$cddelete1->message8);
}

}



?>




