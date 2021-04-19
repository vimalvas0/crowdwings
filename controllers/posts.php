<?php 

$posts_json = file_get_contents('../db/files.json');

$data = json_decode($posts_json, true, 5);


$temp = [

	"username"=>"Vimal",
	"id"=>101,
	"image" =>"./circle.svg",
	"profile_link"=> "#",
	"dateCreated"=>"14 january",
	"status"=>"Student",
	"ques"=>"This is the from domd manipulation",
	"ques_options" =>[
		[
			"choice"=>"18",
			"id"=>0,
			"votes"=>0
		],
		[
			"choice"=>"5",
			"id"=>1,
			"votes"=>0
		],
		[
			"choice"=>"100",
			"id"=>2,
			"votes"=>0
		],
		[
			"choice"=>"4",
			"id"=>3,
			"votes"=>0
		]
	],
	"likes"=>5,
	"comment"=>0
	
];


// print_r($data);


array_unshift($data, $temp);

$jsonData = json_encode($data);

if(file_put_contents('../db/files.json', nl2br($jsonData)))
{
	echo 'Successfully Written to the file...';
}


echo '<pre>';
print_r($data);
echo '</pre>';



?>