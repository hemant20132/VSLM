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

<script>
$(document).ready(function()
{
	$("#cddetails").hide();
	$("#message4").hide();
	$("#message5").hide();	
	$("#message7").hide();	
	
	$("#updatecddetails").hide();
	$("#addcd").click(function()
	{
	$("#cddetails").show();
	});
	$("#updatecd").click(function()
	{
	$("#updatecddetails").show();	
	});
	$("#cdcancel").click(function()
	{
	$("#cddetails").hide();
	return false;
	});


	$("#addcdsubmit").click(function()
	{
	if ($("#cdnumber").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter the Cd Number !!!");
	$("#message4").attr("color","red");
	return false;
	}
	
	if ($("#cdtitle").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Title !!!");
	$("#message4").attr("color","red");
	return false;
	}
	
	if ($("#cdartist").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Artilst !!!");
	$("#message4").attr("color","red");
	return false;
	}

	if ($("#cdcomposer").val()=="")
	{
	$("#messsage4").show();	
	$("#message4").val("please enter Cd Composer !!!");
	$("#message4").attr("color","red");
	return false;
	}

	if ($("#cdentrydt").val()=="")
	{
	$("#message4").show();	
	$("#message4").val("please enter Cd Entry Date !!!");
	$("#message4").attr("color","red");
	return false;
	}
	
	if ($("input name['cdavailable']:checked").val()=="")			
	{
	$("#message4").show();	
	$("#message4").val("please check radio button !!!");
	$("#message4").attr("color","red");
	return false;
	}
	});
	
	$("#updatecdnumber").change(function()
	{
			updatecdnum = parseInt($("#updatecdnumber").val());
			$.ajax({
                type:"GET",
                url:"checkupdateno.php",
                data:{updatecdnum1:updatecdnum},
				success:function(msg)
				{
				var str=msg;	
				n=str.search(",");
				$("#updatecdtitle").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#updatecdartist").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#updatecdcomposer").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				$("#updatecdentrydt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search(",");
				
				if (str.substr(0,n)=="Yes")
				{
				$("input:radio[name=updatecdavailable]").val("Yes");
				}
				
				if (str.substr(0,n)=="No")
				{
				$("input:radio[name=updatecdavailable]").val("No");
				}
				
				}
				
            });  
		
			if ( $("#updatecdnumber").val()=="" )
			{	
			$("#message5").show();	
			$("#message5").val("Enter cd number to update !!!");
			$("#message5").attr("color","red");
			$("#updatecdnumber").focus();
			return false;
			}
	});
	
	
	$("#updatecdsubmit").click(function()
	{
		
	if ($("#updatecdtitle").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Title cannot be blank!!!");
	$("#message7").attr("color","red");
	return false;
	}
	
	if ($("#updatecdartist").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Artilst cannot be blank !!!");
	$("#message7").attr("color","red");
	return false;
	}

	if ($("#updatecdcomposer").val()=="")
	{
	$("#messsage7").show();	
	$("#message7").val("Cd Composer cannot be blank !!!");
	$("#message7").attr("color","red");
	return false;
	}

	if ($("#updatecdentrydt").val()=="")
	{
	$("#message7").show();	
	$("#message7").val("Cd Entry Date cannot be blank !!!");
	$("#message7").attr("color","red");
	return false;
	}
	
	if ($("input name['updatecdavailable']:checked").val()=="")			
	{
	$("#message7").show();	
	$("#message7").val("radio button needs to be checked !!!");
	$("#message7").attr("color","red");
	return false;
	}
	
	});
	
		
	$("#updatecdcancel").click(function()
	{
		$("#updatecddetails").hide();
		return false;
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
$cd1 = new cdclass();
$cd1->displaycdmaxno();

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

?>

<a id="home" href="mainpage.php"><img width="3%" height="5%" src="home.png"></a><br>
<li id="username1" >User Name :<?php echo $_SESSION['username'];?></li> 
<a id="logout" href="index.php">Logout</a><br>
<center>
<h3>Video Library Management System - AudioWeb</h3>
</center>

<div id="maindiv" class=".container-fluid" style="height:85%;"> 

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
</ul>



<center>
<h4>Video CD Reserve Section</h4>
</center>
<img id="cdimg" src="images/cdimage1.jpg"/>
	<center>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="reservecd" class="btn btn-default" value="Reserve Cd">
	<input type="button" id="returncd" class="btn btn-default" value="Return Cd">
	</div>
	</center>

<div id="cddetails" class="container">

<form id="cddetailsform" class="form-horizontal" method="post" action="addcd.php">
<center>
<h3>Enter New CD Details</h3>
</center>  
  <div class="col-sm-10">
    <label for="cdnumber">Cd Number</label>
	<input type="text" id="cdnumber" name="cdnumber" class="form-control" readonly value=<?php echo $cd1->autonumber; ?> placeholder=<?php echo $cd1->autonumber;?> >
  </div>
  <div class="col-sm-10">
    <label for="cdtitle">Cd Title</label>
	<input type="text" id="cdtitle" name="cdtitle" class="form-control" placeholder="Cd Title">
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
	<input type="date" id="cdentrydt" name="cdentrydt" class="form-control" value=<?php echo date('y/d/m'); ?>>
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
    <label for="updatecdnumber">Cd Number</label>
	<input type="text" id="updatecdnumber" name="updatecdnumber" class="form-control"  value=""  placeholder="Type Cd Number U want to Update!!!" >
  </div>
 
  <div class="col-sm-10">
    <label for="updatecdtitle">Cd Title</label>
	<input type="text" id="updatecdtitle" name="updatecdtitle" class="form-control"  placeholder="Cd Title">
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

	


	
</div>

</body>
</html>