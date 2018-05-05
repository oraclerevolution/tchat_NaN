<?php
session_start();
require ('functions.php');
if($_SESSION['pseudo'] == NULL) {
header('Location: index.php');
  }
    else
  {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="3;URL=5.php">
<meta charset="utf-8" />
<style>
  body{
    background:url('../image/fond.png');
  }
  center{
    color:#B57FF3;
  }
</style>
</head>
<body>
<p>
	<h2>
		<center>Connexion en cours ...<br />
			<img src="./../image/ajax-loader(2).gif" />
			<br />
			<span id="ajax">

			</span>
		</center>
	</h2>
</p>
</body>
</html>
<?php
}
?>