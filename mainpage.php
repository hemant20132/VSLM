<?php
session_start();
if ($_SESSION['username']<>"")
{	
?>
<html>
<head>
<title>Video Library Management System -AudioWeb</title>
<link rel="stylesheet" href="css/default.css">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/jquery.inputmask.js"></script>
<link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function()
{
	
	$("input[type=text]").keyup(function() {
    $(this).val($(this).val().toUpperCase());
	});
	
	$("#cdtitle").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#cdartist").focus();
		}
	});


	$("#cdartist").keypress(function(e)
	{
		keypressed=e.which;
		if (keypressed==13)
		{
		$("#cdartist").focus();
		}
	});

	$("#cdcomposer").keypress(function(e)
	{
		keypressed=e.which;
		if (keypressed==13)
		{
		$("#cdartist").focus();
		}
	});
	
	$("#updatecdtitle").keypress(function(e)
	{
	keypressed=e.which;
	if (keypressed==13)
		{
		$("#updatecdartist").focus();
		}
	});


	$("#updatecdartist").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updatecdartist").focus();
		}
	});

	$("#updatecdcomposer").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updatecdartist").focus();
		}
	});
	
	$("#cdentrydt").inputmask("99-99-9999");
	$("#updatecdentrydt").inputmask("99-99-9999");
	
	$("#cddetails").hide();
	$("#updatecddetails").hide();
	$("#deletecddetails").hide();
	$("#querycddetails").hide();
	$("#message4").hide();
	$("#message5").hide();	
	$("#message7").hide();	
	$("#message8").hide();
	$("#message9").hide();

	$("#addcd").click(function()
	{
	$("#cdsreport").hide();	
	$("#cddetails").show();
	$("#updatecddetails").hide();	
	$("#deletecddetails").hide();
	$("#querycddetails").hide();

	});
	
	$("#updatecd").click(function()
	{
	$("#cdsreport").hide();	
	$("#updatecddetails").show();
	$("#cddetails").hide();
	$("#deletecddetails").hide();
	$("#querycddetails").hide();
	});
	
	$("#cdcancel").click(function()
	{
	$("#cddetails").hide();
	return false;
	});
	
	$("#deletecd").click(function()
	{
	$("#cdsreport").hide();	
	$("#updatecddetails").hide();
	$("#cddetails").hide();
	$("#deletecddetails").show();
	$("#querycddetails").hide();
	});
	
	$("#querycd").click(function()
	{
	$("#cdsreport").hide();	
	$("#updatecddetails").hide();
	$("#cddetails").hide();
	$("#deletecddetails").hide();
	$("#querycddetails").show();
	
	});
	
	$("#querycdsubmit").click(function()
	{
	if ($("#querycdbox").val()=="")		
	{
     $("#message9").val("please enter cdnumber,cdtitle,cdartist");
	}
	
	});
	

	$("#addcdsubmit").click(function()
	{
	if ($("#cdnumber").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter the Cd Number !!!");
	$("#message4").css("color","red");
	return false;
	}
	
	if ($("#cdtitle").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Title !!!");
	$("#message4").css("color","red");
	return false;
	}
	
	if ($("#cdartist").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Artilst !!!");
	$("#message4").css("color","red");
	return false;
	}

	if ($("#cdcomposer").val()=="")
	{
	$("#messsage4").show();	
	$("#message4").val("please enter Cd Composer !!!");
	$("#message4").css("color","red");
	return false;
	}

	if ($("#cdentrydt").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Entry Date !!!");
	$("#message4").css("color","red");
	return false;
	}
	
	if ($("input name['cdavailable']:checked").val()=="")			
	{
	$("#message4").show();	
	$("#message4").val("please check radio button !!!");
	$("#message4").css("color","red");
	return false;
	}
	});
	
	$("#updatecdtitle").change(function()
	{
			updatecdtitle = $("#updatecdtitle").val();
			$.ajax({
                type:"GET",
                url:"checkupdatecdtitle.php",
                data:{updatecdtitle1:updatecdtitle},
				success:function(msg)
				{
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				$("#message7").hide();
				if (str.substr(0,n)=="")
				{	
				$("#message7").show();
				$("#message7").css("color", "red");
				$("#message7").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#updatecdnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatecdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatecdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatecdentrydt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("input:radio[name=updatecdavailable][value="+str.substr(0,n)+"]").css("checked",true);
				}
				
            });  
		
	});
	
	
	$("#deletecdtitle").change(function()
	{
			deletecdtitle = $("#deletecdtitle").val();
			$.ajax({
                type:"GET",
                url:"checkdeletecdtitle.php",
                data:{deletecdtitle1:deletecdtitle},
				success:function(msg)
				{
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				$("#message7").hide();
				if (str.substr(0,n)=="")
				{	
				$("#message7").show();
				$("#message7").css("color", "red");
				$("#message7").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#deletecdnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletecdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletecdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletecdentrydt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("input:radio[name=deletecdavailable][value="+str.substr(0,n)+"]").css("checked",true);
				}
				
            });  
		
	});
	
	
	
	$("#searchcdtitle").click(function()
	{
			querycdtitle = $("#cdtitlequery").val();
			$.ajax({
                type:"GET",
                url:"querycdtitle.php",
                data:{querycdtitle1:querycdtitle},
				success:function(msg)
				{
				var str=msg;	
				n=str.search(",");
				str=str.slice(n+1);
				n=str.search(",");
				$("#message9").hide();
				if (str.substr(0,n)=="")
				{	
				$("#message9").show();
				$("#message9").css("color", "red");
				$("#message9").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#querycdtitle").val(str.substr(0,n));
				}
				n=str.search(",");
				$("#querycdnumber").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
			    $("#querycdtitle").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
			    $("#querycdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#querycdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#querycdentrydt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("input:radio[name=querycdavailable][value="+str.substr(0,n)+"]").css("checked",true);
				}
				
            });  
	});
	
	
	$("#searchcdartist").click(function()
	{
			querycdartist = $("#cdartistquery").val();
			$.ajax({
                type:"GET",
                url:"querycdartist.php",
                data:{querycdartist1:querycdartist},
				success:function(msg)
				{
				var str=msg;	
				n=str.search(",");
				str=str.slice(n+1);
				n=str.search(",");
				$("#message9").hide();
				if (str.substr(0,n)=="")
				{	
				$("#message9").show();
				$("#message9").css("color", "red");
				$("#message9").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#querycdtitle").val(str.substr(0,n));
				}
				n=str.search(",");
				$("#querycdnumber").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
			    $("#querycdtitle").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
			    $("#querycdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#querycdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#querycdentrydt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("input:radio[name=querycdavailable][value="+str.substr(0,n)+"]").css("checked",true);
				}
				
            });  
	});
	
	$("#updatecdsubmit").click(function()
	{
		
	if ($("#updatecdtitle").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Title cannot be blank!!!");
	$("#message7").css("color","red");
	return false;
	}
	
	if ($("#updatecdartist").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Artilst cannot be blank !!!");
	$("#message7").css("color","red");
	return false;
	}

	if ($("#updatecdcomposer").val()=="")
	{
	$("#messsage7").show();	
	$("#message7").val("Cd Composer cannot be blank !!!");
	$("#message7").css("color","red");
	return false;
	}

	if ($("#updatecdentrydt").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Entry Date cannot be blank !!!");
	$("#message7").css("color","red");
	return false;
	}
	
	if ($("input name['updatecdavailable']:checked").val()=="")			
	{
	$("#message7").show();	
	$("#message7").val("radio button needs to be checked !!!");
	$("#message7").css("color","red");
	return false;
	}
	
	});
	
		
	$("#updatecdcancel").click(function()
	{
		$("#updatecddetails").hide();
		return false;
	});
	
		
	$("#deletecdsubmit").click(function()
	{
		$("#deletecddetails").show();
	});
	
	$("#deletecdcancel").click(function()
	{
		$("#deletecddetails").hide();
		return false;
	});
	
	
	
	
 $("#cdreporttable").dataTable( {
		"processing": true,
		"serverSide": true,
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
	
});
</script>

</head>

<body>
<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$cd1 = new cdclass();
$cd1->displaycdmaxno($conn1);

if ( !empty( $_REQUEST['message4'] ) )
{
		if ( $_REQUEST['message4']=="successful" )
		{	
			echo "<input type='text' value='CD added successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}
		if ( $_REQUEST['message4']=="Error" )
		{	
			echo "<input type='text' value='Error creating CD record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		if ( $_REQUEST['message10']=="cdexists" )
		{	
			echo "<input type='text' value='CD with these details exists!!!' style='z-index:10;width:20%;position:absolute;color:red;margin-top:80%;margin-left:40%;'>";
			echo "<script>";
			echo "$('#cdreporttable').hide()";
			echo "$('#cddetails').show()";
			echo "</script>";
		}
		if ( $_REQUEST['message10']=="cdnotexists" )
		{	
	
		}
}

if ( !empty( $_REQUEST['message7'] ) )
{
		if ( $_REQUEST['message7']=="successful" )
		{	
			echo "<input type='text' value='CD record updated successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message7']=="Error" )
		{	
			echo "<input type='text' value='Error in updating record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
}

if ( !empty( $_REQUEST['message8'] ) )
{
		if ( $_REQUEST['message8']=="successful" )
		{	
			echo "<input type='text' value='CD record deleted successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message8']=="Error" )
		{	
			echo "<input type='text' value='Error in deleting record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
}

if ( !empty( $_REQUEST['message6'] ) )
{
		if ( $_REQUEST['message6']=="notfound!!!" )
		{	
			echo "<input type='text' value='CD not found!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
}

?>

<div id="header1" >
<a id="home" href="mainpage.php"><img width="3%" height="5%" src="home.png"></a><br>
<li id="username1" >User Name :<?php echo $_SESSION['username'];?></li> 
<a id="logout" href="index.php">Logout</a><br>

<center>
<h3 id="title1">Video Library Management System - AudioWeb</h3>
</center>
<div>

<div id="maindiv" class=".container-fluid" style="height:80%;"> 


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

<?php if ($_SESSION['userrole']=="member")
{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
</ul>
<?php
}
?>

<?php if ($_SESSION['userrole']=="employee")
{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
</ul>
<?php
}
?>







<center>
<h4>Video Cd Management Section</h4>
</center>
<?php if ($_SESSION['userrole']=="admin")
{
?>
<div id="cdsreport" class="container" style="height:70%;">
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
<?php
}
?>

	<center>
	<? if ($_SESSION['userrole']=='admin')
	{
	?>	
	<div class="row" style="width:50%;margin-top:38%;" >
	<input type="button" id="addcd" class="btn btn-default" value="Add Cd">
	<input type="button" id="updatecd" class="btn btn-default" value="Update Cd">
	<input type="button" id="deletecd" class="btn btn-default" value="Delete Cd">
	<input type="button" id="querycd" class="btn btn-default" value="query Cd">
	</div>
	<?php 
	}
	?>

	<? if ($_SESSION['userrole']=='employee')
	{
	?>	
	<div class="row" style="width:50%;margin-top:38%;" >
	<input type="button" id="querycd" class="btn btn-default" value="query Cd">
	</div>
	<?php 
	}
	?>

	<? if ($_SESSION['userrole']=='user')
	{
	?>	
	<div class="row" style="width:50%;margin-top:38%;" >
	<input type="button" id="querycd" class="btn btn-default" value="query Cd">
	</div>
	<?php 
	}
	?>


	</center>
	

<div id="cddetails" class="container">

<form id="cddetailsform" class="form-horizontal" method="post" action="addcd.php">
<center>
<h3>Enter New CD Details</h3>
</center>  

  <div class="col-sm-10">
    <label for="cdnumber">Cd Number</label>
	<input type="text" id="cdnumber"  name="cdnumber" class="form-control" readonly value=<?php echo $cd1->autonumber; ?> placeholder=<?php echo $cd1->autonumber;?> >
  </div>

  <div class="col-sm-10">
    <label for="cdtitle">Cd Title</label>
	<input type="text" id="cdtitle" name="cdtitle" class="form-control" placeholder="Cd Title" >
  </div>

  <div class="col-sm-10">
    <label for="cdartist">Cd Artist</label>
	<input type="text" id="cdartist" name="cdartist" class="form-control" placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="cdcomposer">Cd Composer</label>
	<input type="text" id="cdcomposer" name="cdcomposer" class="form-control" placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="cdentrydt">Cd Entry Date</label>
	<input type="date" id="cdentrydt" name="cdentrydt" class="form-control" value=<?php echo date('m-d-Y'); ?>>
  </div>

  
 <div class="col-sm-10">
    <label for="cdavailable">Weather available</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input  name="cdavailable" type="radio" aria-label="Yes" value="Yes">Yes
        <input  name="cdavailable" type="radio" aria-label="No" value="No">No
      </span>
	</div>
</div>

<br>
  <div class="col-sm-10">
  <button type="cancel" id="cdcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="addcdsubmit" name="addcdsubmit" class="btn btn-default">Submit</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message5"  class="form-control" >
  </div>
 
 
 </form>

 </div>

  
 
<div id="updatecddetails" class="container">

<form id="cdupdateform" class="form-horizontal" method="post" action="updatecd.php">
<center>
<h3>Update CD Details</h3>
</center>  

  <div class="col-sm-10">
    <label for="updatecdtitle">Cd Title</label>
	<select type="text" id="updatecdtitle" name="updatecdtitle" class="form-control"  placeholder="Cd Title">
	<?php
	$cd1->cdoptionvalue($conn1);
	echo $cd1->cdoption;
	?>
	</select>
  </div>

  <div class="col-sm-10">
    <label for="updatecdnumber">Cd Number</label>
	<input type="text" id="updatecdnumber" name="updatecdnumber" class="form-control" readonly  value=""  placeholder="Cd Number" >
  </div>
 

  <div class="col-sm-10">
    <label for="updatecdartist">Cd Artist</label>
	<input type="text" id="updatecdartist" name="updatecdartist" class="form-control"  placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="updatecdcomposer">Cd Composer</label>
	<input type="text" id="updatecdcomposer" name="updatecdcomposer" class="form-control"  placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="updatecdentrydt">Cd Entry Date</label>
	<input type="date" id="updatecdentrydt" name="updatecdentrydt" class="form-control" placeholder="CD Entry Date">
  </div>

 <div class="col-sm-10">
    <label for="cdavailable">Weather available</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input  name="updatecdavailable" type="radio" aria-label="Yes" value="Yes">Yes
        <input  name="updatecdavailable" type="radio" aria-label="No" value="No">No
      </span>
	</div>
</div>

 <br>
 
 <div class="col-sm-10">
  <button type="cancel" id="updatecdcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="updatecdsubmit" name="updatecdsubmit" class="btn btn-default">Update</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message7"  class="form-control" >
  </div>
 
 </form>
 </div>


<div id="deletecddetails" class="container">

<form id="cddeleteform" class="form-horizontal" method="post" action="deletecd.php">
<center>
<h3>Delete CD Details</h3>
</center>  

  <div class="col-sm-10">
    <label for="deletecdtitle">Cd Title</label>
	<select  id="deletecdtitle" name="deletecdtitle"  class="form-control"  placeholder="Cd Title">
	<?php
	$cd1->cdoptionvalue($conn1);
	echo $cd1->cdoption;
	?>
	</select>
  </div>


  <div class="col-sm-10">
    <label for="deletecdnumber">Cd Number</label>
	<input type="text" id="deletecdnumber" name="deletecdnumber"  readonly class="form-control"  value=""  placeholder="Cd Number" >
  </div>
 

  <div class="col-sm-10">
    <label for="deletecdartist">Cd Artist</label>
	<input type="text" id="deletecdartist" name="deletecdartist" readonly class="form-control"  placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="deletecdcomposer">Cd Composer</label>
	<input type="text" id="deletecdcomposer" name="deletecdcomposer" readonly class="form-control"  placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="deletecdentrydt">Cd Entry Date</label>
	<input type="date" id="deletecdentrydt" name="deletecdentrydt" readonly class="form-control" placeholder="CD Entry Date">
  </div>

 <div class="col-sm-10">
    <label for="cdavailable">Weather available</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input  name="deletecdavailable" type="radio" aria-label="Yes" value="Yes">Yes
        <input  name="deletecdavailable" type="radio" aria-label="No" value="No">No
      </span>
	</div>
</div>

 <br>
 
 <div class="col-sm-10">
  <button type="cancel" id="deletecdcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="deletecdsubmit" name="deletecdsubmit" class="btn btn-default">delete</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message8"  class="form-control" >
  </div>
 
 </form>
 </div>
	

<div id="querycddetails" class="container">

<form id="cdqueryform" class="form-horizontal" method="post" action="querycd.php">
<center>
<h3>query CD Details</h3>
</center>  

 <div class="row">
  
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" id="cdtitlequery" placeholder="Search for cdtitle">
    <span class="input-group-btn">
        <button class="btn btn-default" id="searchcdtitle" type="button">Go!</button>
    </span>
	</div>
	
	<div class="input-group">
      <input type="text" class="form-control" id="cdartistquery" placeholder="Search for cdartist">
    <span class="input-group-btn">
        <button class="btn btn-default" id="searchcdartist" type="button">Go!</button>
    </span>
	</div>
	
  </div><!-- /.col-lg-6 -->
  

  <div class="col-sm-10">
    <label for="querycdnumber">Cd Number</label>
	<input type="text" id="querycdnumber" name="querycdnumber" readonly class="form-control"  value=""  placeholder="Cd Number" >
  </div>
 
  <div class="col-sm-10">
    <label for="querycdtitle">Cd Title</label>
	<input type="text" id="querycdtitle" name="querycdtitle" readonly class="form-control"  placeholder="Cd Title">
  </div>

  <div class="col-sm-10">
    <label for="querycdartist">Cd Artist</label>
	<input type="text" id="querycdartist" name="querycdartist" readonly class="form-control"  placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="querycdcomposer">Cd Composer</label>
	<input type="text" id="querycdcomposer" name="querycdcomposer" readonly class="form-control"  placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="querycdentrydt">Cd Entry Date</label>
	<input type="date" id="querycdentrydt" name="querycdentrydt" readonly class="form-control" placeholder="CD Entry Date">
  </div>

 <div class="col-sm-10">
    <label for="cdavailable">Weather available</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input  name="querycdavailable" type="radio" aria-label="Yes" value="Yes">Yes
        <input  name="querycdavailable" type="radio" aria-label="No" value="No">No
      </span>
	</div>
</div>

 <br>
 
 
  <div class="col-sm-10">
   <input type="text" id="message9"  class="form-control" >
  </div>
 
 </form>
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