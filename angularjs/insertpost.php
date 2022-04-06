<?php

$form_data = json_decode(file_get_contents("php://input"));

$data = array();
 

$post_title = $form_data->name;
$data["post_title"] = $post_title;

echo json_encode($data);
 