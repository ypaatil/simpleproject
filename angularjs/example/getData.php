<?php 

$connection = mysqli_connect( 'localhost', 'root', '' );
if ( !$connection ) {
    die( 'Database Connection Failed' . mysqli_error( $connection ) );
}
$select_db = mysqli_select_db( $connection, 'test' );
if ( !$select_db ) {
    die( 'Database Selection Failed' . mysqli_error( $connection ) );
}
$query = 'SELECT * FROM users';
$result = mysqli_query( $connection, $query );


$row[] = mysqli_fetch_array($result, MYSQLi_ASSOC);
echo json_encode($row);

 
/*
$row[] = mysqli_fetch_array($result);
 
echo  json_encode( $row );*/

	if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  