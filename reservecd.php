<?php
session_start();
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

<script>
$(document).ready(function()
{
	$("#rentcddt").inputmask("99-99-9999");
	$("#rentcdduedt").inputmask("99-99-9999");
	$("#cdreturndt").inputmask("99-99-9999");
	$("#returncdduedt").inputmask("99-99-9999");
	$("#returncddt").inputmask("99-99-9999");
	$("#returncdfee").inputmask("9999.99");	
	
	$("#rentcddetails").hide();
	$("#returncddetails").hide();
	$("#message8").hide();	
	$("#message9").hide();	

	
	$("#reservecd").click(function()
	{
	$("#rentcddetails").show();
	$("#returncddetails").hide();	
	});
	
	$("#returncd").click(function()
	{
	$("#rentcddetails").hide();
	$("#returncddetails").show();	
	});
	
	
	$("#rentcdcancel").click(function()
	{
	$("#rentcddetails").hide();
	return false;
	});

	$("#rentcdsubmit").click(function()
	{
	if ($("#rentcdnumber").val()=="")
	{
		$("#message8").show();
		$("#message8").val("rent cd number cannot be blank!!!");
		return false;
	}
	
	if ($("#rentcdmember").val()=="")
	{
		$("#message8").show();
		$("#message8").val("member id cannot be blank!!!");
		return false;
	}
	});


	$("#returncdsubmit").click(function()
	{
	if ($("#returncdnumber").val()=="")
	{
		$("#message9").show();
		$("#message9").val("return cd number cannot be blank!!!");
		return false;
	}
	});
	
	$("#returncddt").change(function()
	{
	if 	( $("#returncddt").val() < $("#returnrentcddt").val() )
	{
		$("#message9").show();
		$("#message9").val("cd return date cannot be less than cd rented date!!!");
		return false;
	}
	});
	
	
	$("#rentcdduedt").change(function()
	{
	if 	( $("#rentcdduedt").val() < $("#rentcddt").val() )
	{
		$("#message8").show();
		$("#message8").val("cd rent due date cannot be less than cd rented date!!!");
		return false;
	}
	});
	
	$("#rentcdtitle").change(function()
	{
			$("#message8").hide();
			rentcdtitle = $("#rentcdtitle").val();
			
			$.ajax({
                type:"GET",
                url:"checkrentcdtitle.php",
                data:{rentcdtitle1:rentcdtitle},
				success:function(msg)
				{
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				if (str.substr(0,n)=="")
				{	
				$("#message8").show();
				$("#message8").css("color", "red");
				$("#message8").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#rentcdnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#rentcdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#rentcdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				available=str.substr(0,n);
			
			if (str.substr(0,n)=="Yes")
				{
				$("input:radio[name=rentcdavailable]").val("Yes");
				}
				
				if (str.substr(0,n)=="No")
				{
				$("input:radio[name=rentcdavailable]").val("No");
				}
				}
		    });  
	});
	
		
	$("#returncdcancel").click(function()
	{
		$("#returncddetails").hide();
		return false;
	});
	
	$("#returncdtitle").change(function()
	{
			$("#message9").hide();
			returncdtitle = $("#returncdtitle").val();
			$.ajax({
                type:"GET",
                url:"checkreturncdtitle.php",
                data:{returncdtitle1:returncdtitle},
				success:function(msg)
				{
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				if (str.substr(0,n)=="")
				{	
				$("#message9").show();
				$("#message9").css("color", "red");
				$("#message9").val("cd not found!!!");
				return false;				
				}
				else
				{	
				$("#returncdnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncdmembershipid").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returnrentedcddt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncddt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncdduedt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#returncdfee").val(str.substr(0,n));
				}
				});  
	});
});
</script>

</head>

<body>
<?php
include ("dbconfig.php");
include ("db.php");
include ("cdclass.php");
include ("membershipclass.php");

$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$cd1 = new cdclass();
$membership1 = new membershipclass();

if ( !empty( $_REQUEST['message9'] ) )
{
		if ( $_REQUEST['message9']=="successful" )
		{	
			echo "<input type='text' value='CD rented successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message9']=="successfulreturn" )
		{	
			echo "<input type='text' value='CD return record updated  successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}
		
		if ( $_REQUEST['message9']=="Error" )
		{	
			echo "<input type='text' value='Error in cd renting !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
		if ( $_REQUEST['message9']=="notfound!!!" )
		{	
			echo "<input type='text' value='CD Not Found !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
}

if ( !empty( $_REQUEST['message10'] ) )
{
		if ( $_REQUEST['message10']=="successful" )
		{	
			echo "<input type='text' value='CD record returned successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message10']=="Error" )
		{	
			echo "<input type='text' value='Error in returned cd record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
}

if ( !empty( $_REQUEST['message11'] ) )
{
		if ( $_REQUEST['message11']=="successfulreturn" )
		{	
			echo "<input type='text' value='CD returned successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message11']=="Error" )
		{	
			echo "<input type='text' value='Error in returned cd record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
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


<div id="maindiv" class=".container-fluid" style="height:85%;"> 
<?php if ($_SESSION['userrole']=="admin")
{
?>

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
  <li role="presentation"><a href="user.php">Create Users</a></li>
  <li role="presentation"><a href="reports.php">Reports</a></li>
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
<h4>Video CD Reserve Section</h4>
</center>
<img id="cdimg" src="images/cdimage1.jpg"/>
	<center>
	<?php if ($_SESSION['userrole']=="admin")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="reservecd" class="btn btn-default" value="Reserve Cd">
	<input type="button" id="returncd" class="btn btn-default" value="Return Cd">
	</div>
	<?php
	}
	?>
	
	<?php if ($_SESSION['userrole']=="member")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="reservecd" class="btn btn-default" value="Reserve Cd">
	<input type="button" id="returncd" class="btn btn-default" value="Return Cd">
	</div>
	
	<?php
	}
	?>
	
	<?php if ($_SESSION['userrole']=="employee")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="returncd" class="btn btn-default" value="Return Cd">
	</div>
	
	<?php
	}
	?>

	
</center>

<div id="rentcddetails" class="container">

<form id="rentcddetailsform" class="form-horizontal" method="post" action="rentcd.php">
<center>
<h3>Rent CD Details</h3>
</center>  
  
  <div class="col-sm-10">
    <label for="rentcdtitle">Cd Title</label>
	<select  id="rentcdtitle" name="rentcdtitle" readonly class="form-control" placeholder="Cd Title">
	<?php $cd1->cdoptionvalue($conn1);
	echo $cd1->cdoption;
	?>
	</select>
  </div>

  <div class="col-sm-10">
    <label for="rentcdnumber">Cd Number</label>
	<input type="text" id="rentcdnumber" name="rentcdnumber" readonly class="form-control"  placeholder="Cd number to rent !!!" >
  </div>
  
  <div class="col-sm-10">
    <label for="rentcdartist">Cd Artist</label>
	<input type="text" id="rentcdartist" name="rentcdartist" readonly class="form-control" placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="rentcdcomposer">Cd Composer</label>
	<input type="text" id="rentcdcomposer" name="rentcdcomposer" readonly class="form-control" placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="rentcdmember">Member Id for CD to be Rented</label>
	
	<select type="text" id="rentcdmember" name="rentcdmember" class="form-control"  placeholder="Member to whom CD to be rented">
  	<?php
	$membership1->optionvalue($conn1);
	echo $membership1->option;
	?>
	</select>
  
  </div>
  
  
  <div class="col-sm-10">
    <label for="rentcddt">Cd Rented Date</label>
	<input type="date" id="rentcddt" name="rentcddt" class="form-control" value=<?php echo date('m-d-Y'); ?>>
  </div>

  <div class="col-sm-10">
    <label for="rentcddt">Cd Due Date</label>
	<input type="date" id="rentcdduedt" name="rentcdduedt" class="form-control" value=<?php echo date('m-d-Y'); ?>>
  </div>
    
<br>
  <div class="col-sm-10">
  <button type="cancel" id="rentcdcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="rentcdsubmit" name="rentcdsubmit" class="btn btn-default">Submit</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message8"  class="form-control" >
  </div>
 
 
 </form>

 </div>

 
<div id="returncddetails" class="container">
<form id="cdreturnform" class="form-horizontal" method="post" action="returncd.php">
<center>
<h3>return CD Details</h3>
</center>  

  <div class="col-sm-10">
    <label for="returncdtitle">Cd Title</label>
	<select id="returncdtitle"  name="returncdtitle" class="form-control"  placeholder="Cd Title">
	<?php $cd1->optionvalue($conn1);
	echo $cd1->option;
	?>
	</select>
  </div>

   <div class="col-sm-10">
    <label for="returncdnumber">Cd Number</label>
	<input type="text" id="returncdnumber" name="returncdnumber" readonly class="form-control"  value=""  placeholder="CD Number U want to return!!!" >
  </div>
  
  <div class="col-sm-10">
    <label for="returncdmembershipid">Cd Memberhip Id</label>
	<input type="text" id="returncdmembershipid" readonly name="returncdmembershipid" class="form-control"  placeholder="Membership Id">
  </div>
 
  <div class="col-sm-10">
    <label for="returncdartist">Cd Artist</label>
	<input type="text" id="returncdartist" readonly name="returncdartist" class="form-control"  placeholder="Cd Artist">
  </div>
 
  <div class="col-sm-10">
    <label for="returncdcomposer">Cd Composer</label>
	<input type="text" id="returncdcomposer" readonly name="returncdcomposer" class="form-control"  placeholder="Cd Composer">
  </div>

  <div class="col-sm-10">
    <label for="returnrentedcddt">Cd Rented Date</label>
	<input type="date" id="returnrentedcddt" readonly name="returnrentedcddt" class="form-control" placeholder="CD Rented Date">
  </div>

  <div class="col-sm-10">
    <label for="returncddt">Cd Returned Date</label>
	<input type="date" id="returncddt" name="returncddt" class="form-control" placeholder="CD Returned Date">
  </div>

  <div class="col-sm-10">
    <label for="returncdduedt">Cd Due Date</label>
	<input type="date" id="returncdduedt" name="returncdduedt" readonly class="form-control" placeholder="CD Due Date">
  </div>
  
  <div class="col-sm-10">
    <label for="returncdfee">Cd Fee</label>
	<input type="date" id="returncdfee" name="returncdfee" class="form-control" placeholder="CD Fee">
  </div>
  
  <br>
 <div class="col-sm-10">
  <button type="cancel" id="returncdcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="returncdsubmit" name="returncdsubmit" class="btn btn-default">return</button>
 </div>
  
  <div class="col-sm-10">
   <input type="text" id="message9"  class="form-control" >
  </div>
 
 </form>
 </div>

	
</div>

</body>
</html>