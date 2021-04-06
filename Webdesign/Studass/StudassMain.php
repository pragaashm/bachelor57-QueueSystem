<?php
    $tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

    if ($tilkobling -> connect_errno) {
        echo "Failed to connect:" . $tilkobling -> connect_error;
    };

    $FjernID = $_GET['Fjern'];
    $FjernSessionID = $_GET['FjernSession'];

    if(isset($FjernID)){ //Henter og setter slik at Hjelp på bordet er gitt.
        $fjernSql = "UPDATE Queue SET QueueSolved = '1' WHERE QueueTableID = '$FjernID' AND QueueSessionID = '$FjernSessionID'";
        $tilkobling->query($fjernSql);
        echo(mysqli_error($tilkobling));
    };
    $queueSql = "SELECT QueueSessionID, QueueTableID FROM Queue WHERE QueueSolved = '0' ORDER BY QueueSessionID ASC, QueueTimeStamp ASC"; //Henter alle bord som trenger hjelp og sorterer de med hensyn til Session og Tid

    $queueData = $tilkobling -> query($queueSql);
?>
<!DOCTYPE html>
<html>
<style>
<?php include'Studass.css'; ?>
</style>
<body class="mainBody">
<table class='QueueClass'> 
    <tr> 
    <th>Kø SessionID</th> 
    <th>Kø Nummer</th> 
    <th>Bord Nummer</th>
    <th>Fjern</th> 
    </tr> 
<?php
    $QueueNumber = 1;
    $LastSessionID = "";
    while($rad = mysqli_fetch_array($queueData)){ //Skriver ut dataen som hentes ettehvert som den blir sendt. slipper å bruke loops
    $QueueSessionID = $rad["QueueSessionID"];
    $QueueTableID = $rad["QueueTableID"];
        echo "<tr>";
        echo "<td>";
        echo $QueueSessionID;
        echo "</td>";
        echo "<td>";
        if ($LastSessionID == $QueueSessionID OR $LastSessionID == ""){
            echo $QueueNumber;
            $QueueNumber++;
        }else{
        $QueueNumber = 1;
        echo $QueueNumber;
        $QueueNumber++;
      };
      $LastSessionID = $QueueSessionID;
        echo "</td>";
        echo "<td>";
        echo $QueueTableID;
        echo "</td>";
        echo "<td>";
        echo "<a href=/StudassMain.php/?Fjern=" . $QueueTableID . "&FjernSession=". $QueueSessionID .">Fjern</a>";
        echo "</td>";
        echo "</tr>";
    };
?>
</table>
<div class="accountForm" id="accountVer">
<form method="post" action="/StudassLoginAction.php">
    <label><strong>Logg inn for å skape eller endre sessions</strong></label><br> 
    <label>
    Brukernavn
    <input type="text" name="UserName">
  </label>
  <label>
    Passord   
    <input type="password" name="UserPwd">
  </label>
  <label>
  <input type="submit" value="Logg Inn">
  </label>
</form>
<button onclick="goBack();">Lukk Login</button>
</div>
<button class="ChangeSession" onclick="ChangeSession()">Endre Session</button>
<button class="LogOut" onclick="LogOut()">Avslutt Sessions</button>
<div class="SeatMap"></div>
</body>
</html>
<script type="text/javascript">
    function ChangeSession(){
        document.getElementById("accountVer").style.display = "block";
    };
    function goBack(){
        document.getElementById("accountVer").style.display = "none";
    };
    function LogOut(){
        if (confirm("Avslutte? OBS: Dette vil slette alle aktive sessions og den aktive køen. Ønsker du låse opp bord, bruk Endre Session")) {
            location.href = "/ExitSessions.php";
        };
    };
</script>