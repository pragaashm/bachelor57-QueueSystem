<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Key = $_POST["UserKey"];
	$Name = $_POST["UserName"];
	$Table = $_POST["ID"];

	$ver = "SELECT UserKey FROM UserCred WHERE UserKey = '$Key'";
	$ver_data = $tilkobling -> query($ver);
	$data_array = mysqli_fetch_array($ver_data);
	$ver_info = $data_array["UserKey"];
	if(isset($ver_info)){
	  	echo "Dette kortet er allerede registrert";
	}elseif ($Name != "" AND $Key != "") {
		$data = "INSERT INTO UserCred (UserKey,UserLevel,UserName) VALUES ('$Key','1','$Name')"; //legg inn bruker som student nivå.
		$tilkobling -> query($data);
		echo "Følgende navn lagt inn:" . $Name ."Som student";
	}else{
		echo "Ingenting ble lagt inn. prøv på nytt";
	};
	echo "<br><button onclick='Back()'>Tilbake</button>";
?>
<script type="text/javascript">
	function Back(){
		location.href = "/Admin.php/?ID=<?php echo $Table; ?>";
	};
</script>