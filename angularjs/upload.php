<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

//$form_data = json_decode(file_get_contents("php://input"));
$username = $_POST['username'];
/*; Location */
$location = 'upload/';

$response = array();
/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename)){
   $response['name'] = $username;//  $filename; 
} else{
   $response['name'] = "File not uploaded.";
}
echo json_encode($response);

exit(0);

echo 'Best Code';
echo 'Changes from localhost';
