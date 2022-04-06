<?php

$filename = $_FILES['file']['name'];
$username = $_POST['simpletext'];

$filename2 = $_FILES['file2']['name'];
move_uploaded_file($_FILES['file2']['tmp_name'],$filename2);

$response = array();
/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$filename)){
   $response['name'] = $username; // $filename; 
} else{
   $response['name'] = "File not uploaded.";
}
echo json_encode($response);
exit;