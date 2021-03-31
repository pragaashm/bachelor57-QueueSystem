<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$table_query = "SELECT TableID FROM TableList WHERE TableSessionID IS NOT NULL"; //velg alle bord som er i sessions
	$table_data = $tilkobling -> query($table_query);
	while($rad = mysqli_fetch_array($table_data)){
		$Plass = $rad["TableID"];
		$remove_query = "UPDATE TableList SET TableSessionID = NULL WHERE TableID = '$Plass'"; //fjern sessionID fra alle bord med sessionID
		$tilkobling -> query($remove_query);
		$delete_query = "DELETE FROM Queue WHERE QueueTableID = '$Plass'"; //fjern all data i køen
		$tilkobling -> query($delete_query);
	};
	$session_query = "SELECT SessionID FROM SessionList";
	$session_data = $tilkobling -> query($session_query);
	while($rad = mysqli_fetch_array($session_data)){
		$ID = $rad["SessionID"];
		$end_query = "DELETE FROM SessionList WHERE SessionID = '$ID'"; //fjern alle sessions
		$tilkobling -> query($end_query);
	};

	header("Location: /StudassLogin.html"); //redirect
?>