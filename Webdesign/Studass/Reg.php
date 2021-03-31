<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	

	$Key = $_POST["UserKey"];
	$A_Key = $_POST["AdminKey"];
	$Name = $_POST["UserName"];
	$A_Name = $_POST["AdminName"];
	$Level = $_POST["UserLevel"];

	$ver = "SELECT UserLevel FROM UserCred WHERE UserKey = '$A_Key' AND UserName = '$A_Name'";
	$ver_data = $tilkobling -> query($ver);
	$data_array = mysqli_fetch_array($ver_data);
	if($data_array["UserLevel" == 3] AND $Name AND $Level AND $Key){
		$data = "INSERT INTO UserCred (UserKey,UserLevel,UserName) VALUES ('$Key','$Level','$Name')"; //hvis brukeren har riktige tilganger. legg inn ny bruker i databasen.
		$ver_data = $tilkobling -> query($data);
		echo "Følgende navn lagt inn:" . $Name ."Med nivå" . $Level;
	}else{
		echo "Ingenting ble lagt inn. prøv på nytt";
	};
?>
