<?php require '../methods/functions.php';


if(isset($_POST['Username']) && isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password']))
{
	$username = $_POST['Username'];
	$fullname = $_POST['Name'];
	$email  = $_POST['Email'];
	$password = $_POST['Password'];
	$confirm_password = $_POST['Confirm-Password'];


	if($password != $confirm_password)
	{
		echo "Passwords do not match";
		// Header
	}

	// Hash the password
	$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
	$salt = '$thisiscrowdwingstobeginwith$';
	$hashType = $hashFormat . $salt;
	$hashPassword = crypt($password, $hashType);

	echo "$username <br>";
	echo "$fullname <br>";
	echo "$email <br>";
	echo "$hashPassword <br>";

	createUser($username, $fullname, $email, $hashPassword);

}else
{
	//header please fill the form
}


?>