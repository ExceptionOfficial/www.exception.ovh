<?php
	// destruction de la session
	$_SESSION = array();
	session_destroy();

	// mettre ici la destruction des cookies

	header('Location: '.url_for(""));
