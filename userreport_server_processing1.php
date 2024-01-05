<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'usertable';

// Table's primary key
$primaryKey = 'user_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'user_id', 'dt' => 0 ),
	array( 'db' => 'user_name',  'dt' => 1 ),
	array( 'db' => 'user_address','dt' => 2 ),
	array( 'db' => 'user_role', 'dt' => 3 ),
	array( 'db' => 'user_email','dt' => 4 ),
	array( 'db' => 'user_pass', 'dt' => 5 ),
	array( 'db' => 'User_fees_due','dt' => 6 )
	
);
// SQL server connection information
	sql_details = array(
    'user' => '2051670_db1',
    'pass' => 'mastermagic2015',
    'db'   => '2051670_db1',
    'host' => 'fdb3.awardspace.net'
);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require('datatables/examples/server_side/scripts/ssp.class.php');

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


