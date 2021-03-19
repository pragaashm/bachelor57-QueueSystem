<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<input type="text" id="PlassValgBoks" name=""><br>
<input type="button" class="Sel" id="1" value="1">
<input type="button" class="Sel" id="2" value="2">
<input type="button" class="Sel" id="3" value="3"><br>
<input type="button" class="Sel" id="4" value="4">
<input type="button" class="Sel" id="5" value="5">
<input type="button" class="Sel" id="6" value="6"><br>
<input type="button" class="Sel" id="7" value="7">
<input type="button" class="Sel" id="8" value="8">
<input type="button" class="Sel" id="9" value="9"><br>
<input type="button" class="Sel" id="10" value="10">
<input type="button" class="Sel" id="11" value="11">
<input type="button" class="Sel" id="12" value="12"><br>
<input type="button" class="Sel" id="13" value="13">
<input type="button" class="Sel" id="14" value="14">
<input type="button" class="Sel" id="15" value="15"><br>
</body>
<script type="text/javascript">
  // Systemet er lagd slik at man kan bare legge til flere knapper hvor verdiene er i samsvar med setenummereringen i databasen og at de har class = "Sel" så vil det fungere.
  var Plass = document.getElementsByClassName('Sel'); // Finner alle knappene som skal brukes for valg av seter
  var PlassSel = []; // Lager en tom rad for å midlertidelig lagre dataen

  for (let i = 0, l = Plass.length; i <= l; i++) { // Lager plass i raden og styringsfunksjon ValgSete() for hver knapp
    PlassSel[i] = 0;
      Plass[i].addEventListener('click', function VelgSete() {
    Sete = Plass[i].id;
    if (PlassSel[Sete] == 0 ){
      PlassSel[Sete] = 1;
      Plass[i].style.backgroundColor = "#7FFF00";

    } else if (PlassSel[Sete] == 1) {
      PlassSel[Sete] = 0;
      Plass[i].style.backgroundColor = "#FFFFFF";
    };
    let LocString = "";
      var LocPlassSel = PlassSel.slice(); // lager lokale verdier for å ikke ødelegge brukerens valg
      var CurrentIndex = PlassSel.indexOf(1);
      while(CurrentIndex != -1){
        LocString = LocString + CurrentIndex;
        LocPlassSel[CurrentIndex] = 0; // bygger string som skal inn i php form og legger inn dynamisk
        CurrentIndex = LocPlassSel.indexOf(1);
        if (CurrentIndex != -1) {
          LocString = LocString + ",";
        };
      };
      document.getElementById('PlassValgBoks').value = LocString; 
      });
    };
</script>
</html>
<?php
    session_start();
    $tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

    if ($tilkobling -> connect_errno) {
      echo "Failed to Connect:" . $tilkobling -> connect_errno;
    };

    $SeatSQL = "SELECT TableID, TableSessionID FROM TableList WHERE TableSessionID IS NOT NULL"; //Henter listen over bord som allerede er med i en session
    $data = $tilkobling -> query($SeatSQL);

    while($rad = mysqli_fetch_array($data)){
    $TableID = $rad["TableID"];
    echo "<script type='text/javascript'> 
      document.getElementById('".$TableID."').disabled = true; 
    </script>"; //Skrur av knappenen for bord som allerede er med i session
    };

?>