<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
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
$table = 'vista_detalle_prehorario';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'id_materia',  'dt' => 1 ), 
	array( 'db' => 'dia', 'dt' => 2 ),
	array( 'db' => 'hora', 'dt' => 3),
	array( 'db' => 'id_grupo', 'dt' => 4),
	array( 'db' => 'id_usuario', 'dt' => 5),
	array( 'db' => 'id_profesor', 'dt' => 6),
	array( 'db' => 'grupo', 'dt' => 7),
	array( 'db' => 'materia', 'dt' => 8),
	array( 'db' => 'profesor', 'dt' => 9),
/* 	array(
		'db'        => 'start_date',
		'dt'        => 4,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 5,
		'formatter' => function( $d, $row ) {
			return '$'.number_format($d);
		}
	) */
);

// SQL server connection information
include_once '../database/credenciales.php';
$sql_details = $credenciales_db;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../database/ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);


