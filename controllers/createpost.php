<?php require "../methods/functions.php";

session_start();
// Got new create post request...




// 1 Create unique post id, post question, and option array
$rId = random_bytes(32);
$postId = bin2hex($rId);

$question = $_POST['ques'];

$options =[];

// Calculate the options array : 
$i = 1;
while(isset($_POST["choice$i"]))
{
	$options[] = $_POST["choice$i"];
	$i++;
}


// 2 Calculate the post's user
$username = $_SESSION['username'];


// 3 Calculate the post's time
$today = date("F j, Y, g:i a");  
$date = strstr($today, ',', true) . ' 2021';



// 4 Set up basic template
$temp = [
	"username"=>"$username",
	"id"=>"$postId",
	"image" =>"./circle.svg",
	"profile_link"=> "#",
	"dateCreated"=>"$date",
	"status"=>"Student",
	"ques"=>"$question",
	"ques_options" =>[],
	"likes"=>0,
	"comment"=>0,
	"topic"=>""
];


for($i = 0; $i < sizeof($options); $i++)
{
	$temp['ques_options'][] = [
		"choice"=>$options[$i],
		"id"=>$i,
		"votes"=>0
	];
}



$jsonPost = json_encode($temp, JSON_PRETTY_PRINT);


echo '<pre>';
echo print_r($jsonPost);
echo '</pre>';



savePost($temp);

// if(isset($_POST['ques']))
// {
// 	echo $_POST['ques'] . '<br>';
// }

?>