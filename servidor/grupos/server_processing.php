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
$table = 'vista_alumnos';

// Table's primary key
$primaryKey = 'id';
$id_grupo = $_GET['id_grupo'];
$where = "estatus = 1 AND id_grupo = '$id_grupo'";

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'nombre',  'dt' => 1 ), 
	array( 'db' => 'apellido_paterno', 'dt' => 2 ),
	array( 'db' => 'apellido_materno', 'dt' => 3 ),
	array( 'db' => 'fecha_cumple', 'dt' => 4 ),
	array( 'db' => 'sexo',  'dt' => 5 ),
	array( 'db' => 'pais',   'dt' => 6 ),
	array( 'db' => 'estado',   'dt' => 7 ),
	array( 'db' => 'ciudad',   'dt' => 8 ),
	array( 'db' => 'telefono',   'dt' => 9 ),
	array( 'db' => 'telefono_casa',   'dt' => 10 ),
	array( 'db' => 'correo',   'dt' => 11 ),
	array( 'db' => 'nombre_iglesia',   'dt' => 12 ),
	array( 'db' => 'nombre_pastor',   'dt' => 13 ),
	array( 'db' => 'telefono_pastor',   'dt' => 14 ),
	array( 'db' => 'curso_interes',   'dt' => 15 ),
	array( 'db' => 'fecha_registro',   'dt' => 16 ),
	array( 'db' => 'hora_registro',   'dt' => 17 ),
	array( 'db' => 'id_solicitud',   'dt' => 18 )
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
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);


