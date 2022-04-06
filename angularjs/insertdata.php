<?php
 
$form_data = json_decode(file_get_contents("php://input"));

	$data = array();
	$error = array();

if(isset($form_data->username))	
{
	$post_title = $form_data->username;
}
else{
	$post_title =  NULL;	
}


if(isset($form_data->userphoto))
$userphoto = $form_data->userphoto;
else
$userphoto =  NULL;

//$file_name = $_FILES['userphoto']['name'];
$path = 'js/' . $_FILES['userphoto']['name'];  
 
move_uploaded_file( $_FILES['userphoto']['tmp_name'],  $path);

if(empty($userphoto)){
$error["userphotoerror"] = "Photo is required";	
}


if( empty($post_title))
{
 $error["post_title"] = "Post Title is required";
}

 
if(!empty($error))
{
	$data["status"] = false;
	$data["error"] = $error;
}
else
{
	$data["status"] = true;
	$data["message"] =$post_title; //"New post added successfully.";
}

echo json_encode($data);

?>