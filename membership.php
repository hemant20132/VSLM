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
<script src="bootstrap/js/jquery.inputmask.date.extensions.js"></script>



<script>
$(document).ready(function()
{
	$("#membershipcreditcardno").inputmask("9999-9999-9999-9999");
	$("#membershipphone").inputmask("999-999-9999");
	$("#membershipstartdt").inputmask("99-99-9999");
	$("#membershipexpiredt").inputmask("99-99-9999");
	$("#membershipfeesdue").inputmask("9999.99");

	$("#updatemembershipstartdt").inputmask("99-99-9999");
	$("#updatemembershipexpiredt").inputmask("99-99-9999");
	$("#updatemembershipphone").inputmask("999-999-9999");
	$("#updatemembershipfeesdue").inputmask("9999.99");
	$("#updatemembershipcreditcardno").inputmask("9999-9999-9999-9999");
	
	$("input[type=text]").keyup(function() {
    $(this).val($(this).val().toUpperCase());
	});
	
	$("#membershipname").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#membershipaddress").focus();
		}
	});

	$("#updatemembershipaddress").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updatemembershipphone").focus();
		}
	});
	
	$("#updatemembershipphone").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updatemembershipemail").focus();
		}
	});
	
	$("#updatemembershipemail").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updatemembership ").focus();
		}
	});
	
	

	
	
	$("#membershipaddress").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#membershipphone").focus();
		}
	});

	$("#membershipphone").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#membershipemail").focus();
		}
	});

$("#membershipemail").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#membershipstartdt").focus();
		}
});

$("#membershipstartdt").keypress(function(e)
	{
		keypressed=e.which;
		if (keypressed>57 && keypressed<255)
		{
			return false;	
		}
		if (keypressed>0 && keypressed<7)
		{
			return false;	
		}
		if (keypressed>8 && keypressed<45)
		{
			return false;	
		}
});

$("#membershipexpiredt").keypress(function(e)
	{
		keypressed=e.which;
		if (keypressed>57 && keypressed<255)
		{
			return false;	
		}
		if (keypressed>0 && keypressed<7)
		{
			return false;	
		}
		if (keypressed>8 && keypressed<45)
		{
			return false;	
		}
});

$("#membershipcreditcardno").keypress(function(e)
	{
		keypressed=e.which;
		if (keypressed>57 && keypressed<255)
		{
			return false;	
		}
		if (keypressed>0 && keypressed<7)
		{
			return false;	
		}
		if (keypressed>8 && keypressed<45)
		{
			return false;	
		}
});


	
	
	


	
	$("#membershipdetails").hide();
	$("#updatemembershipdetails").hide();
	$("#deletemembershipdetails").hide();
	$("#message20").hide();
	$("#message21").hide();
	$("#message22").hide();
	
	$("#addmembership").click(function()
	{
	$("#membershipdetails").show();
	$("#updatemembershipdetails").hide();	
	$("#deletemembershipdetails").hide();
	});

	$("#updatemembership").click(function()
	{
	$("#updatemembershipdetails").show();
	$("#membershipdetails").hide();
	$("#deletemembershipdetails").hide();
	});

	$("#deletemembership").click(function()
	{
	$("#deletemembershipdetails").show();
	$("#updatemembershipdetails").hide();
	$("#membershipdetails").hide();
	});

	$("#membershipcancel").click(function()
	{
	$("#membershipdetails").hide();
	return false;
	});


	$("#addmembershipsubmit").click(function()
	{

	if ($("#membershipname").val()=="")
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Name !!!");
	$("#message20").css("color","red");
	return false;
	}
	
	if ($("#membershipaddress").val()=="")
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Address !!!");
	$("#message20").css("color","red");
	return false;
	}

	if ($("#membershipphone").val()=="")
	{
	$("#messsage20").show();	
	$("#message20").val("please enter Membership Phone !!!");
	$("#message20").css("color","red");
	return false;
	}

	
	if ($("#membershipemail").val()=="")
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Email  !!!");
	$("#message20").css("color","red");
	return false;
	}
	
	if ($("#membershipstartdt").val()=="")			
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Start Date");
	$("#message20").css("color","red");
	return false;
	}
	
	if ($("#membershipexpiredt").val()=="")			
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Expire Date");
	$("#message20").css("color","red");
	return false;
	}
	
	if ($("#membershipcreditcardno").val()=="")			
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Credit Card Number");
	$("#message20").css("color","red");
	return false;
	}
	
	if ($("#membershipfeesdue").val()=="")			
	{
	$("#message20").show();	
	$("#message20").val("please enter Membership Fees Due");
	$("#message20").css("color","red");
	return false;
	}
	});
	
	
	$("#updatemembershipname").change(function()
	{
			updatemembershipname = $("#updatemembershipname").val();
			$.ajax({
                type:"GET",
                url:"checkupdatemembershipname.php",
                data:{updatemembershipname1:updatemembershipname},
				success:function(msg)
				{
				$("#message21").hide();
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				
				if (str.substr(0,n)=="")
				{
				$("#message21").show();
				$("#message21").val("Member record not found !!!");
				$("#message21").css("color","red");
				}	
				else
				{	
				$("#updatemembershipnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipaddress").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipphone").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipemail").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipstartdt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipexpiredt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipcreditcardno").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updatemembershipfeesdue").val(str.substr(0,n));
				}
				
				
				
		    });  
	});
	


	$("#deletemembershipname").change(function()
	{
			deletemembershipname = $("#deletemembershipname").val();
			$.ajax({
                type:"GET",
                url:"checkdeletemembershipname.php",
                data:{deletemembershipname1:deletemembershipname},
				success:function(msg)
				{
				$("#message22").hide();
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				if (str.substr(0,n)=="")
				{
				$("#message22").show();
				$("#message22").val("Member record not found !!!");
				$("#message22").css("color","red");
				}	
				else
				{	
				$("#deletemembershipnumber").val(str.substr(0,n));
				}
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipaddress").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipphone").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipemail").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipstartdt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipexpiredt").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipcreditcardno").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deletemembershipfeesdue").val(str.substr(0,n));
				}
				
            });  
		
	});

	$("#updatemembershipsubmit").click(function()
	{
		if ($("#updatemembershipnumber").val()=="")
		return false;
	});




	$("#updatemembershipcancel").click(function()
	{
		$("#updatemembershipdetails").hide();
		return false;
	});
	
	$("#deletemembershipcancel").click(function()
	{
		$("#deletemembershipdetails").hide();
		return false;
	});
	
});
</script>

</head>

<body>
<?php
include ("dbconfig.php");
include ("db.php");
include ("membershipclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$membership1 = new membershipclass();
$membership1->displaymembershipmaxno($conn1);

if ( !empty( $_REQUEST['message21'] ) )
{
		if ( $_REQUEST['message21']=="successful" )
		{	
			echo "<input type='text' value='membership information updated successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message21']=="Error" )
		{	
			echo "<input type='text' value='Error  updating membership record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
}


if ( !empty( $_REQUEST['message20'] ) )
{
		if ( $_REQUEST['message20']=="successful" )
		{	
			echo "<input type='text' value='membership record added successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message20']=="Error" )
		{	
			echo "<input type='text' value='Error creating membership record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
}

if ( !empty( $_REQUEST['message22'] ) )
{
		if ( $_REQUEST['message22']=="successful" )
		{	
			echo "<input type='text' value='Membership deleted successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message22']=="Error" )
		{	
			echo "<input type='text' value='Error deleting membership record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
}


if ( !empty( $_REQUEST['message13'] ) )
{
		if ( $_REQUEST['message13']=="successful" )
		{	
			echo "<input type='text' value='membership record updated successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message13']=="Error" )
		{	
			echo "<input type='text' value='Error in updating membership record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
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
<div>

<div id="maindiv" class=".container-fluid" style="height:90%;"> 

<ul class="nav nav-pills">
	<?php if ($_SESSION['userrole']=="admin")
	{
	?>
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
  <li role="presentation"><a href="user.php">Users</a></li>
  <li role="presentation"><a href="reports.php">Reports</a></li>
	<?php 
	}
	?>
	
	<?php if ($_SESSION['userrole']=="member")
	{
	?>
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
 	<?php 
	}
	?>
	
		
   <?php if ($_SESSION['userrole']=="user")
	{
	?>
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
	<?php 
	}
	?>
	
  <?php if ($_SESSION['userrole']=="employee")
	{
	?>
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
  <?php 
	}
	?>
	
</ul>


<center>
<h4>Video Cd Membership Management</h4>
</center>
	<img id="cdimg" src="images/cdimage1.jpg"/>
	<center>
	<?php if ($_SESSION['userrole']=="admin")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="addmembership" class="btn btn-default" value="Addmembership">
	<input type="button" id="updatemembership" class="btn btn-default" value="Update Membership">
	<input type="button" id="deletemembership" class="btn btn-default" value="Delete Membership">
	</div>
	<?php 
	}
	?>
	
	<?php if ($_SESSION['userrole']=="member")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="addmembership" class="btn btn-default" value="Addmembership">
	<input type="button" id="updatemembership" class="btn btn-default" value="Update Membership">
	<input type="button" id="deletemembership" class="btn btn-default" value="Delete Membership">
	</div>
	<?php 
	}
	?>
	
	<?php if ($_SESSION['userrole']=="employee")
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="addmembership" class="btn btn-default" value="Addmembership">
	</div>
	<?php 
	}
	?>
	
	
	
	</center>
	

<div id="membershipdetails" class="container">
<form id="membershipdetailsform" class="form-horizontal" method="post" action="addmembership.php">
<center>
<h3>Enter New membership Details</h3>
</center>  
  <div class="col-sm-10">
    <label for="membershipnumber">Membership Number</label>
	<input type="text" id="membershipnumber" name="membershipnumber" class="form-control" readonly value=<?php echo $membership1->autonumber;?> placeholder=<?php echo $membership1->autonumber; ?> >
  </div>
  <div class="col-sm-10">
    <label for="membershipname">Membership Name</label>
	<input type="text" id="membershipname" name="membershipname" class="form-control" placeholder="Membership Name">
  </div>

  <div class="col-sm-10">
    <label for="membershipaddress">Membership Address</label>
	<input type="text" id="membershipaddress" name="membershipaddress" class="form-control" placeholder="Membership Address">
  </div>
 
 <div class="col-sm-10">
    <label for="membership ">Membership Phone  </label>
	<input type="text" id="membershipphone" name="membershipphone" class="form-control" placeholder="Membership Phone">
  </div>

  <div class="col-sm-10">
    <label for="membershipemail">Membership Email</label>
	<input type="email" id="membershipemail" name="membershipemail" class="form-control" placeholder="Membership Email">
  </div>

  <div class="col-sm-10">
    <label for="membershipstartdt">Membership Start Date</label>
	<input type="date" id="membershipstartdt" name="membershipstartdt" class="form-control" data-format="mm-dd-yyyy" value=<?php echo date('m-d-Y'); ?> placeholder="Membership Start Date">
  </div>

  <div class="col-sm-10">
    <label for="membershipexpiredt">Membership Expire Date</label>
	<input type="text" id="membershipexpiredt" name="membershipexpiredt" class="form-control" data-format="mm-dd-yyyy" value=<?php echo date('m-d-Y'); ?> placeholder="Membership Expire Date">
  </div>

  <div class="col-sm-10">
    <label for="membershipcreditcardno">Membership Credit Card No</label>
	<input type="text" id="membershipcreditcardno" name="membershipcreditcardno" class="form-control" placeholder="Membership Credit Card No">
  </div>

  <div class="col-sm-10">
    <label for="membershipfeesdue">Membership Fees Due</label>
	<input type="text" id="membershipfeesdue" name="membershipfeesdue" class="form-control" placeholder="Membership Fees Due">
  </div>

  
<br>
  <div class="col-sm-10">
  <button type="cancel" id="membershipcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="addmembershipsubmit" name="addmembershipsubmit" class="btn btn-default">Submit</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message20"  class="form-control" >
  </div>
 
 
 </form>

 </div>
 
 
<div id="updatemembershipdetails" class="container">

<form id="membershipupdateform" class="form-horizontal" method="post" action="updatemembership.php">
<center>
<h3>Update membership Details</h3>
</center>

	<div class="col-sm-10">
    <label for="updatemembershipname">Membership Name</label>
	<select type="text" id="updatemembershipname" name="updatemembershipname" class="form-control" placeholder="Membership Name">
	<?php
	$membership1->optionvalue($conn1);
	echo $membership1->option;
	?>
	</select>
	</div>

	<div class="col-sm-10">
    <label for="updatemembershipnumber">Membership Number</label>
	<input type="text" id="updatemembershipnumber" name="updatemembershipnumber" readonly class="form-control" placeholder="Membership Number" >
	</div>

  <div class="col-sm-10">
    <label for="updatemembershipaddress">Membership Address</label>
	<input type="text" id="updatemembershipaddress" name="updatemembershipaddress" class="form-control" placeholder="Membership Address">
  </div>
 
  <div class="col-sm-10">
    <label for="updatemembership ">Membership Phone  </label>
	<input type="text" id="updatemembershipphone" name="updatemembershipphone" class="form-control" placeholder="Membership Phone">
  </div>

  <div class="col-sm-10">
    <label for="updatemembershipemail">Membership Email</label>
	<input type="email" id="updatemembershipemail" name="updatemembershipemail" class="form-control" placeholder="Membership Email">
  </div>

  <div class="col-sm-10">
    <label for="updatemembershipstartdt">Membership Start Date</label>
	<input type="text" id="updatemembershipstartdt" name="updatemembershipstartdt" class="form-control"  placeholder="Membership Start Date">
  </div>

  <div class="col-sm-10">
    <label for="updatemembershipexpiredt">Membership Expire Date</label>
	<input type="text" id="updatemembershipexpiredt" name="updatemembershipexpiredt" class="form-control" placeholder="Membership Expire Date">
  </div>

  <div class="col-sm-10">
    <label for="updatemembershipcreditcardno">Membership Credit Card No</label>
	<input type="text" id="updatemembershipcreditcardno" name="updatemembershipcreditcardno" class="form-control" placeholder="Membership Credit Card No">
  </div>

  <div class="col-sm-10">
    <label for="updatemembershipfeesdue">Membership Fees Due</label>
	<input type="text" id="updatemembershipfeesdue" name="updatemembershipfeesdue" class="form-control" placeholder="Membership Fees Due">
  </div>

  <br>
  <div class="col-sm-10">
  <button type="cancel" id="updatemembershipcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="updatemembershipsubmit" name="updatemembershipsubmit" class="btn btn-default">Submit</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message21"  class="form-control" >
  </div>
 
 </form>
 </div>
 
 
<div id="deletemembershipdetails" class="container">

<form id="membershipdeleteform" class="form-horizontal" method="post" action="deletemembership.php">
<center>
<h3>delete membership Details</h3>
</center>  

	<div class="col-sm-10">
   <label for="deletemembershipname">Membership Name</label>
	<select type="text" id="deletemembershipname" name="deletemembershipname" class="form-control" placeholder="Membership Name">
	<?php
	$membership1->optionvalue($conn1);
	echo $membership1->option;
	?>
	</select>
	</div>
	
  <div class="col-sm-10">
    <label for="deletemembershipnumber">Membership Number</label>
	<input type="text" id="deletemembershipnumber" name="deletemembershipnumber" readonly class="form-control" placeholder="Membership Number" >
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipaddress">Membership Address</label>
	<input type="text" id="deletemembershipaddress" name="deletemembershipaddress" readonly class="form-control" placeholder="Membership Address">
  </div>
 
 <div class="col-sm-10">
    <label for="deletemembership ">Membership Phone  </label>
	<input type="text" id="deletemembershipphone" name="deletemembershipphone" readonly class="form-control" placeholder="Membership Phone">
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipemail">Membership Email</label>
	<input type="email" id="deletemembershipemail" name="deletemembershipemail" readonly class="form-control" placeholder="Membership Email">
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipstartdt">Membership Start Date</label>
	<input type="text" id="deletemembershipstartdt" name="deletemembershipstartdt" readonly class="form-control"  placeholder="Membership Start Date">
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipexpiredt">Membership Expire Date</label>
	<input type="text" id="deletemembershipexpiredt" name="deletemembershipexpiredt" readonly class="form-control" placeholder="Membership Expire Date">
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipcreditcardno">Membership Credit Card No</label>
	<input type="text" id="deletemembershipcreditcardno" name="deletemembershipcreditcardno" readonly class="form-control" placeholder="Membership Credit Card No">
  </div>

  <div class="col-sm-10">
    <label for="deletemembershipfeesdue">Membership Fees Due</label>
	<input type="text" id="deletemembershipfeesdue" name="deletemembershipfeesdue" readonly class="form-control" placeholder="Membership Fees Due">
  </div>
 
 <br>
 
 <div class="col-sm-10">
  <button type="cancel" id="deletemembershipcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="deletemembershipsubmit" name="deletemembershipsubmit" class="btn btn-default">delete</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message22"  class="form-control" >
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