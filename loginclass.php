<?php
session_start();
ob_start();
class loginclass
{
var $user;
var $pass;
var $userrole;
var $message1;
var $conn;

function checklogin($conn1,$userid,$password,$userrole)
{
$this->conn=$conn1;	
$this->user=$userid;
$this->userrole=$userrole;
$this->pass=$password;
$query="select user_name, user_pass, user_role from usertable where user_role='".$this->userrole."' and 
user_name='".$this->user."' and user_pass='".$this->pass."'";
$result=mysqli_query($this->conn,$query);

if (mysqli_num_rows($result) >0)
{
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if ( $row["user_name"]== $this->user and $row["user_pass"]==$this->pass )
{	
$_SESSION['username']=$this->user;
$_SESSION['userrole']=$row['user_role'];
$this->message1="success";
return $this->message1;
}

if ( $row["user_name"]<>$this->user or $row["user_pass"]<>$this->pass )
{
session_destroy();
$this->message1="nosuccess";
return $this->message1;
}
}

if (mysqli_num_rows($result)==0)
{
session_destroy();
$this->message1="nosuccess";
return $this->message1;
}
}
}
?>