<?php
class userclass
{

var $username;
var $useraddress;
var $userrole;
var $useremail;
var $userpassword;
var $userfeesdue;
var $userrentedcdscurrent;
var $autonumber;
var $message6;
var $message7;
var $message12;
var $message11;
var $message10;
var $option;

var $updateusernumber;
var $updateusername;
var $updateuseraddress;
var $updateuserrole;
var $updateuseremail;
var $updateuserpassword;
var $updateuserfeesdue;
var $updateuserrentedcdscurrent;

var $deleteusernumber;
var $deleteusername;
var $deleteuseraddress;
var $deleteuserrole;
var $deleteuseremail;
var $deleteuserpassword;
var $deleteuserfeesdue;
var $deleteuserrentedcdscurrent;
var $conn;


function add($conn1,$username,$useraddress,$userrole,$useremail,$userpassword,$userfeesdue)
{
$this->conn=$conn1;
$this->username1=$username;
$this->useraddress1=$useraddress;
$this->userrole1=$userrole;
$this->useremail1=$useremail;
$this->userpassword1=$userpassword;
$this->userfeesdue1=intval($userfeesdue);

$queryuserinsert="INSERT INTO usertable(user_name, user_address, user_role, user_email, user_pass, user_fees_due)
values ('" .$this->username1. "','" . $this->useraddress1. "','" .$this->userrole1."','".$this->useremail1."','".$this->userpassword1."',".$this->userfeesdue1.")";

	if (mysqli_query($this->conn,$queryuserinsert))
	{
	$this->message12="successful";
	return $this->message12;
	}	
	else
	{
	$this->message12="Error"; 
	return $this->message12;
	}
 
}

function displayusermaxno($conn1)
{
	$this->conn=$conn1;
	$queryautoselect="SHOW TABLE STATUS LIKE 'usertable'";
	$row=mysqli_query($this->conn,$queryautoselect);
	$info=mysqli_fetch_array($row,MYSQLI_ASSOC);
	$this->autonumber=$info['Auto_increment'];
	return $this->autonumber;
}


function optionvalue($conn1)
{
$this->conn=$conn1;
$queryusernames="select * from usertable";
$row=mysqli_query($this->conn,$queryusernames);
$this->option="<option>";
while($info = mysqli_fetch_assoc($row))
for ($i=0;$i<=$info.length;$i++)
{	
$this->option=$this->option.$info['user_name']."</option><option>";	
}
return $this->option;

}


function checkupdateusername($conn1,$updateusername)
{
	$this->conn=$conn1;
	  $this->updateusername1=$updateusername;
	  $querycheckusername="select * from usertable where user_name='".$this->updateusername1."'";	
	  $row1=mysqli_query($this->conn,$querycheckusername);
      $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);

	  If ($info1['user_name'] <> $this->updateusername1)
	  {
      $this->message11="notfound";
	  return $this->message11;
	  }
	  
	  If ($info1['user_name']==$this->updateusername1)
	  {
      $this->usernumber=$info1['user_id'];
	  $this->useraddress=$info1['user_address'];
	  $this->userrole=$info1['user_role'];
	  $this->useremail=$info1['user_email'];
	  $this->userpass=$info1['user_pass'];
	  $this->userfeesdue=$info1['User_fees_due'];
	  return $this->usernumber;
	  return $this->useraddress;
	  return $this->userrole;
	  return $this->useremail;
	  return $this->userpass;
	  return $this->userfeesdue;
	  }	
}


function checkdeleteusername($conn1,$deleteusername)
{
	  $this->conn=$conn1;
	
      $this->deleteusername1=$deleteusername;
	  $querycheckusername="select * from usertable where user_name='".$this->deleteusername1."'";	
	  $row1=mysqli_query($this->conn,$querycheckusername);
      $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);

	  If ($info1['user_name']<>$this->deleteusername1)
	  {
      $this->message12="notfound";
	  return $this->message12;
	  }
	  
	  If ($info1['user_name']==$this->deleteusername1)
	  {
      $this->usernumber=$info1['user_id'];
	  $this->useraddress=$info1['user_address'];
	  $this->userrole=$info1['user_role'];
	  $this->useremail=$info1['user_email'];
	  $this->userpass=$info1['user_pass'];
	  $this->userfeesdue=$info1['User_fees_due'];
	  return $this->usernumber;
	  return $this->useraddress;
	  return $this->userrole;
	  return $this->useremail;
	  return $this->userpass;
	  return $this->userfeesdue;
	  }
	  
}


function update($conn1,$updateusernumber,$updateusername,$updateuseraddress,$updateuserrole,$updateuseremail,$updateuserpassword,$updateuserfeesdue)
{
$this->conn=$conn1;
$this->updateusernumber1=$updateusernumber;
$this->updateusername1=$updateusername;
$this->updateuseraddress1=$updateuseraddress;
$this->updateuserrole1=$updateuserrole;
$this->updateuseremail1=$updateuseremail;
$this->updateuserpassword1=$updateuserpassword;
$this->updateuserfeesdue1=$updateuserfeesdue;

$queryuserupdate="update usertable set user_name='".$this->updateusername1."',user_address='".$this->updateuseraddress1."'
,user_role='".$this->updateuserrole1."'
,user_email='".$this->updateuseremail1."'
,user_pass='".$this->updateuserpassword1."'
,User_fees_due=".$this->updateuserfeesdue1."  where user_id=".$this->updateusernumber1;


	if (mysqli_query($this->conn,$queryuserupdate))
	{
	$this->message11="successful";
	return $this->message11;
	}	
	else
	{
	$this->message11="Error"; 
	return $this->message11;
	}

}


function delete($conn1,$deleteusernumber,$deleteusername,$deleteuseraddress,$deleteuserrole,$deleteuseremail,$deleteuserpassword,$deleteuserfeesdue)
{
$this->conn=$conn1;
$this->deleteusernumber1=$deleteusernumber;
$this->deleteusername1=$deleteusername;
$this->deleteuseraddress1=$deleteuseraddress;
$this->deleteuserrole1=$deleteuserrole;
$this->deleteuseremail1=$deleteuseremail;
$this->deleteuserpassword1=$deleteuserpassword;
$this->deleteuserfeesdue1=intval($deleteuserfeesdue);

$queryuserdelete="delete from usertable where user_id=".$this->deleteusernumber1;

	if (mysqli_query($this->conn,$queryuserdelete))
	{
	$this->message12="successful";
	return $this->message12;
	}	
	else
	{
	$this->message12="Error"; 
	return $this->message12;
	}

}


function view()
{
	
	
}

}

?>