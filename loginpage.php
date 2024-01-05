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

<script>
$(document).ready(function(){
	$("#logindiv").hide();
	$("#registerdiv").hide();
	$("#message").hide();
	
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
	$("#message").attr("color","red");
	return false;
	}
	
	if ($("#userpassword").val()=="")
	{
	$("#message").show();	
	$("#message").val("please enter the password !!!");
	$("#message").attr("color","red");
	return false;
	}
	
	$("#logindiv").show();
	
	$.ajax({
			url:'loginsubmit.php',
            type:'GET',
            data:$(this).serialize(),
            success:function(result){
            $("#message").text(result);
            }
			
		  });
	
	
	
	});


	$("#loginformcancel").click(function()
	{
	$("#logindiv").hide();
	});
	
	
	
});
</script>
</head>
<body>
<center>
<h3>Video Library Management System - AudioWeb</h3>
</center>
<div id="maindiv" class=".container-fluid"> 

<div id="imgdiv" class="row">
<img src="images/cdimage1.jpg" class="img-responsive" id="cdimg">
</div>

<div class="row">
<input type="button" id="button1" class="btn btn-default" value="Sign In">
<input type="button" id="button2" class="btn btn-default" value="Register for Membership">
</div>

<div id="logindiv" class="container">

<form id="loginform" method="post" action="">
<center>
<h3>Enter Login Details</h3>
</center>  
  <div class="form-group">
    <label for="username">User Name</label>
	<input type="text" id="username" class="form-control" placeholder="User Name">
	
  </div>
  
  <div class="form-group">
    <label for="userpassword">Password</label>
    <input type="password" class="form-control" id="userpassword" placeholder="Password">
  </div>
  <button type="cancel" id="loginformcancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="loginformsubmit" class="btn btn-default">Submit</button>

  <div class="form-group">
    <input type="text" class="form-control" id="message">
  </div>
    
  
</form>

</div>


<div id="registerdiv" class="container">
<form id="registerform" class="form-horizontal" method="post">
<center>
<h3>Register for Membership Details</h3>
</center>  
  <div class="col-sm-10">
    <label for="membername">Member Name</label>
	<input type="text" id="membername" class="form-control" placeholder="Member Name">
  </div>
  <div class="col-sm-10">
    <label for="memberaddress">Member Address</label>
	<input type="text" id="memberaddress" class="form-control" placeholder="Member Address">
  </div>

  <div class="col-sm-10">
    <label for="memberphone">Member Phone</label>
	<input type="text" id="memberphone" class="form-control" placeholder="Member Phone">
  </div>
 
  <div class="col-sm-10">
    <label for="memberemail">Member Email</label>
	<input type="text" id="memberemail" class="form-control" placeholder="Member Email">
  </div>

  <div class="col-sm-10">
    <label for="memberstartdt">Membership Start Date</label>
	<input type="text" id="memberstartdt" class="form-control" placeholder="Membership start date">
  </div>

  <div class="col-sm-10">
    <label for="memberemail">Member Credit Card No.</label>
	<input type="text" id="membercreditcardno" class="form-control" placeholder="Credit Card No.">
  </div>

<br>
  <div class="col-sm-10">
  <button type="cancel" class="btn btn-default">Cancel</button>
  <button type="submit" class="btn btn-default">Submit</button>
 </div>
  </form>
</div>



</div><!-- /.container -->

</body>
</html>