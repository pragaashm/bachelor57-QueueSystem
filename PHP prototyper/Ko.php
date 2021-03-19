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
    
    echo "<table>";
    echo "<tr>";
    echo "<th>";
   	echo "Kø SessionID";
   	echo "</th>";
   	echo "<th>";
   	echo "Kø Nummer";
   	echo "</th>";
   	echo "<th>";
   	echo "Bord Nummer";
   	echo "</th>";
   	echo "<th>";
   	echo "Fjern";
   	echo "</th>";
    echo "</tr>";
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
    	echo "<a href=Ko.php/?Fjern=" . $QueueTableID . "&FjernSession=". $QueueSessionID .">Fjern</a>";
    	echo "</td>";
    	echo "</tr>";
    };
?>
