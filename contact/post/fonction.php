<?php
	/* fonctions */
	function url_for($url) {
		$REAL_URL="/var/www/exception/";
		$retour = "";
		$test = substr($url, -4) ;
		if($test == ".php") {
			$retour = $REAL_URL.$url;
		} else {
			$count = substr_count($_SERVER['REQUEST_URI'], '/') - 1;
			for($i = 0 ; $i < $count ; $i++) {
				$retour .= "../";
			}
			$retour .= $url;
		}

		return $retour;
	}

