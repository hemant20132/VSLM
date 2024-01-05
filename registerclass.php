<?php
session_start();
class registerclass
{
var $membername1;
var $memberaddress1;
var $memberphone1;
var $memberemail1;
var $memberstartdt1;
var $membersenddt1;
var $membercreditcardno1;
var $message3;
var $conn;

function insertrecord($membername,$memberaddress,$memberphone,$memberemail,$memberstartdt,$membersenddt,$membercreditcardno,$conn1)
{
	$this->membername1=$membername;
	$this->memberaddress1=$memberaddress;
	$this->memberphone1=$memberphone;
	$this->memberemail1=$memberemail;
	$this->memberstartdt1=date('Y-m-d',strtotime($memberstartdt));
	$this->membersenddt1=date('Y-m-d',strtotime($membersenddt));
	$this->membercreditcardno1=$membercreditcardno;
	$this->conn=$conn1;	
	$queryinsert= "insert into membertable (Member_Name,Member_Address,Member_Phone, Member_Email,Member_start_date, Member_Expires_date, Member_Credit_CardNo)
	values ('" . $this->membername1 . "','" .$this->memberaddress1 . "','" .  $this->memberphone1. "','" . $this->memberemail1.
	"','".$this->memberstartdt1."','".$this->membersenddt1."','".$this->membercreditcardno1."')";
    
	if (mysqli_query($this->conn,$queryinsert))
	{
	$this->message3="successful";
	return $this->message3;
	}	
	else
	{
	$this->message3="Error"; 
	return $this->message3;
	}
 
}

}
?>