<?php
class cdclass
{
var $cdnumber1;
var $cdtitle1;
var $cdartist1;
var $cdcomposer1;
var $cdentrydt1;
var $cdavailable1;
var $cdrentmember1;
var $returncdnumber;
var $cdrenteddt1;
var $cdduedt1;

var $membershipid1;
var $cdreturncdfee1;

var $response;

var $querycdtitle1;

var $updatecdnumber1;
var $updatecdtitle1;
var $updatecdartist1;
var $updatecdcomposer1;
var $updatecdentrydt1;
var $updatecdavailable1;

var $deletecdnumber1;
var $deletecdtitle1;
var $deletecdartist1;
var $deletecdcomposer1;
var $deletecdentrydt1;
var $deletecdavailable1;

var $cdtitle;
var $cdartist;
var $cdcomposer;
var $cdentrydt;
var $cdavailable;

var $message4;
var $autonumber;
var $updatecdnumber;
var $message6;
var $message7;
var $message8;
var $message9;
var $message10;
var $message11;
var $conn;

function add($conn1,$cdnumber,$cdtitle,$cdartist,$cdcomposer,$cdentrydt,$cdavailable)
{
$this->conn=$conn1;
$this->cdnumber1=intval($cdnumber);
$this->cdtitle1=$cdtitle;
$this->cdartist1=$cdartist;
$this->cdcomposer1=$cdcomposer;
$this->cdentrydt1=date('Y-m-d',strtotime($cdentrydt)); 
$this->cdavailable1=$cdavailable;

$querycdinsert="INSERT INTO cdtable (CDNumber,Title,Artist,Composer,Cdentrydt,available) values 
(".$this->cdnumber1.",'".$this->cdtitle1."','".$this->cdartist1."','".$this->cdcomposer1.
"','".$this->cdentrydt1."','".$this->cdavailable1."')";

	if (mysqli_query($this->conn,$querycdinsert))
	{
	$this->message4="successful";
	return $this->message4;
	}	
	else
	{
	$this->message4="Error"; 
	return $this->message4;
	}
}


function checkduplicate($conn1,$cdtitle,$cdartist,$cdcomposer)
{
$this->conn=$conn1;
$this->cdtitle1=$cdtitle;
$this->cdartist1=$cdartist;
$this->cdcomposer1=$cdcomposer;
$querychkduplicatecd="select Title,Artist,Composer from cdtable where 
Title='".$this->cdtitle1."' and Artist='".$this->cdartist1."' and Composer='".$this->cdcomposer1."'";
$row1=mysqli_query($this->conn,$querychkduplicatecd);
$info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);

if ($info1['Title']==$this->cdtitle1 and $info1['Artist']==$this->cdartist1 and $info1['Composer']==$this->cdcomposer1)
	  {
	    $this->message10="cdexists"; 			
		  return $this->message10;
	  }
	  else
	  {
		$this->message10="cdnotexists"; 			
		  return $this->message10;
      } 
}

function displaycdmaxno($conn1)
{
	$this->conn=$conn1;
	$queryautoselect="SHOW TABLE STATUS LIKE 'cdtable'";
	$row=mysqli_query($this->conn,$queryautoselect);
	$info=mysqli_fetch_array($row,MYSQLI_ASSOC);
	$this->autonumber=$info['Auto_increment'];
	return $this->autonumber;
}


function optionvalue($conn1)
{
$this->conn=$conn1;	
$querycdtitle="select * from rentcdtable";
$row=mysqli_query($this->conn,$querycdtitle);
$this->option="<option>";
while($info = mysqli_fetch_assoc($row))
for ($i=0;$i<=$info.length;$i++)
{	
$this->option=$this->option.$info['RentCDTitle']."</option><option>";	
}
return $this->option;

}

function cdoptionvalue($conn1)
{
$this->conn=$conn1;
$querycdtitle="select * from cdtable";
$row=mysqli_query($this->conn,$querycdtitle);
$this->cdoption="<option>";
while($info = mysqli_fetch_assoc($row))
for ($i=0;$i<=$info.length;$i++)
{	
$this->cdoption=$this->cdoption.$info['Title']."</option><option>";	
}
return $this->cdoption;
}



function checkupdatecdtitle($conn1,$updatecdtitle)
{
	$this->conn=$conn1;

      $this->updatecdtitle=$updatecdtitle;
	  $querycheckcdtitle="select * from cdtable where Title='".$this->updatecdtitle."'";	
	  $row1=mysqli_query($this-conn,$querycheckcdtitle);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['Title'] <> $this->updatecdtitle)
	  {
	    $this->message6="notfound!!!"; 			
		  return $this->message6;
	  }
	  
      If ($info1['Title']==$this->updatecdtitle)
	  {
	  $this->cdnumber=$info1['CDNumber'];
	  $this->cdartist=$info1['Artist'];
	  $this->cdcomposer=$info1['Composer'];
	  $this->cdentrydt=date('m-d-Y',strtotime($info1['Cdentrydt']));
	  $this->cdavailable=$info1['available'];
	  return $this->cdtitle;
	  return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdentrydt;
	  return $this->cdavailable;
	  }	
}

function checkdeletecdtitle($conn1,$deletecdtitle)
{
	  $this->conn=conn1;	
      $this->deletecdtitle1=$deletecdtitle;
	  $querycheckcdtitle="select * from cdtable where Title='".$this->deletecdtitle1."'";	
	  $row1=mysqli_query($this->conn,$querycheckcdtitle);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['Title'] <> $this->deletecdtitle1)
	  {
	    $this->message6="notfound!!!"; 			
		  return $this->message6;
	  }
	  
      If ($info1['Title']==$this->deletecdtitle1)
	  {
	  $this->cdnumber=$info1['CDNumber'];
	  $this->cdartist=$info1['Artist'];
	  $this->cdcomposer=$info1['Composer'];
	  $this->cdentrydt=$info1['Cdentrydt'];
	  $this->cdavailable=$info1['available'];
	  return $this->cdnumber;
	  return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdentrydt;
	  return $this->cdavailable;
	  }	
}



function checkrentcdtitle($conn1,$rentcdtitle)
{
	  $this->conn=$conn1;	
      $this->rentcdtitle=$rentcdtitle;
	  $querycheckcdtitle="select * from cdtable where Title='". $this->rentcdtitle."'";	
	  $row1=mysqli_query($this->conn,$querycheckcdtitle);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['Title'] <> $this->rentcdtitle)
	  {
	      $this->message9="notfound!!!"; 			
		  return $this->message9;
	  }
	  
	  If ($info1['Title']==$this->rentcdtitle)
	  {
	  $this->cdnumber=$info1['CDNumber'];
	  $this->cdartist=$info1['Artist'];
	  $this->cdcomposer=$info1['Composer'];
	  $this->cdentrydt=$info1['Cdentrydt'];
	  $this->cdavailable=$info1['available'];
	  return $this->cdnumber;
	  return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdentrydt;
	  return $this->cdavailable;
	  }
}


function checkreturncdtitle($conn1,$returncdtitle)
{
	  $this->conn=$conn1;
      $this->returncdtitle1=$returncdtitle;
	  $querycheckreturncdtitle="select * from rentcdtable where RentCDTitle='". $this->returncdtitle1."'";	
	  $row1=mysqli_query($this->conn,$querycheckreturncdtitle);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['RentCDTitle'] <> $this->returncdtitle1)
	  {
	      $this->message9="notfound!!!"; 			
		  return $this->message9;
	  }
	  
	  If ($info1['RentCDTitle']==$this->returncdtitle1)
	  {
	  $this->cdmembershipid=$info1['MembershipId'];
      $this->cdnumber=$info1['RentCDNumber'];
	  $this->cdartist=$info1['RentCDArtist'];
	  $this->cdcomposer=$info1['RentCDComposer'];
	  $this->cdrentdt=date('m-d-Y',strtotime($info1['RentCDDt']));
	  $this->cdreturneddt=date('m-d-Y',strtotime($info1['RentCDreturneddt']));
	  $this->cdduedt=date('m-d-Y',strtotime($info1['RentCDDueDt']));
	  $this->cdfee=$info1['RentCdFee'];
	  return $this->cdnumber;
	  return $this->cdmembershipid;
      return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdrentdt;
	  return $this->cdreturneddt;
	  return $this->cdduedt;
	  return $this->cdfee;
	  }
}


function update($conn1,$ucdnumber,$ucdtitle,$ucdartist,$ucdcomposer,$ucdentrydt,$ucdavailable)
{
$this->conn=$conn1;	
$this->updatecdnumber1=intval($ucdnumber);
$this->updatecdtitle1=$ucdtitle;
$this->updatecdartist1=$ucdartist;
$this->updatecdcomposer1=$ucdcomposer;
$this->updatecdentrydt1=date('Y-m-d',strtotime($ucdentrydt));
$this->updatecdavailable1=$ucdavailable;

$querycdupdate="UPDATE cdtable SET Title='".$this->updatecdtitle1.
"',Artist='". $this->updatecdartist1.
"',Composer='".$this->updatecdcomposer1.
"',Cdentrydt='".$this->updatecdentrydt1.
"',available='". $this->updatecdavailable1."' where CDNumber=".$this->updatecdnumber1;

	
	if (mysqli_query($this->conn,$querycdupdate))
	{
	$this->message7="successful";
	return $this->message7;
	}	
	else
	{
	$this->message7="Error"; 
	return $this->message7;
	}
	
}


function rentcd($conn1,$cdnumber,$cdtitle,$cdartist,$cdcomposer,$rentmembercd,$cdrenteddt,$cdduedt)
{
$this->conn=$conn1;	
$this->cdnumber1=intval($cdnumber);
$this->cdtitle1=$cdtitle;
$this->cdartist1=$cdartist;
$this->cdcomposer1=$cdcomposer;
$this->cdrentmember1=intval($rentmembercd);
$this->cdrenteddt1=date('Y-m-d',strtotime($cdrenteddt));
$this->cdduedt1=date('Y-m-d',strtotime($cdduedt));

$queryrentcd= "INSERT INTO rentcdtable(MembershipId,RentCDNumber,RentCDTitle,RentCDArtist,
RentCDComposer,RentCDDt,RentCDDueDt) values (".$this->cdrentmember1. "," . $this->cdnumber1. ",'" .$this->cdtitle1. "','" .$this->cdartist1. "','"
.$this->cdcomposer1."','".$this->cdrenteddt1."','".$this->cdduedt1."')";

$querycdupdate="UPDATE cdtable SET Date_Rented='".$this->cdrenteddt1."', Due_Date='".$this->cdduedt1."', available='No' where CDNumber=".$this->cdnumber1;

if (mysqli_query($this->conn,$queryrentcd))
{
	if (mysqli_query($this->conn,$querycdupdate))
	{
	$this->message9="successful";
	return $this->message9;
	}
}
else
{
$this->message9="Error";   
return $this->message9;
}
}


function returncd($conn1,$cdnumber,$membershipid,$cdtitle,$cdartist,$cdcomposer,$cdrenteddt,$cdreturndt,$cdreturncdduedt,$cdreturncdfee)
{
$this->conn=$conn1;	
$this->cdnumber1=intval($cdnumber);
$this->membershipid1=intval($membershipid);
$this->cdtitle1=$cdtitle;
$this->cdartist1=$cdartist;
$this->cdcomposer1=$cdcomposer;
$this->cdrenteddt1=date('Y-m-d',strtotime($cdrenteddt));
$this->cdreturndt1=date('Y-m-d',strtotime($cdreturndt));
$this->cdduedt1=date('Y-m-d',strtotime($cdreturncdduedt));
$this->cdreturncdfee1=$cdreturncdfee;
$queryreturncd="UPDATE rentcdtable SET RentCDreturneddt= '".$this->cdreturndt1."' where RentCDTitle='".$this->cdtitle1."'";

	if (mysqli_query($this->conn,$queryreturncd))
	{
	$this->message11="successfulreturn";
	return $this->message11;
	}	
	else
	{
	$this->message11="Error"; 
	return $this->message11;
	}
}


function delete($conn1,$dcdnumber,$dcdtitle,$dcdartist,$dcdcomposer,$dcdentrydt,$dcdavailable)
{
$this->conn=$conn1;	
$this->deletecdnumber1=intval($dcdnumber);
$this->deletecdtitle1=$dcdtitle;
$this->deletecdartist1=$dcdartist;
$this->deletecdcomposer1=$dcdcomposer;
$this->deletecdentrydt1=$dcdentrydt;
$this->deletecdavailable1=$dcdavailable;
$querycddelete="delete from cdtable where CDNumber=".$this->deletecdnumber1;
mysqli_query($this->conn,$querycddelete);

	if (mysqli_query($this->conn,$querycddelete))
	{
		
	$this->message8="successful";
	return $this->message8;
	}	
	else
	{
	$this->message8="Error"; 
	return $this->message8;
	}
}


function querycdtitle($conn1,$querycdtitle)
{
	  $this->conn=$conn1;
      $this->querycdtitle1=$querycdtitle;
	  $query1="select * from cdtable where Title='".$this->querycdtitle1."'";	
	  $row1=mysqli_query($this->conn,$query1);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['Title'] <> $this->querycdtitle1)
	  {
	    $this->message9="notfound!!!"; 			
		  return $this->message9;
	  }
	  
      If ($info1['Title']==$this->querycdtitle1)
	  {
	  
	  $this->cdnumber=$info1['CDNumber']; 	  
	  $this->cdtitle=$info1['Title'];
	  $this->cdartist=$info1['Artist'];
	  $this->cdcomposer=$info1['Composer'];
	  $this->cdentrydt=$info1['Cdentrydt'];
	  $this->cdavailable=$info1['available'];
	  
	  return $this->cdnumber;
	  return $this->cdtitle;
	  return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdentrydt;
	  return $this->cdavailable;
	  }	
	  
}


function querycdartist($conn1,$querycdartist)
{
	  $this->conn=$conn1;	
      $this->querycdartist1=$querycdartist;
	  $query1="select * from cdtable where Artist='".$this->querycdartist1."'";	
	  $row1=mysqli_query($this->conn,$query1);
	  $info1=mysqli_fetch_array($row1,MYSQLI_ASSOC);
	
	  If ($info1['Artist'] <> $this->querycdartist1)
	  {
		  $this->message9="notfound!!!"; 			
		  return $this->message9;
	  }
	  
      If ($info1['Artist']==$this->querycdartist1)
	  {
	  
	  $this->cdnumber=$info1['CDNumber']; 	  
	  $this->cdtitle=$info1['Title'];
	  $this->cdartist=$info1['Artist'];
	  $this->cdcomposer=$info1['Composer'];
	  $this->cdentrydt=$info1['Cdentrydt'];
	  $this->cdavailable=$info1['available'];
	  
	  return $this->cdnumber;
	  return $this->cdtitle;
	  return $this->cdartist;
	  return $this->cdcomposer;
	  return $this->cdentrydt;
	  return $this->cdavailable;
	  }	
	  
}


}

?>