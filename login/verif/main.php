<?php
	session_start();

	include_once('fonction.php');

	if(!isset($_SESSION['id']) AND isset($_POST['email']) AND isset($_POST['password'])) {
		$pwdcrypt = sha1($_POST['password']);
		include_once(url_for("bdd_connect.php"));
		$request = $bdd->prepare('SELECT * FROM users WHERE email = :arg1 AND passwd = :arg2');
		$request->execute(array(
			'arg1' => $_POST['email'],
			'arg2' => $pwdcrypt));
		$res = $request->fetch();
		if( !$res ) {
			$_SESSION['loginLog'] = "Erreur d'authentification";
			header('Location: '.url_for("login/"));
		} else {
			unset($_SESSION['loginLog']);
			$_SESSION['id'] = $res['id'];
			$_SESSION['pseudo'] = $res['pseudo'];
			$_SESSION['type'] = $res['type'];
			$request = $bdd->prepare('UPDATE users SET nbConnection = :arg1 WHERE id = :arg2');
			$request->execute(array(
				'arg1' => $_SESSION['nbConnection'] + 1,
				'arg2' => $_SESSION['id']
			));
			header('Location: '.url_for(""));
		}
	}

