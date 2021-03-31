<?php 
$Table = $_GET['ID'];
$tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

if ($tilkobling -> connect_errno) {
	echo "Failed to connect:" . $tilkobling -> connect_error;
};

$user_query = "SELECT TableUserID FROM TableList WHERE TableID = '$Table'";
$user_data = $tilkobling -> query($user_query);
$user_data_array = mysqli_fetch_array($user_data);
$UserID = $user_data_array["TableUserID"];
$name_query = "SELECT UserName FROM UserCred WHERE UserID = '$UserID'";
$name_data = $tilkobling -> query($name_query);
$name_data_array = mysqli_fetch_array($name_data);
$Name = $name_data_array["UserName"];
$queueCheck = "SELECT QueueSolved FROM Queue WHERE QueueTableID = '$Table'";
$queueCheckData = $tilkobling -> query($queueCheck);
$row = mysqli_fetch_array($queueCheckData); 
$Check = $row["QueueSolved"];
if ($Check == 1) {
	header("Location: /main.php/?ID=". $Table .""); //hvis studass har fjernet deg fra køen eksternt så blir du tatt tilbake til main
};
$queueSql = "SELECT QueueSessionID, QueueTableID FROM Queue WHERE QueueSolved = '0' ORDER BY QueueSessionID ASC, QueueTimeStamp ASC";
$queueData = $tilkobling -> query($queueSql);
?>
<!DOCTYPE html>
<script>
function LogOut(){
	if(confirm("Logg ut?")){
		location.href = "/LogOff.php/?ID=<?php echo $Table; ?>";
	};
}
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  m = checkTime(m);
  document.getElementById('clock').innerHTML =
  h + ":" + m;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<style>
<?php include'RasPi.css'; ?>
</style>
<html>
<body onload="startTime()">
<element class ="Header">
	<img src="https://www.countryflags.com/wp-content/uploads/norway-flag-png-large.png" height="120px">
	<element class="info1">
		Time: <div width = "40px"id="clock"></div> <br>
		BordNummer: <?php echo $Table; ?>
	</element>
	<element class="info2">
		Navn: <?php echo $Name; ?>
	</element>
	<element class="Logout">
		<img src="https://image.flaticon.com/icons/png/512/25/25706.png" onClick="LogOut()" height="120px">
	</element>
</element>
<element class="Interact">
	<element class="Interact1">
		<?php
		$count = 0;
		while($rad = mysqli_fetch_array($queueData)){ //printer ut plass i køen ved hjelp av while og if
			$QueueTableID = $rad["QueueTableID"];
			if ($QueueTableID != $Table) {
				$count++;
			}else{
				echo "Din plass i køen er: ". ++$count ."";
			};
		}
		?>
	</element>
	<form method="GET" class="Interact2" action="/RemoveQueue.php">
		<input type="hidden" name="ID" value="<?php echo $Table ?>">
       <input type="submit" value="Trekk deg fra kø" />
     </form>
</element>
</body>
</html>