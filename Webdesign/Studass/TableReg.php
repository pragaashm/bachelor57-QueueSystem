<!DOCTYPE html>
<html>
<style>
<?php include'Studass.css'; ?>
</style>
<head>
  <title></title>
</head>
<body>
<form method="POST" action="/SessionInsert.php">
  <div>fagkode?</div>
  <div>start/slutt?</div>
  <input type="hidden" name="sessionID" <?php echo "value = '". $sessionID ."'"; ?>>
  <input type="text" id="PlassValgBoks" name="PlassValg"><br>
  <input type="submit" value="Velg Seter" > <br>
</form>
<div class="Selector">
<input type="button" class="Sel" id="37" value="37">
<input type="button" class="Sel" id="38" value="38">
__________________________________________________
<input type="button" class="Sel" id="39" value="39">
<input type="button" class="Sel" id="40" value="40"><br><br>

<input type="button" class="Sel" id="36" value="36">
<input type="button" class="Sel" id="35" value="35">
<input type="button" class="Sel" id="34" value="34">
<input type="button" class="Sel" id="33" value="33">
_________________________
<input type="button" class="Sel" id="45" value="45">
<input type="button" class="Sel" id="44" value="44">
<input type="button" class="Sel" id="43" value="43">
<input type="button" class="Sel" id="42" value="42">
<input type="button" class="Sel" id="41" value="41"><br>

<input type="button" class="Sel" id="29" value="29">
<input type="button" class="Sel" id="30" value="30">
<input type="button" class="Sel" id="31" value="31">
<input type="button" class="Sel" id="32" value="32">
_________________________
<input type="button" class="Sel" id="46" value="46">
<input type="button" class="Sel" id="47" value="47">
<input type="button" class="Sel" id="48" value="48">
<input type="button" class="Sel" id="49" value="49">
<input type="button" class="Sel" id="50" value="50"><br><br>

<input type="button" class="Sel" id="28" value="28">
<input type="button" class="Sel" id="27" value="27">
<input type="button" class="Sel" id="26" value="26">
<input type="button" class="Sel" id="25" value="25">
_________________________
<input type="button" class="Sel" id="56" value="56">
<input type="button" class="Sel" id="55" value="55">
<input type="button" class="Sel" id="54" value="54">
<input type="button" class="Sel" id="53" value="53">
<input type="button" class="Sel" id="52" value="52">
<input type="button" class="Sel" id="51" value="51"><br>

<input type="button" class="Sel" id="21" value="21">
<input type="button" class="Sel" id="22" value="22">
<input type="button" class="Sel" id="23" value="23">
<input type="button" class="Sel" id="24" value="24">
_________________________
<input type="button" class="Sel" id="57" value="57">
<input type="button" class="Sel" id="58" value="58">
<input type="button" class="Sel" id="59" value="59">
<input type="button" class="Sel" id="60" value="60">
<input type="button" class="Sel" id="61" value="61">
<input type="button" class="Sel" id="62" value="62"><br><br>

<input type="button" class="Sel" id="20" value="20">
<input type="button" class="Sel" id="19" value="19">
<input type="button" class="Sel" id="18" value="18">
<input type="button" class="Sel" id="17" value="17">
_________________________
<input type="button" class="Sel" id="68" value="68">
<input type="button" class="Sel" id="67" value="67">
<input type="button" class="Sel" id="66" value="66">
<input type="button" class="Sel" id="65" value="65">
<input type="button" class="Sel" id="64" value="64">
<input type="button" class="Sel" id="63" value="63"><br>

<input type="button" class="Sel" id="13" value="13">
<input type="button" class="Sel" id="14" value="14">
<input type="button" class="Sel" id="15" value="15">
<input type="button" class="Sel" id="16" value="16">
_________________________
<input type="button" class="Sel" id="69" value="69">
<input type="button" class="Sel" id="70" value="70">
<input type="button" class="Sel" id="71" value="71">
<input type="button" class="Sel" id="72" value="72">
<input type="button" class="Sel" id="73" value="73">
<input type="button" class="Sel" id="74" value="74"><br><br>

<input type="button" class="Sel" id="12" value="12">
<input type="button" class="Sel" id="11" value="11">
<input type="button" class="Sel" id="10" value="10">
<input type="button" class="Sel" id="9" value="9">
<input type="button" class="Sel" id="8" value="8">
_________________________
<input type="button" class="Sel" id="75" value="75">
<input type="button" class="Sel" id="76" value="76">
<input type="button" class="Sel" id="77" value="77">
<input type="button" class="Sel" id="78" value="78">
<input type="button" class="Sel" id="79" value="79">
<input type="button" class="Sel" id="80" value="80"><br>

<input type="button" class="Sel" id="3" value="3">
<input type="button" class="Sel" id="4" value="4">
<input type="button" class="Sel" id="5" value="5">
<input type="button" class="Sel" id="6" value="6">
<input type="button" class="Sel" id="7" value="7">
_________________________
<input type="button" class="Sel" id="81" value="81">
<input type="button" class="Sel" id="82" value="82">
<input type="button" class="Sel" id="83" value="83">
<input type="button" class="Sel" id="84" value="84">
<input type="button" class="Sel" id="85" value="85">
<input type="button" class="Sel" id="86" value="86"><br><br>

<input type="button" class="Sel" id="2" value="2">
<input type="button" class="Sel" id="1" value="1">
__________________________________________________
<input type="button" class="Sel" id="88" value="88">
<input type="button" class="Sel" id="87" value="87"><br>
</div>
</body>
<?php
    $tilkobling = mysqli_connect("localhost","Andy","Halla123","Backend");

    if ($tilkobling -> connect_errno) {
      echo "Failed to Connect:" . $tilkobling -> connect_errno;
    };
    $sessionID = $_GET["ID"];
    $SeatSQL = "SELECT TableID, TableSessionID FROM TableList WHERE TableSessionID IS NOT NULL"; //Henter listen over bord som allerede er med i en session
    $data = $tilkobling -> query($SeatSQL);
    echo "<script type='text/javascript'>";
    echo "var Vals = [];";
    while($rad = mysqli_fetch_array($data)){
    $TableID = $rad["TableID"];
    $tableSessionID = $rad["TableSessionID"];
    if ($tableSessionID != $sessionID) {
     echo "document.getElementById('".$TableID."').disabled = true;"; //Skrur av knappenen for bord som allerede er med i session
    }else{
      echo "Vals.push('". $TableID ."');";
    };
  };
  echo "</script>";

?>
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
    $(document).ready(function(){
      for (var i = Vals.length - 1; i >= 0; i--) { // skal preloade alle bord som du allerede har registert før på deg. funksjonen fungerer. bare får den ikke til å aktivere automatisk
        document.getElementById(Vals[i]).click();
      }
    });
</script>
</html>
