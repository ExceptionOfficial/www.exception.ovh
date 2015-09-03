<?php
	session_start();

	$MENU = ["Projets", "Events","Contact", "Inscription", "Login"];
	if( isset($_SESSION['id']) ) {
		$MENU[3] = "Profil";
		$MENU[4] = "Logout";
	}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Author" content="Benoît Garçon">

    <title>Exception<?php echo $subtitle; ?></title>

	<link rel="icon shortcut" type="image/png" href=<?php echo url_for("static/images/logoAlpha.png"); ?> />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href=<?php echo url_for("static/css/stylesheet2.css"); ?> rel="stylesheet" type="text/css" />
	<link href=<?php echo url_for("static/css/stylesheet.css"); ?> rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url_for(""); ?>"><img id="logo" src="<?php echo url_for("static/images/name.png"); ?>" alt="Logo Exception"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
    				<?php
						foreach ( $MENU as $mot ) {
							echo "<li> <a href='".url_for(($mot == "Accueil" ? "" : strtolower($mot)."/"))."'>".$mot."</a> </li>";
						}
    				?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container main-page">
		<main>
			<?php
				include_once(url_for(str_replace("index.php", "main.php", $_SERVER['SCRIPT_NAME'])));
			?>
		</main>
		<p></p>
	</div>
    <!-- /.container -->

        <!-- Footer -->
        <div id="footer">
        <div class="container">
        <footer>
        	<div class="row text-center">
        		<a href="http://www.facebook.com/pages/BG-Prod/130207853825611"><img src="<?php echo url_for("static/images/logoFacebook.png"); ?>" alt="Facebook" /></a>
        		<a href="http://github.com/BG-Prod/"><img src="<?php echo url_for('static/images/logoGitHub.png'); ?>" alt="GitHub" /></a>
        		<a href=<?php echo url_for("contact"); ?> ><img src="<?php echo url_for('static/images/logoMail.png');?>" alt="Mail" /></a>
        		<p><br/></p>
        	</div>
            <div class="row text-center">
                <div class="col-lg-12">
					<p>Copyright © 2014–2015 Exception, all rights reserved.</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
		</div>
		</div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
