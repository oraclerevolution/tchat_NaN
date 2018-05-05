<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="3;URL=./../index.php">
<meta charset="utf-8" />
<style type="text/css">
	body{
        color:#B57FF3;
        background:url('../image/fond.png');
        padding:15px;
    }
</style>
</head>
<body>
<?php
require ('functions.php');
delete_user($_SESSION['ip']);
deconnexion();
?>
<p>
	<h2>
		<center>Déconnexion en cours ...
		</center>
	</h2>
</p>
</body>
</html>