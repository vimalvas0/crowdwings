<?php 


$requestPayload = file_get_contents('php://input');

$newObj = $requestPayload;

$arrObj = json_decode($newObj, true, 5);




// Get db

$current_db = file_get_contents('../db/posts.json');

$current_db_array = json_decode($current_db, true, 5);

foreach($current_db_array as $index => $value)
{
	if($value['id'] == $arrObj['id'])
	{
		unset($current_db_array[$index]);
	}
}


array_unshift($current_db_array, $arrObj);
$new_db_json = json_encode($current_db_array, JSON_PRETTY_PRINT);

if(file_put_contents('../db/posts.json', $new_db_json))
{
	echo 'Db updated';
}
else
{
	echo 'Db update failed...';
}

// echo '<pre>';
// print_r($arrObj);
// echo '</pre>';


?>