<?php
	include_once(url_for("Mail.class.php"));
	$redir_choice = "inscription/";

	if(	isset($_POST['E-m@il']) AND $_POST['E-m@il'] != "" AND isset($_POST['nom']) AND $_POST['nom'] != "" AND isset($_POST['password']) AND $_POST['password'] != "" AND isset($_POST['password_verif']) AND $_POST['password_verif'] != "" AND $_POST['password'] == $_POST['password_verif'] AND
		isset($_POST['pseudo']) AND $_POST['pseudo'] != "" AND
		isset($_POST['prenom']) AND $_POST['prenom'] != "" AND
		isset($_POST['localisation']) AND $_POST['localisation'] != "" AND
		isset($_POST['birthday']) AND $_POST['birthday'] != "") {
		include_once(url_for("bdd_connect.php"));
		$request = $bdd->prepare('INSERT INTO users(pseudo, passwd, email, type, name, firstname, location, birthdate, signin, activationCode) VALUES (:pseudo, :passwd, :email, :type, :nom, :prenom, :localisation, :birthday, NOW(), :code)');
		$codeAc = sha1(date(DATE_RFC2822));
		$request = $request->execute(array(
			'pseudo' => htmlspecialchars($_POST['pseudo']),
			'passwd' => sha1(htmlspecialchars($_POST['password'])),
			'email' => htmlspecialchars($_POST['E-m@il']),
			'type' => "NEW",
			'nom' => htmlspecialchars($_POST['nom']),
			'prenom' => htmlspecialchars($_POST['prenom']),
			'localisation' => htmlspecialchars($_POST['localisation']),
			'birthday' => date('Y-m-d',strtotime(htmlspecialchars($_POST['birthday']))),
			'code' => $codeAc
		));

		$_SESSION['inscriptionLog'] = "Votre inscription est un succès ! La validation est imminente.";
		$_SESSION['typeLog'] = "success";
		$redir_choice = "";
		if(!mkdir(url_for("validation/".$codeAc))) {
			die('Echec lors de la création des répertoires...');
		}
		copy(url_for("validation/activation.php"), url_for("validation/".$codeAc."/index.php"));
		copy(url_for("validation/main.php"), url_for("validation/".$codeAc."/main.php"));
		$confirm = new Mail(	"Confirmation d'inscription",
					"Exception <noreply@exception.ovh>",
					htmlspecialchars($_POST['E-m@il']),
					"Bonjour,\nNous avons bien pris en compte votre demande d'inscription.\nPour la confirmer cliquez sur le lien suivant : http://www.exception.ovh/validation/".$codeAc."/\n\nCe message est envoyé automatiquement, merci de ne pas y répondre.Pour nous contacter, merci d'utiliser la rubrique \"Contact\" en ligne sur http://www.exception.ovh."
					);
		$confirm->send();
	} else {
		$_SESSION['inscriptionLog'] = "Erreur lors de l'inscription !";
		$_SESSION['typeLog'] = "warning";
	}
	header('Location: '.url_for($redir_choice));
