<?php
include("dbconfig.php");

class dbclass
{
var $conn;

function connect()
{
$this->conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,'3306','') or  die ("Error in query: $query. ".mysqli_error());
return $this->conn;
}

function close()
{
mysqli_close($this->conn);
return $conn;
}


}

?>