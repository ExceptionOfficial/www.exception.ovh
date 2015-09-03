<?php
	session_start();
	include_once("fonction.php");

	if(	isset($_POST['title']) AND $_POST['title'] != "" AND isset($_POST['contenu']) AND $_POST['contenu'] != "" AND isset($_POST['category']) AND $_POST['category'] != "" AND isset($_POST['image']) AND $_POST['image'] != "" ) {
		include_once(url_for("bdd_connect.php"));
		$request = $bdd->prepare('INSERT INTO articles(titre,contenu,auteur,date,image,categorie) VALUES (:titre, :contenu, :auteur, NOW(), :image, :categorie)');
		$request->execute(array(
			'titre' => htmlspecialchars($_POST['title']),
			'contenu' => htmlspecialchars($_POST['contenu']),
			'auteur' => $_SESSION['pseudo'],
			'image' => htmlspecialchars($_POST['image']),
			'categorie' => htmlspecialchars($_POST['category'])
		));

		$_SESSION['postLog'] = "Article envoyé !";
		$_SESSION['typeLog'] = "success";
	} else {
		$_SESSION['postLog'] = "Erreur lors de l'envoi de l'article !";
		$_SESSION['typeLog'] = "warning";
	}
	header('Location: '.url_for(""));
