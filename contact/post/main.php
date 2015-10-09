<?php
	session_start();
	include_once("fonction.php");

	if(	isset($_POST['name']) AND $_POST['name'] != "" AND isset($_POST['email']) AND $_POST['email'] != "" AND isset($_POST['sujet']) AND $_POST['sujet'] != "" AND isset($_POST['message']) AND $_POST['message'] != "" ) {
		include_once(url_for("bdd_connect.php"));
		$request = $bdd->prepare('INSERT INTO contact(name,email,sujet,message) VALUES (:name, :email, :sujet, :message)');
		$request->execute(array(
			'name' => htmlspecialchars($_POST['name']),
			'email' => htmlspecialchars($_POST['email']),
			'sujet' => htmlspecialchars($_POST['sujet']),
			'message' => htmlspecialchars($_POST['message'])
		));

		$_SESSION['contactLog'] = "Message envoyé !";
		$_SESSION['typeLog'] = "success";
	} else {
		$_SESSION['contactLog'] = "Erreur lors de l'envoi du message !";
		$_SESSION['typeLog'] = "warning";
	}
	header('Location: '.url_for("contact/"));
