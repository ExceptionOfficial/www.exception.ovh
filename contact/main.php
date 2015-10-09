
<?php if(isset($_SESSION['contactLog'])) { ?>
<div class="alert alert-<?php echo $_SESSION['typeLog']; ?>">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<strong><?php echo $_SESSION['contactLog']; ?></strong>
</div>
<?php } ?>

<section id="contact" class="container tuile">
	<div class="tuile-head"><h1 class="custom-panel-title">Page de contact</h1></div>
	<form class="login tuile-main" action="<?php echo url_for("contact/post/"); ?>main.php" method="post">
	<p>
		<input type="text" id="name" name="name" size="32" maxlength="32" placeholder="Votre nom">
	</p>
	<p>
		<input type="email" name="email" size="32" maxlength="32" placeholder="Adresse email">
	</p>
	<p>
		<input type="text" name="sujet" size="32" maxlength="32" placeholder="Sujet du message">
	</p>
	<p>
		<textarea name="message" rows="11"> </textarea>
	</p>
	<p>
		<input id="send" type="submit" value="Envoyer">
	</p>
	</form>
	</div>
</section>
