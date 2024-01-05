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
$table = 'rentcdtable';
// Table's primary key
$primaryKey = 'RentCDNumber';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'RentCdNumber', 'dt' => 0),
	array( 'db' => 'MembershipId','dt' => 1),
	array( 'db' => 'RentCDTitle','dt' => 2),
	array( 'db' => 'RentCDArtist', 'dt' => 3),
	array( 'db' => 'RentCDComposer', 'dt' => 4),
	array( 'db'=> 'RentCDDt','dt'=> 5,	'formatter' => function( $d, $row )
	{
			if ($d=="0000-00-00")
		   {
			$d="--";   
			return $d;
		   }
		   else
		   {
			return date( 'jS M y', strtotime($d));
		   }

	}
	),
	array( 'db'=> 'RentCDDueDt','dt'=> 6,	'formatter' => function( $d, $row )
	{
			if ($d=="0000-00-00")
		   {
			$d="--";   
			return $d;
		   }
		   else
		   {
			return date( 'jS M y', strtotime($d));
		   }
	}
	)
	
	
);

// SQL server connection information
$sql_details = array(
    'user' => 'epiz_33239466',
    'pass' => 'Horizon2022',
    'db'   => 'epiz_33239466_database',
    'host' => 'sql1211.epizy.com'
);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


