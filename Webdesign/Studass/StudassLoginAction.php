<?php
	$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

	if ($tilkobling -> connect_errno) {
		echo "Failed to connect:" . $tilkobling -> connect_error;
	};

	$UserName = $_POST["UserName"];
	$Password = $_POST["UserPwd"];

	$user_query = "SELECT UserLevel, UserID FROM UserCred WHERE UserName = '$UserName' AND UserKey = '$Password'";
	$user_data = $tilkobling -> query($user_query);
	$user_data_array = mysqli_fetch_array($user_data);
	$userID = $user_data_array["UserID"];

	$session_query = "SELECT SessionID FROM SessionList WHERE SessionUserID = '$userID'";
	$session_data = $tilkobling -> query($session_query);
	$session_data_array = mysqli_fetch_array($session_data);
	$sessionID = $session_data_array["SessionID"];


	if (isset($sessionID)) {
		header("Location: /TableReg.php/?ID=". $sessionID .""); //hvis man har session id send de til bordregistrering
	}else{
		if ($user_data_array["UserLevel"] > 1) {
			$data = "INSERT INTO SessionList(SessionUserID) VALUES ($userID)";
			$tilkobling -> query($data);
			$session_query = "SELECT SessionID FROM SessionList WHERE SessionUserID = '$userID'"; //ellers lag session og send de videre
			$session_data = $tilkobling -> query($session_query);
			$session_data_array = mysqli_fetch_array($session_data);
			$sessionID = $session_data_array["SessionID"];
			header("Location: /TableReg.php/?ID=". $sessionID ."");
		}else{
			echo "No user with that key exists";
			echo "<button onclick='Back()'>Tilbake</button>"; //brukeren har ikke tilgang.
		};
	};
?>
<script type="text/javascript">
	function Back(){
		location.href = "/StudassLogin.html";
	};
</script>