<?php
	session_start();

	$dbServer = "127.0.0.1";
	$dbUsername = "emotionsTeam";
	$dbPassword = "yeswecan";
	$dbName = "emotions";

	$username = "";
	$emoticon = "";
	$msg = "";

	$sql = "REPLACE INTO messages (username, emoticon, msg) VALUES ('";

	// Create connecion to MySQL server
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

	// Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$username = $_SESSION["loggedUser"];
		$emoticon = $_POST["emoticon"];
		$msg = $_POST["msg"];
		
		$sql = $sql . $username . "', '" . $emoticon . "', '" . $msg . "')";
		if ($conn->query($sql) == TRUE) {
			header("Location: /emotions/mariza/viz1.html"); 
		} else {
			echo $sql . "\n" . $conn->error;
		}
	}


?>