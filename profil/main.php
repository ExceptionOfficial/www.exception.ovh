<?php
	if( isset($_SESSION['type']) ) {
		if( $_SESSION['type'] != "NEW" ) {
			echo "<section class='alert alert-success'>Page en construction.</section>";
			include_once("level.php");
		} else {
			echo "<section class='alert alert-warning'>Votre compte est en cours de validation.</section>";
		}
	} else {
		echo "<section class='alert alert-warning'>Inscrivez-vous d'abord.</section>";
	}
?>
