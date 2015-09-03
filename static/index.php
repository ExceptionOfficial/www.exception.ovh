<?php
	/* gestion des erreurs, a supprimer pour le deploiement SECURITE */
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
	error_reporting(E_ALL);
	/* end erreur */

	/* variables */
	$subtitle = substr(strstr(getcwd(), "/pages"), 7);
	if(!empty($subtitle)){
		$subtitle = " > ".ucfirst($subtitle);
	}

	/* fonctions */
	function url_for($url) {
		$REAL_URL="/var/www/garcon/";
		$retour = "";
		$test = substr($url, -4) ;
		if($test == ".php") {
			$retour = $REAL_URL.$url;
		} else {
			$count = substr_count($_SERVER['REQUEST_URI'], '/') - 2;
			for($i = 0 ; $i < $count ; $i++) {
				$retour .= "../";
			}
			$retour .= $url;
		}

		return $retour;
	}

	/* affichage du contenu dans le squelette */
	include_once(url_for("skeleton.php"));
