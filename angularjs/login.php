<?php
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;

 echo $username;

?>