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
    <input type="text" name="UserKey">
  </label> <br>
  <label>
  <input type="submit" value="Logg Inn" name="LogVal"> <br>
</form>
</body>
</html>