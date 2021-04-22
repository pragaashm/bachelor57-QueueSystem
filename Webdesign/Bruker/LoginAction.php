<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$Table = $_POST["TableID"];
	$Key = $_POST["UserKey"];

	$user_query = "SELECT UserLevel, UserName, UserID FROM UserCred WHERE UserKey = '$Key'"; //sjekk at brukeren eksisterer og hent id
	$user_data = $tilkobling -> query($user_query);
	$user_data_array = mysqli_fetch_array($user_data);
	$userID = $user_data_array["UserID"];

	$table_query = "SELECT TableUserID FROM TableList WHERE TableID = '$Table'"; //sjekk at det ikke er noen på det bordet allerede
	$table_data = $tilkobling -> query($table_query);
	$table_data_array = mysqli_fetch_array($table_data);
	$table_userID = $table_data_array["TableUserID"]; 


	if (isset($table_userID)) {
		echo "That table is occupied, or table number:" . $Table . " does not exist"; 
		echo "<button onclick='Back()'>Tilbake</button>";
	}else{
		if ($user_data_array["UserLevel"] = 3) {
			header("Location: /admin.php/?ID=". $Table ."");
		}elseif ($user_data_array["UserLevel"] > 0 AND isset($user_data_array["UserName"])) { // kan evt byttes ut med ENUM
			$data = "UPDATE TableList SET TableUserID = $userID WHERE TableID = '$Table'"; //sett deg på bordet
			$tilkobling -> query($data);
			header("Location: /main.php/?ID=". $Table ."");
		}else{
			echo "No user with that key exists";
			echo "<button onclick='Back()'>Tilbake</button>";
		};
	};
?>
<script type="text/javascript">
	function Back(){
		location.href = "/Login.php/?ID=<?php echo $Table; ?>";
	};
</script>