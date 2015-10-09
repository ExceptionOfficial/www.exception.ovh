<?php
	$fichier = fopen(url_for("admin/pwd"), 'r');
	$pwd = fgets($fichier);
	fclose($fichier);
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=Exception', 'root', trim($pwd));
		$utf8 = $bdd->prepare("SET NAMES 'utf8'");
		$utf8->execute();
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
