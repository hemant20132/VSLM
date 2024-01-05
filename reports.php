<?php
session_start();
if ($_SESSION['username']<>"")
{	
?>
<html>
<head>
<meta charset="UTF-8"> 
<title>Video Library Management System -AudioWeb</title>
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function()
{
$("#userreport").hide();
$("#memberreport").hide();
$("#cdsreport").hide();
$("#rentedcdreport").hide();
	
$("#userlist").click(function()
{
$("#userreport").show();
$("#memberreport").hide();
$("#cdsreport").hide();
$("#rentedcdreport").hide();
});


$("#memberlist").click(function()
{
$("#userreport").hide();
$("#memberreport").show();
$("#cdsreport").hide();
$("#rentedcdreport").hide();
});

$("#cdlist").click(function()
{
$("#userreport").hide();
$("#memberreport").hide();
$("#cdsreport").show();
$("#rentedcdreport").hide();
});

$("#rentedcdlist").click(function()
{
$("#userreport").hide();
$("#memberreport").hide();
$("#cdsreport").hide();
$("#rentedcdreport").show();
});


$('#userreporttable').dataTable({
		"processing": true,
		"serverSide": true,
        "lengthMenu": [7],
		"pageLength": 7,
		"ajax": "userreport_server_processing.php"
});

$('#memberreporttable').dataTable({
		"processing": true,
		"serverSide": true,
		"lengthMenu": [9],
		"pageLength": 9,
        "ajax": "memberreport_server_processing.php"
});

$('#cdreporttable').dataTable({

		"processing": true,
		"serverSide": true,
		 "lengthMenu": [7],
		"pageLength": 7,
	 	"ajax": "cdreportobjects.php",
		"columns": 
		[
			{ "data": "CDNumber" },
			{ "data": "Title" },
			{ "data": "Artist" },
			{ "data": "Composer" },
			{ "data": "Cdentrydt" },
			{ "data": "Date_Rented"},
			{ "data": "Due_Date"},
			{ "data": "available"},
		]
	});
		
		

$('#rentedcdreporttable').dataTable({
		"processing": true,
		"serverSide": true,
	   "lengthMenu": [7],
		"pageLength": 7,
		"ajax": "rentedcdsreport_server_processing.php"
});


});
</script>

</head>

<body>
<div id="header1" >
<a id="home" href="mainpage.php"><img width="3%" height="5%" src="home.png"></a><br>
<li id="username1" >User Name :<?php echo $_SESSION['username'];?></li> 
<a id="logout" href="index.php">Logout</a><br>
<center>
<h3 id="title1">Video Library Management System - AudioWeb</h3>
</center>
<div>

<div id="maindiv" class=".container-fluid" style="height:83%;"> 
<?php if ($_SESSION['userrole']=="admin")
	{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
  <li role="presentation"><a href="user.php"> Users</a></li>
  <li role="presentation"><a href="reports.php">Reports</a></li>
</ul>
<?php 
	}
?>

<?php if ($_SESSION['userrole']=="user")
	{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
</ul>
<?php 
	}
?>


<center>
<h4>Reports Section</h4>
</center>

<img id="cdimg" src="images/cdimage1.jpg"/>
	<center>
	<div class="row" style="margin-top:10%;">
	<?php 
	if ($_SESSION['userrole']=='admin')
	{
	?>	
	<input type="button" id="userlist" class="btn btn-default" value="userList">
	<input type="button" id="memberlist" class="btn btn-default" value="Membership">
	<?php 
	}
	?>


	<?php 
	if ($_SESSION['userrole']=='admin')
	{
	?>	
	<input type="button" id="cdlist" class="btn btn-default" value="CDs">
	<input type="button" id="rentedcdlist" class="btn btn-default" value="Rented CDs">
	<?php 
	}
	?>
	</div>
	</center>
	
<div id="userreport" class="container">
<table id="userreporttable" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>User Id</th>
						<th>User Name</th>
						<th>User Address</th>
						<th>User Role</th>
						<th>User Email</th>
						<th>User Password</th>
						<th>User Fees Due</th>
					</tr>
				</thead>
</table>
</div>
 
<div id="memberreport" class="container">
<table id="memberreporttable" class="display" cellspacing="0" width="100%">
				
				<thead>
					<tr>
						<th>Member Id</th>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Start Dt</th>
						<th>Expire Dt</th>
						<th>Credit Card</th>
						<th>Fees due</th>
						
					</tr>
				</thead>
</table>
</div>


<div id="cdsreport" class="container">
<table id="cdreporttable" class="display" cellspacing="0" width="100%">
				
				<thead>
					<tr>
						<th>CD Number</th>
						<th>Title</th>
						<th>Artilst</th>
						<th>Composer</th>
						<th>Cdentrydt</th>
						<th>Date Rented</th>
						<th>Due Date</th>
						<th>Available</th>
					</tr>
				</thead>
</table>
</div>

<div id="rentedcdreport" class="container">
<table id="rentedcdreporttable" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Membership Id</th>
						<th>CD No.</th>
						<th>CD Title</th>
						<th>CD Artist</th>
						<th>CD Composer</th>
						<th>Rent Cd Dt</th>
						<th>Rent Cd Due Dt</th>
						
					</tr>
				</thead>
</table>
</div>
	
</div>
<?php }
else
{
echo "you need to login to see this page!!!";
}
 ?>
</body>
</html>