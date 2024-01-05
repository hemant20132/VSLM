<?php
class membershipclass
{
var $conn;
var $membername1;
var $memberaddress1;
var $memberphone1;
var $memberemail1;
var $memberstartdt1;
var $memberexpiredt1;
var $membercreditcardno1;
var $memberfeesdue1;
	
var $autonumber;
var $message20;
var $message21;
var $message22;
var $message23;

function add($conn1,$membershipname, $membershipaddress, $membershipphone, $membershipemail, $membershipstartdt, $membershipexpiredt, $membershipcreditcardno, $membershipfeesdue)
{
$this->conn=$conn1;	
$this->membername1=$membershipname;
$this->memberaddress1=$membershipaddress;
$this->memberphone1=$membershipphone;
$this->memberemail1=$membershipemail;
$this->memberstartdt1=date('Y-m-d',strtotime($membershipstartdt));
$this->memberexpiredt1=date('Y-m-d',strtotime($membershipexpiredt));
$this->membercreditcardno1=$membershipcreditcardno;
$this->memberfeesdue1=intval($membershipfeesdue);

$querymemberinsert = "INSERT INTO membertable ( Member_Name, Member_Address, Member_Phone,
Member_Email, Member_start_date, Member_Expires_date, Member_Credit_CardNo, Member_fees_due) 
VALUES ('".$this->membername1."','".$this->memberaddress1."','".$this->memberphone1."','".$this->memberemail1."','".
$this->memberstartdt1 ."','".$this->memberexpiredt1 ."','".$this->membercreditcardno1."',".$this->memberfeesdue1.")";
 
 if (mysqli_query($this->conn,$querymemberinsert))
 {
	$this->message20="successful"; 
	return $this->message20;
 }
 else
 {
	$this->message20="Error"; 
	return $this->message20;
 }
 
}

function update($conn1,$updatemembershipnumber,$updatemembershipname, $updatemembershipaddress, $updatemembershipphone, $updatemembershipemail, $updatemembershipstartdt, $updatemembershipexpiredt, $updatemembershipcreditcardno, $updatemembershipfeesdue)
{
$this->conn=$conn1;	
$this->membershipnumber1=$updatemembershipnumber;
$this->membername1=$updatemembershipname;
$this->memberaddress1=$updatemembershipaddress;
$this->memberphone1=$updatemembershipphone;
$this->memberemail1=$updatemembershipemail;
$this->memberstartdt1=date('Y-m-d',strtotime($updatemembershipstartdt));
$this->memberexpiredt1=date('Y-m-d',strtotime($updatemembershipexpiredt));
$this->membercreditcardno1=$updatemembershipcreditcardno;
$this->memberfeesdue1=intval($updatemembershipfeesdue);

$querymemberupdate = "update membertable SET Member_Name='".$this->membername1."',
Member_Address='".$this->memberaddress1."',
Member_Phone='".$this->memberphone1."',
Member_Email='".$this->memberemail1."',
Member_start_date='".$this->memberstartdt1."',
Member_Expires_date='".$this->memberexpiredt1 ."',
Member_Credit_CardNo='".$this->membercreditcardno1."',
Member_fees_due=".$this->memberfeesdue1 ." where Member_Name='".$this->membername1."'";

if (mysqli_query($this->conn,$querymemberupdate))
{
	$this->message13="successful"; 
	return $this->message13;
}
else
{
	$this->message13="Error"; 
	return $this->message13;
}

}


function displaymembershipmaxno($conn1)
{
	$this->conn=$conn1;
	$queryautoselect="SHOW TABLE STATUS LIKE 'membertable'";
	$row=mysqli_query($this->conn,$queryautoselect);
	$info=mysqli_fetch_array($row,MYSQLI_ASSOC);
	$this->autonumber=$info['Auto_increment'];
	return $this->autonumber;
}

function optionvalue($conn1)
{
$this->conn=$conn1;	
$querymembernames="select * from membertable";
$row=mysqli_query($this->conn,$querymembernames);
$this->option="<option>";
while($info = mysqli_fetch_assoc($row))
for ($i=0;$i<=$info.length;$i++)
{	
$this->option=$this->option. $info['Member_Name']. "</option><option>";	
}
return $this->option;
}

function checkupdatemembershipname($conn1,$updatemembershipname)
{
	  $this->conn=$conn1;	
      $this->updatemembershipname=$updatemembershipname;
	  $querycheckmembershipname="select * from membertable where Member_Name='". $this->updatemembershipname . "'";	
	  $row1=mysqli_query($this->conn,$querycheckmembershipname);
      $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);

	  If ($info1['Member_Name']<>$this->updatemembershipname)
	  {
      $this->message21="notfound";
	  return $this->message21;
	  }
	  
	  If ($info1['Member_Name']==$this->updatemembershipname)
	  {
      $this->membershipnumber=$info1['MembershipId'];
	  $this->membershipaddress=$info1['Member_Address'];
	  $this->membershipphone=$info1['Member_Phone'];
	  $this->membershipemail=$info1['Member_Email'];
	  $this->membershipstartdt=date('m-d-Y',(strtotime($info1['Member_start_date'])));
	  $this->membershipexpiredt=date('m-d-Y',(strtotime($info1['Member_Expires-date'])));
	  $this->membershipcreditcardno=$info1['Member_Credit_CardNo'];
	  $this->membershipfeesdue=$info1['Member_fees_due'];
	  
	  return $this->membershipnumber;
	  return $this->membershipaddress;
	  return $this->membershipphone;
	  return $this->membershipemail;
	  return $this->membershipstartdt;
	  return $this->membershipexpiredt;
	  return $this->membershipcreditcardno;
	  return $this->membershipfeesdue;
	  }	
}


function checkdeletemembershipname($conn1,$deletemembershipname)
{
	  $this->conn=conn1;	
      $this->deletemembershipname=$deletemembershipname;
	  $querycheckmembershipname="select * from membertable where Member_Name='".$this->deletemembershipname."'";	
	  $row1=mysqli_query($this->conn,$querycheckmembershipname);
      $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);

	  If ($info1['Member_Name']<>$this->deletemembershipname)
	  {
      $this->message22="notfound";
	  return $this->message22;
	  }
	  
	  If ($info1['Member_Name']==$this->deletemembershipname)
	  {
      $this->membershipnumber=$info1['MembershipId'];
	  $this->membershipaddress=$info1['Member_Address'];
	  $this->membershipphone=$info1['Member_Phone'];
	  $this->membershipemail=$info1['Member_Email'];
	  $this->membershipstartdt=$info1['Member_start_date'];
	  $this->membershipexpiredt=$info1['Member_Expires_date'];
	  $this->membershipcreditcardno=$info1['Member_Credit_CardNo'];
	  $this->membershipfeesdue=$info1['Member_fees_due'];
	  
	  return $this->membershipnumber;
	  return $this->membershipaddress;
	  return $this->membershipphone;
	  return $this->membershipemail;
	  return $this->membershipstartdt;
	  return $this->membershipexpiredt;
	  return $this->membershipcreditcardno;
	  return $this->membershipfeesdue;
	  }	

	  
}


function delete($conn1,$deletemembershipnumber,$deletemembershipname, $deletemembershipaddress, $deletemembershipphone, $deletemembershipemail, $deletemembershipstartdt, $deletemembershipexpiredt, $deletemembershipcreditcardno, $deletemembershipfeesdue)
{
$this->conn=$conn1;	
$this->membershipnumber1=intval($deletemembershipnumber);
$this->membername1=$deletemembershipname;
$this->memberaddress1=$deletemembershipaddress;
$this->memberphone1=$deletemembershipphone;
$this->memberemail1=$deletemembershipemail;
$this->memberstartdt1=date('Y-m-d',strtotime($deletemembershipstartdt));
$this->memberexpiredt1=date('Y-m-d',strtotime($deletemembershipexpiredt));
$this->membercreditcardno1=$deletemembershipcreditcardno;
$this->memberfeesdue1=intval($deletemembershipfeesdue);


$querymemberdelete="delete from membertable where MembershipId=".$this->membershipnumber1;

  if (mysqli_query($this->conn,$querymemberdelete))
 {
	$this->message22="successful"; 
	return $this->message22;
 }
 else
 {
	$this->message22="Error"; 
	return $this->message22;
 }

}


function view()
{
	
	
}

}

?>