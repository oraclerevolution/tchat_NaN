<?php
require ('functions.php');
bdd_connect();
if (isset($_FILES['photo']) AND $_FILES['erro'] == 0) {
	if ($_FILES['photo']['size'] <= 1000000) {
		# Testons si l'extension est autorisitée
		$infosfichier = pathinfo($_FILES['photo']['name']);
		$extention_upload = $infosfichier['extension'];
		$extention_autorisees = array('jpg', 'jpeg', 'png');
		if (in_array($extension_upload, $extention_autorisees)) {
			# code...
			move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . basename($_FILES['photo']['name']));
		}

	}
}
inscription();
?>
