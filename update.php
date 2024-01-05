<?php

$con= mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,'3306','') or  die ("Error in query: $query. ".mysqli_error());
$dbquery="update usertable set user_role='admin' where user_name='admin'";
mysqli_query($con,$dbquery);
echo "successful";
?>