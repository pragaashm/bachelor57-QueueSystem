<!DOCTYPE html>
<?php
	$Table = $_GET["ID"];
?>
<html>
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