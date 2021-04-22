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
  header("Location: /main.php/?ID=". $Table .""); // sender deg tilbake til main om studass fjernet deg fra køen
}elseif (!isset($UserID)) {
  header("Location: /Login.php/?ID=". $Table .""); //kaster brukeren ut om studass logger alle av
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
function startTime() { //klokkefunksjon, ikke bygd selv
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  m = checkTime(m);
  document.getElementById('clock').innerHTML =
  h + ":" + m;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  
  return i;
}
</script>
<style>
<?php include'RasPi.css'; ?>
</style>
<html>
<body onload="startTime()">
<element class ="Header">
	<img src="../Norge.png" height="120px">
	<element class="info1">
		Time: <div width = "40px"id="clock"></div> <br>
		BordNummer: <?php echo $Table; ?>
	</element>
	<element class="info2">
		Navn: <?php echo $Name; ?>
	</element>
	<element class="Logout">
      <input type="image" src="../LoggAv.png" id="1" onclick="LogOut()" height="120px" />
  </element>
</element>
<element class="Interact">
	<element class="Interact1">
		<?php
		$count = 0;
		while($rad = mysqli_fetch_array($queueData)){ 
			$QueueTableID = $rad["QueueTableID"];
			if ($QueueTableID != $Table) { //skriven plassen din i kø. bruker index i tables så 0 --> 1 i køen og dermed øke med 1
				$count++;
			}else{
				echo "Din plass i køen er: ". ++$count ."";
			};
		}
		?>
	</element>
	<form method="GET"  action="/RemoveQueue.php">
		<input type="hidden" name="ID" value="<?php echo $Table ?>">
       <input class="Interact2" id="0" type="submit" value="Trekk deg fra kø" />
     </form>
</element>
</body>
</html>
<script type="text/javascript">
var loc = 0; // 0 = kø knapp 1 = logg av knapp
document.getElementById('0').focus();
window.addEventListener("keydown", function (event) {
  if (event.defaultPrevented) {
    return; // Do nothing if the event was already processed
  }
    switch (event.key) {
      case "ArrowDown":
        document.getElementById('0').focus();
        loc = 0;
        break;
      case "ArrowUp":
        document.getElementById('1').focus();
        loc = 1;
        break;
      default:
        return; // Quit when this doesn't handle the key event.
    }

  // Cancel the default action to avoid it being handled twice
  event.preventDefault();
}, true);
// the last option dispatches the event to the listener first,
// then dispatches event to window
setTimeout(function(){
   window.location.reload(1); //Refresher siden hvert 15 sekund
}, 15000);
</script>