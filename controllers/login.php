<?php require "../methods/functions.php"; ?>



<?php

$users = getAllUsers();

if((isset($_POST['Username'])) && isset($_POST['Password']))
{
	$username= $_POST['Username'];
	$password = $_POST['Password'];

	$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
	$salt = '$thisiscrowdwingstobeginwith$';
	$hashType = $hashFormat . $salt;
	$hashPassword = crypt($password, $hashType);


	while($row = mysqli_fetch_assoc($users))
	{
		if($row['username'] == $username && $row['password'] == $hashPassword)
		{
			// echo 'UserExists <br>';
			// echo "Name : " . $row['name'];
			$user = $row;
			break;
		}
	}

	if(!isset($user))
	{
		echo "User not found";
		// Header
	}

	session_start();

	$_SESSION['logedIn'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['message'] = 'Hi, ' . explode(" ", $user['name'])[0];

	header('Location: ../../homepage/home.php');

}else
{
	//Header
}



?>