<!DOCTYPE html>
<?php
	$Table = $_GET["ID"]; // Hvert bord vil ha ett bordnummer som legges i URL via startopp program
?>
<html>
<style>
<?php include'RasPi.css'; ?>
</style>
<head>
</head>
<body>
<form method="post" action="/LoginAction.php">
    <input type="hidden" value = "<?php echo $Table; ?>" name="TableID">
  <label>
    Key <br>
    <input type="password" name="UserKey" id="input">
  </label> <br>
  <label>
  <input type="submit" value="Logg Inn" name="LogVal"> <br>
</form>
</body>
</html>
<script type="text/javascript">
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
</script>