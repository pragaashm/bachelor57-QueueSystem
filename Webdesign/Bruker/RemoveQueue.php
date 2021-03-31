<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Table = $_GET['ID'];

	$remove_query = "UPDATE Queue SET QueueSolved = '1' WHERE QueueTableID = '$Table'"; //setter queuesolved = 1 slik at den fjernes fra studass sin GUI
	$tilkobling -> query($remove_query);
	header("Location: /main.php/?ID=". $Table ."");
?>