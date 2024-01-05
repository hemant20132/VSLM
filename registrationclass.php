<?php
class registrationclass
{
var $NameTitle1;
var $FirstName1;
var $LastName1;
var $EmailId1;
var $Password1;
var $DateofBirth1;
var $MobileNumber1;
var $PhoneNumber1;
var $Country1;
var $State1;
var $PinCode1;
var $PassportNo1;
var $PassportExpiryDate1;
var $PassportIssuingCountry1;
var $PassportName1;
var $Position1;
var $FrequentFlyer1;
var $FrequentFlyerAirline1;
var $FrequentFlyerNumber1;
var $message;

function insertdata($NameTitle,$FirstName,$LastName,$EmailId,$Password,$DateofBirth,$MobileNumber,$PhoneNumber,
$Country,$State,$PinCode,$PassportNo,$PassportExpiryDate,$PassportIssuingCountry,$PassportName,$Position,
$FrequentFlyer,$FrequentFlyerAirline,$FrequentFlyerNumber)                            )
{
$this->NameTitle1=$NameTitle;
$this->FirstName1=$FirstName;
$this->LastName1=$LastName;
$this->EmailId1=$EmailId;
$this->Password1=$Password;
$this->DateofBirth1=date('Y-m-d',strtotime($DateofBirth));
$this->MobileNumber1=$MobileNumber;
$this->PhoneNumber1=$PhoneNumber;
$this->Country1=$Country;
$this->State1=$State;
$this->Pincode1=$Pincode;
$this->PassportNo1=$PassportNo;
$this->PassportExpiryDate1=date('Y-m-d',strtotime($PassportExpiryDate));
$this->PassportIssuingCountry1=$PassportIssuingCountry;
$this->PassportName1=$PassportName;
$this->Position1=$Position;
$this->FrequentFlyer1=$FrequestFlyer;
$this->FrequentFlyerAirline1=$FrequentFlyerAirline;
$this->FrequentFlyerNumber1=$FrequentFlyerNumber;

$queryinsert="insert into registrationtable (NameTitle,FirstName,LastName,EmailId,Password,DateofBirth,
MobileNumber,PhoneNumber,Country,State,PinCode,PassportNo,PassportExpiryDate,PassportIssuingCountry,PassportName,Position,
FrequentFlyer,FrequentFlyerAirline,FrequentFlyerNumber) values('".$this->NameTitle1."','".
$this->FirstName1."','".$this->LastName1=$LastName."','".$this->EmailId1."','".$this->Password1."','".$this->DateofBirth1
"','".$this->MobileNumber1."','".$this->PhoneNumber1."','".$this->Country1."','".$this->State1."','".$this->Pincode1."','".
$this->PassportNo1."','".$this->PassportExpiryDate1"','".$this->PassportIssuingCountry1."','".$this->PassportName1."','".
$this->Position1."','".$this->FrequentFlyer1."','".$this->FrequentFlyerAirline1."','".$this->FrequentFlyerNumber1."')";

	if (mysql_query($queryinsert))
	{
	$this->message="successful";
	return $this->message;
	}	
	else
	{
	$this->message="Error"; 
	return $this->message;
	}

}

}
?>