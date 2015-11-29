<?php
	session_start();
	
	$dbServer = "127.0.0.1";
	$dbUsername = "emotionsTeam";
	$dbPassword = "yeswecan";
	$dbName = "emotions";

	$username = "";
	$password = "";

	// Create connecion to MySQL server
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

	// Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		// echo "Connected successfully\n" . $username . ", \n Pass: " . $password . "\n";
	}

	if( $_POST["username"] && $_POST["password"] ){
		$sql = "SELECT password FROM logins WHERE username='" . $username . "'";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();
		if(password_verify($password, $row["password"])) {
			$_SESSION["loggedUser"] = $username;
			header("Location: /Emotions/frontend/insertmood.html"); 
			// echo "Successful Login";
		} else {
			header("Location: /Emotions/frontend/loginfail.html");
			// echo "Failure mate";
		}
	}
?>

<!-- emotionsTeam//yeswecan-->
<!-- <input type='hidden' value = <? $_SESSION['loggedUser'] ?> name='username'><br> -->