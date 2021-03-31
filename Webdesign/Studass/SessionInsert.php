<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Plasser = $_POST["PlassValg"];
	$sessionID = $_POST["sessionID"];
	$select_query = "SELECT TableID FROM TableList WHERE TableSessionID = '$sessionID'";
	$select_data = $tilkobling -> query($select_query);
	while($rad = mysqli_fetch_array($select_data)){
		$Plass = $rad["TableID"];
		$remove_query = "UPDATE TableList SET TableSessionID = NULL WHERE TableID = '$Plass'"; //fjerner alle tidligere bord med den session
		$tilkobling -> query($remove_query);
	};
	$update_query = "UPDATE TableList SET TableSessionID = '$sessionID' WHERE TableID in ('$Plasser')"; //legger til de nye bordene
	$tilkobling -> query($update_query);

	header("Location: /StudassMain.php");
?>