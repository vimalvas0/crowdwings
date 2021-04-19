<?php


$allPosts = [
	'name' => 'Vimal',
	'votes' => [
		'count' => 1,
		'doneBy' => 'username'
	]
];


$jsonPosts = json_encode($allPosts);


// echo '<pre>';
// print_r($jsonPosts);
// echo '</pre>';


$jsonObj = file_get_contents('./files.json');

$ass_array = json_decode($jsonObj, true, 5);

echo $ass_array[0]['name'] . '<br>';


echo $ass_array[0]['votes']['doneBy'];


$json = json_encode($ass_array);






echo '<pre>';
print_r($ass_array);
echo '</pre>';



?>