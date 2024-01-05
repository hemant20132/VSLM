<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'cdtable';

// Table's primary key
$primaryKey = 'CDNumber';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
	array( 'db' => 'CDNumber', 'dt' => 'CDNumber' ),
	array( 'db' => 'Title',  'dt' => 'Title' ),
	array( 'db' => 'Artist',   'dt' => 'Artist' ),
	array( 'db' => 'Composer',     'dt' => 'Composer' ),
	array(
		'db'        => 'Cdentrydt',
		'dt'        => 'Cdentrydt',
		'formatter' => function( $d, $row ) {
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
	array(
		'db'        => 'Date_Rented',
		'dt'        => 'Date_Rented',
		'formatter' => function( $d, $row ) {
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
	array(
		'db'        => 'Due_Date',
		'dt'        => 'Due_Date',
		'formatter' => function( $d, $row ) {
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
    array( 'db' => 'available',     'dt' => 'available' )	
);


$sql_details = array(
    'user' => 'epiz_33239466',
    'pass' => 'Horizon2022',
    'db'   => 'epiz_33239466_new',
    'host' => 'sql211.epizy.com'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);







