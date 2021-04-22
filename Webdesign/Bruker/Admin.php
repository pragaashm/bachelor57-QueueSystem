<!DOCTYPE html>
<html>
<?php
  $Table = $_GET["ID"]; // Hvert bord vil ha ett bordnummer som legges i URL via startopp program
?>
<head>
</head>
<body>
<strong>Skriv inn navn først. Deretter scan kort</strong><br>
<form method="post" action="/Reg.php">
  <input type="hidden" name="ID" value="<?php echo $Table ?>">
  <label>
    Navn <br>
    <input type="text" name="UserName">
  </label> <br>
  <label>
    Key <br>
    <input type="text" name="UserKey" id="input">
  </label> <br>
  <input type="submit" name="Submit"> <br>
</form>
<br><button onclick='Back()'>Tilbake</button>
</body>
</html>
<script>
  window.addEventListener("keydown", function (event) { 
  if (event.defaultPrevented) {
    return; // Do nothing if the event was already processed
  }
    switch (event.key) {
      case "Control":
        document.getElementById('input').focus();
        break;
      default:
        return; // Quit when this doesn't handle the key event.
    }
  // Cancel the default action to avoid it being handled twice
  event.preventDefault();
}, true);
// the last option dispatches the event to the listener first,
// then dispatches event to window
  function Back(){
    location.href = "/Login.php/?ID=<?php echo $Table; ?>";
  };
</script>