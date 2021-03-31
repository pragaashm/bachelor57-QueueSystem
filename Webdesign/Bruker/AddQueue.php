<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Table = $_GET['ID'];

	$queue_query = "SELECT QueueSolved FROM Queue WHERE QueueTableID = '$Table'";
	$queue_data = $tilkobling -> query($queue_query);
	$queue_data_array = mysqli_fetch_array($queue_data);
	if (isset($queue_data_array["QueueSolved"])) {
		$reset_query = "UPDATE Queue SET QueueSolved = '0' WHERE QueueTableID = '$Table'"; //hvis bordet eksisterer. sett det i kø
		$tilkobling -> query($reset_query);
	}else{
		$insert_query = "INSERT INTO Queue(QueueTableID) VALUES ('$Table')"; //ellers sett inn bordet. all annen info kommer automatisk
		$tilkobling -> query($insert_query);
	};
	header("Location: /InQueue.php/?ID=". $Table ."");
?>