<?php
	session_start();

	$dbServer = "127.0.0.1";
	$dbUsername = "emotionsTeam";
	$dbPassword = "yeswecan";
	$dbName = "emotions";

	$username = "";
	$emoticon = "";
	$msg = "";

	$sql = "SELECT * FROM messages";

	// Create connecion to MySQL server
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

	// Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		if ($conn->query($sql) == TRUE) {
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			returnMessages($row);
		} else {
			echo $sql . "\n" . $conn->error;
		}
	}

	function returnMessages($msgs) {
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "username: " . $row["username"]. " - emoticon: " . $row["emoticon"]. " " . $row["msg"]. "<br>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}


?>