<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Table = $_GET['ID'];

	$user_query = "UPDATE TableList SET TableUserID = NULL WHERE TableID = '$Table'";
	$user_data = $tilkobling -> query($user_query);
	$remove_query = "UPDATE Queue SET QueueSolved = '1' WHERE QueueTableID = '$Table'";
	$tilkobling -> query($remove_query);
	header("Location: /Login.php/?ID=". $Table ."");
?>
