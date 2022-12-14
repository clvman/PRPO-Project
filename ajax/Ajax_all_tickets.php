<?php
// Database connection info
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'nce_tt'
);

// DB table to use
$table = 'tickets';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.
$columns = array(
    array( 'db' => 'ticket_id', 'dt' => 0 ),
    array( 'db' => 'created_on',  'dt' => 1 ),
    array( 'db' => 'ticket_severity',      'dt' => 2 ),


    
);

// Include SQL query processing class
require( 'ssp.class.php' );

// Output data as json format
echo json_encode(
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
);