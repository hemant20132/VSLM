<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>


<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Video Library Management System -AudioWeb</title>
<link rel="stylesheet" href="css/default.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery.inputmask.js"></script>


<script>
$(document).ready(function(){
	$("#logindiv").hide();
	$("#registerdiv").hide();
	$("#message").hide();
	$("#message2").hide();
	
	
	$("#memberphone").inputmask("999-999-9999");
	$("#memberstartdt").inputmask("99-99-9999");
	$("#memberenddt").inputmask("99-99-9999");
	$("#membercreditcardno").inputmask("9999-9999-9999-9999");
	
	$("#button1").click(function()
	{
	$("#logindiv").show();
	});
	
	$("#button2").click(function()
	{
	$("#registerdiv").show();
	});
	
	$("#loginformsubmit").click(function()
	{
	if ($("#username").val()=="")
	{
	$("#message").show();	
	$("#message").val("please enter the user name !!!");
	$("#message").css("color","red");
	return false;
	}
	
	if ($("#userpassword").val()=="")
	{
	$("#message").show();	
	$("#message").val("please enter the password !!!");
	$("#message").css("color","red");
	return false;
	}
	
	$("#logindiv").show();
	
	});


	$("#loginformcancel").click(function()
	{
	$("#logindiv").hide();
	return false;
	});
	
	
	$("#registersubmit").click(function()
	{
		
	if ($("#membername").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter the member name !!!");
	$("#message2").css("color","red");
	return false;
	}
	
	if ($("#memberaddress").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member address !!!");
	$("#message2").css("color","red");
	return false;
	}
	
	if ($("#memberphone").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member phone !!!");
	$("#message2").css("color","red");
	return false;
	}

	if ($("#memberemail").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member email !!!");
	$("#message2").css("color","red");
	return false;
	}

	if ($("#memberemail").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member email !!!");
	$("#message2").css("color","red");
	return false;
	}

	if ($("#memberstartdt").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member start date !!!");
	$("#message2").css("color","red");
	return false;
	}
	
	if ($("#membersenddt").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter membership end date !!!");
	$("#message2").css("color","red");
	return false;
	}
	

	if ($("#membercreditcardno").val()=="")
	{
	$("#message2").show();	
	$("#message2").val("please enter member credit card no !!!");
	$("#message2").css("color","red");
	return false;
	}

	});
	
	$("#registercancel").click(function()
	{
	$("#registerdiv").hide();
	return false;
	});
	

	
});
</script>
</head>
<body>

<?php

if ( !empty( $_REQUEST['message1'] ) )
{
echo "<input type='text' value='wrong username or password !!!' style='width:20%;position:absolute;color:red;margin-top:30%;margin-left:40%;'>";
}

if ( !empty( $_REQUEST['message3'] ) )
{
		if ( $_REQUEST['message3']=="successful" )
		{	
			echo "<input type='text' value='Membership Created successfully!!!' style='width:20%;position:absolute;color:green;margin-top:30%;margin-left:40%;'>";
		}
		

		if ( $_REQUEST['message3']=="Error" )
		{	
			echo "<input type='text' value='Error creating Membership!!!' style='width:20%;position:absolute;color:red;margin-top:30%;margin-left:40%;'>";
		}
		
}

?>

<center>
<h3>Video Library Management System - AudioWeb</h3>
</center>

<div id="maindiv" class=".container-fluid"> 

<div id="imgdiv" class="row">
<img src="images/cdimage1.jpg" class="img-responsive" id="cdimg">
</div>

<div class="row" >
<input type="button" id="button1" class="btn btn-default" value="Sign In">
<input type="button" id="button2" class="btn btn-default" value="Register for Membership">
</div>

<div id="logindiv" class="row">

<form id="loginform" method="post" action="loginsubmit.php">
<center>
<h3>Enter Login Details</h3>
</center>  
  <div class="form-group">
    <label for="username">User Name</label>
	<input type="text" id="username" name="username" class="form-control" placeholder="wifiwifi">
	
  </div>
  
  <div class="form-group">
    <label for="userpassword">Password</label>
    <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="wifiwifi">
  </div>
  
  <div class="form-group">
    <label for="userrole">User Role</label>
    <select class="form-control" id="userrole" name="userrole">
		<option value="admin">admin</option>
		<option value="customer">customer</option>
	</select>
  </div>
  
  <button type="cancel" id="loginformcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="loginformsubmit" name="loginformsubmit" class="btn btn-default">Submit</button>

  <div class="form-group">
    <input type="text" class="form-control" id="message">
  </div>
</form>

</div>


<div id="registerdiv" class="container">
<form id="registerform" class="form-horizontal" method="post" action="registersubmit.php">
<center>
<h3>Register for Membership Details</h3>
</center>  
  <div class="col-sm-10">
    <label for="membername">Member Name</label>
	<input type="text" id="membername" name="membername" class="form-control" placeholder="Member Name">
  </div>
  
  <div class="col-sm-10">
    <label for="memberaddress">Member Address</label>
	<input type="text" id="memberaddress" name="memberaddress" class="form-control" placeholder="Member Address">
  </div>

  <div class="col-sm-10">
    <label for="memberphone">Member Phone</label>
	<input type="text" id="memberphone" name="memberphone" class="form-control" placeholder="Member Phone">
  </div>
 
  <div class="col-sm-10">
    <label for="memberemail">Member Email</label>
	<input type="email" id="memberemail" name="memberemail" class="form-control" placeholder="Member Email">
  </div>

  <div class="col-sm-10">
    <label for="memberstartdt">Membership Start Date</label>
	<input type="date" id="memberstartdt" name="memberstartdt" class="form-control" value=<?php echo date('d-m-Y'); ?>>
  </div>

  <div class="col-sm-10">
    <label for="membersenddt">Membership End Date</label>
	<input type="date" id="membersenddt" name="membersenddt" class="form-control" value=<?php echo date('d-m-Y'); ?>>
  </div>
  
  <div class="col-sm-10">
    <label for="membercreditcardno">Member Credit Card No.</label>
	<input type="text" id="membercreditcardno" name="membercreditcardno" class="form-control" placeholder="Credit Card No.">
  </div>

<br>
  <div class="col-sm-10">
  <button type="cancel" id="registercancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="registersubmit" name="registersubmit" class="btn btn-default">Submit</button>
 </div>
  
  <div class="form-group">
    <input type="text" class="form-control" id="message2">
  </div>
  </form>
</div>

</div><!-- /.container -->

</body>
</html>