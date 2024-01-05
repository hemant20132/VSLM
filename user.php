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


<script>
$(document).ready(function()
{
	$("#userfeesdue").inputmask("9999.99");
	$("#userdetails").hide();
	$("#updateuserdetails").hide();
	$("#deleteuserdetails").hide();
	$("#message10").hide();
	$("#message11").hide();
	$("#message12").hide();
	
	$("input[type=text]").keyup(function() {
    $(this).val($(this).val().toUpperCase());
	});
	
	$("#username").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#useraddress").focus();
		}
	});
	
	
	$("#useraddress").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#userrole").focus();
		}
	});
	
	
	$("#userrole").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#useremail").focus();
		}
	});
	
	$("#useremail").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#userpassword").focus();
		}
	});
	
	$("#userfeesdue").keypress(function(e)
	{
	keypressed=e.which;
	});
	
	
	$("#updateuseraddress").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updateuserrole").focus();
		}
	});
	
	$("#updateuserrole").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updateuseremail").focus();
		}
	});
	
	$("#updateuseremail").keypress(function(e)
	{
	keypressed=e.which;
		if (keypressed==13)
		{
		$("#updateuserpassword").focus();
		}
	});
	
	$("#updateuserfeesdue").keypress(function(e)
	{
	keypressed=e.which;
	});
	

	$("#adduser").click(function()
	{
	$("#userdetails").show();
	$("#updateuserdetails").hide();	
	$("#deleteuserdetails").hide();
	});

	$("#updateuser").click(function()
	{
	$("#updateuserdetails").show();
	$("#userdetails").hide();
	$("#deleteuserdetails").hide();
	});

	$("#deleteuser").click(function()
	{
	$("#deleteuserdetails").show();
	$("#updateuserdetails").hide();
	$("#userdetails").hide();
	});

	$("#usercancel").click(function()
	{
	$("#userdetails").hide();
	return false;
	});


	$("#addusersubmit").click(function()
	{

	if ($("#usernumber").val()=="")
	{
	$("#message10").show();	
	$("#message10").val("please enter the User Number !!!");
	$("#message10").css("color","red");
	return false;
	}
	
	if ($("#username").val()=="")
	{
	$("#message10").show();	
	$("#message10").val("please enter User Name !!!");
	$("#message10").css("color","red");
	return false;
	}
	
	if ($("#useraddress").val()=="")
	{
	$("#message10").show();	
	$("#message10").val("please enter User Address !!!");
	$("#message10").css("color","red");
	return false;
	}

	if ($("#userrole").val()=="")
	{
	$("#messsage10").show();	
	$("#message10").val("please enter User Role !!!");
	$("#message10").css("color","red");
	return false;
	}

	
	if ($("#useremail").val()=="")
	{
	$("#message10").show();	
	$("#message10").val("please enter User Email  !!!");
	$("#message10").css("color","red");
	return false;
	}
	
	if ($("#userpassword").val()=="")			
	{
	$("#message10").show();	
	$("#message10").val("please enter User Password");
	$("#message10").css("color","red");
	return false;
	}
	
	if ($("#userfeesdue").val()=="")			
	{
	$("#message10").show();	
	$("#message10").val("please enter User fees");
	$("#message10").css("color","red");
	return false;
	}
	});
	
	
	$("#updateusername").change(function()
	{
			updateusername = $("#updateusername").val();
			$.ajax({
                type:"GET",
                url:"checkupdateusername.php",
                data:{updateusername1:updateusername},
				success:function(msg)
				{
				$("#message11").hide();
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				if (str.substr(0,n)=="")
				{
				$("#message11").show();
				$("#message11").val("User record not found !!!");
				$("#message11").css("color","red");	
				}
				else
				{	
				$("#updateusernumber").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updateuseraddress").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updateuserrole").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updateuseremail").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updateuserpassword").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#updateuserfeesdue").val(str.substr(0,n));
				}
				}
				
		    });  
	});
	

	$("#deleteusername").change(function()
	{
			deleteusername = $("#deleteusername").val();
			$.ajax({
                type:"GET",
                url:"checkdeleteusername.php",
                data:{deleteusername1:deleteusername},
				success:function(msg)
				{
				var str=msg;	
				n=str.search("&");
				str=str.slice(n+1);
				n=str.search("&");
				if (str.substr(0,n)=="")
				{
				$("#message12").show();
				$("#message12").val("User record not found !!!");
				$("#message12").css("color","red");	
				}
				else
				{	
				$("#deleteusernumber").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deleteuseraddress").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deleteuserrole").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deleteuseremail").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deleteuserpassword").val(str.substr(0,n));
				str=str.slice(n+1);
				n=str.search("&");
				$("#deleteuserfees").val(str.substr(0,n));
				}
				}
            });  
		
	});

	$("#updateusersubmit").click(function()
	{
		if ($("#updateusernumber").val()=="")
		return false;
	});




	$("#updateusercancel").click(function()
	{
		$("#updateuserdetails").hide();
		return false;
	});
	
	$("#deleteusercancel").click(function()
	{
		$("#deleteuserdetails").hide();
		return false;
	});
	
	$("#deleteusersubmit").click(function()
	{
		if ($("#deleteusername").val()=="admin")
		{
			$("#message12").show();		
			$("#message12").val("admin user cannot be deleted!!!");
			$("#message12").css("color","red");
			return false;
		}
	});
	
});
</script>

</head>

<body>
<?php
include ("dbconfig.php");
include ("db.php");
include ("userclass.php");
$db1= new dbclass();
$db1->connect();
$conn1=$db1->conn;
$user1 = new userclass();
$user1->displayusermaxno($conn1);

if ( !empty( $_REQUEST['message11'] ) )
{
		if ( $_REQUEST['message11']=="successful" )
		{	
			echo "<input type='text' value='user information updated successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message11']=="Error" )
		{	
			echo "<input type='text' value='Error  user record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
}


if ( !empty( $_REQUEST['message12'] ) )
{
		if ( $_REQUEST['message12']=="successful" )
		{	
			echo "<input type='text' value='user added successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message12']=="Error" )
		{	
			echo "<input type='text' value='Error creating user record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
}

if ( !empty( $_REQUEST['message7'] ) )
{
		if ( $_REQUEST['message7']=="successful" )
		{	
			echo "<input type='text' value='User deleted successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message7']=="Error" )
		{	
			echo "<input type='text' value='Error deleting user record!!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
		}
		
		if ( $_REQUEST['message7']=="adminuser" )
		{	
			echo "<input type='text' value='User admin cannot be deleted!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}
}


if ( !empty( $_REQUEST['message13'] ) )
{
		if ( $_REQUEST['message13']=="successful" )
		{	
			echo "<input type='text' value='user record updated successfully!!!' style='width:20%;position:absolute;color:green;margin-top:45%;margin-left:40%;'>";
		}

		if ( $_REQUEST['message13']=="Error" )
		{	
			echo "<input type='text' value='Error in updating user record !!!' style='width:20%;position:absolute;color:red;margin-top:45%;margin-left:40%;'>";
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
<?php if ($_SESSION['userrole']=='admin')
{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
  <li role="presentation"><a href="membership.php">Membership</a></li>
  <li role="presentation"><a href="reservecd.php">Reserve CD</a></li>
  <li role="presentation"><a href="user.php">Users</a></li>
  <li role="presentation"><a href="reports.php">Reports</a></li>
</ul>
<?php
}
?>

<?php if ($_SESSION['userrole']=='user')
{
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="mainpage.php">Home</a></li>
</ul>
<?php
}
?>


<center>
<h4>Video Cd User Management</h4>
</center>
	<img id="cdimg" src="images/cdimage1.jpg"/>
	<center>
	<?php if ($_SESSION['userrole']=='admin')
	{
	?>
	<div class="row" style="width:50%;margin-top:14%;" >
	<input type="button" id="adduser" class="btn btn-default" value="Adduser">
	<input type="button" id="updateuser" class="btn btn-default" value="Update User">
	<input type="button" id="deleteuser" class="btn btn-default" value="Delete User">
	<input type="button" id="viewuser" class="btn btn-default" value="View User">
	</div>
	<?php
	}
	?>
	</center>
	

<div id="userdetails" class="container">
<form id="userdetailsform" class="form-horizontal" method="post" action="adduser.php">
<center>
<h3>Enter New user Details</h3>
</center>  
  <div class="col-sm-10">
    <label for="usernumber">User Number</label>
	<input type="text" id="usernumber" name="usernumber" class="form-control" readonly value=<?php echo $user1->autonumber;?> placeholder=<?php echo $user1->autonumber; ?> >
  </div>
  
  <div class="col-sm-10">
    <label for="username">User Name</label>
	<input type="text" id="username" name="username" class="form-control" placeholder="User Name">
  </div>

  <div class="col-sm-10">
    <label for="useraddress">User Address</label>
	<input type="text" id="useraddress" name="useraddress" class="form-control" placeholder="User Address">
  </div>
 
 <div class="col-sm-10">
    <label for="user ">User Role  </label>
	<select type="text" id="userrole" name="userrole" class="form-control" placeholder="User Role-admin,member,employee,user">
	<option>admin</option>
	<option>user</option>
	<option>member</option>
	<option>employee</option>
	</select>
  </div>

  <div class="col-sm-10">
    <label for="useremail">User Email</label>
	<input type="email" id="useremail" name="useremail" class="form-control" placeholder="User Email">
  </div>

  <div class="col-sm-10">
    <label for="userentrydt">User Password</label>
	<input type="password" id="userpassword" name="userpassword" class="form-control" placeholder="User Password">
  </div>

  <div class="col-sm-10">
    <label for="userfeesdue">User Fees</label>
	<input type="text" id="userfeesdue" name="userfeesdue" class="form-control" placeholder="User Fees">
  </div>

  
  
<br>
  <div class="col-sm-10">
  <button type="cancel" id="usercancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="addusersubmit" name="addusersubmit" class="btn btn-default">Submit</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message10"  class="form-control" >
  </div>
 
 
 </form>

 </div>
 
 
<div id="updateuserdetails" class="container">

<form id="userupdateform" class="form-horizontal" method="post" action="updateuser.php">
<center>
<h3>Update user Details</h3>
</center>  
<?php
echo $user1->option; 
 ?>
 <div class="col-sm-10">
    <label for="updateusername">User Name</label>
	<select id="updateusername" name="updateusername" class="form-control" placeholder="User Name">
	<?php $user1->optionvalue($conn1);
	echo $user1->option;
	?>
	</select>
  </div>

  <div class="col-sm-10">
    <label for="updateusernumber">user Number</label>
	<input type="text" id="updateusernumber" name="updateusernumber" readonly class="form-control"  value=""  placeholder="User Number" >
  </div>

  
  <div class="col-sm-10">
    <label for="updateuseraddress">User Address</label>
	<input type="text" id="updateuseraddress" name="updateuseraddress" class="form-control" placeholder="User Address">
  </div>
 
 <div class="col-sm-10">
    <label for="updateuserrole">User Role  </label>
	<input type="text" id="updateuserrole" name="updateuserrole" class="form-control" placeholder="User Role">
  </div>

  <div class="col-sm-10">
    <label for="updateuseremail">User Email</label>
	<input type="email" id="updateuseremail" name="updateuseremail" class="form-control" placeholder="User Email">
  </div>

  <div class="col-sm-10">
    <label for="updateuserpassword">User Password</label>
	<input type="password" id="updateuserpassword" name="updateuserpassword" class="form-control" placeholder="User Password">
  </div>

  <div class="col-sm-10">
    <label for="updateuserfeesdue">User Fees</label>
	<input type="text" id="updateuserfeesdue" name="updateuserfeesdue" class="form-control" placeholder="User Fees">
  </div>

 <br>
 
 <div class="col-sm-10">
  <button type="cancel" id="updateusercancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="updateusersubmit" name="updateusersubmit" class="btn btn-default">Update</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message11"  class="form-control" >
  </div>
 
 </form>
 </div>


 
 
<div id="deleteuserdetails" class="container">

<form id="userdeleteform" class="form-horizontal" method="post" action="deleteuser.php">
<center>
<h3>delete user Details</h3>
</center>  


 <div class="col-sm-10">
    <label for="deleteusername">User Name</label>
	<select id="deleteusername" name="deleteusername" class="form-control" readonly placeholder="User Name">
	<?php $user1->optionvalue($conn1);
	echo $user1->option;
	?>
	</select>
</div>


  <div class="col-sm-10">
    <label for="deleteusernumber">user Number</label>
	<input type="text" id="deleteusernumber" name="deleteusernumber" class="form-control"   value=""  placeholder="Cd Number" >
  </div>
 

  <div class="col-sm-10">
    <label for="deleteuseraddress">User Address</label>
	<input type="text" id="deleteuseraddress" name="deleteuseraddress" class="form-control" readonly  placeholder="User Address">
  </div>
 
 <div class="col-sm-10">
    <label for="deleteuserrole">User Role  </label>
	<input type="text" id="deleteuserrole" name="deleteuserrole" class="form-control" readonly placeholder="User Role">
  </div>

  <div class="col-sm-10">
    <label for="deleteuseremail">User Email</label>
	<input type="email" id="deleteuseremail" name="deleteuseremail" class="form-control" placeholder="User Email">
  </div>

  <div class="col-sm-10">
    <label for="deleteuserpassword">User Password</label>
	<input type="password" id="deleteuserpassword" name="deleteuserpassword" class="form-control" readonly placeholder="User Password">
  </div>

  <div class="col-sm-10">
    <label for="deleteuserfees">User Fees</label>
	<input type="text" id="deleteuserfees" name="deleteuserfees" class="form-control" readonly placeholder="User Fees">
  </div>

 <br>
 
 <div class="col-sm-10">
  <button type="cancel" id="deleteusercancel" class="btn btn-default">Cancel</button>
  <button type="submit" id="deleteusersubmit" name="deleteusersubmit" class="btn btn-default">delete</button>
 </div>
 
  <div class="col-sm-10">
   <input type="text" id="message12"  class="form-control" >
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