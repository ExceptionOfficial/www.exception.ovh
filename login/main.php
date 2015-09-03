<form class="form-horizontal tuile col-sm-6 col-sm-offset-3" action="<?php echo url_for("login/verif/"); ?>main.php" method="post">
<fieldset>

<!-- Form Name -->
<div class="tuile-head"><h1>Connexion</h1></div>
<main class="tuile-main">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">E-m@il</label>
  <div class="controls">
    <input id="email" name="email" placeholder="Adresse email" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Mot de passe</label>
  <div class="controls">
    <input id="password" name="password" placeholder="Mot de passe" class="input-xxlarge" required="" type="password">
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="Connecter"></label>
  <div class="controls">
    <a href=<?php echo url_for("inscription"); ?> id="validation" name="validation" class="btn btn-primary">S'inscrire</a>
  	<button id="connexion" name="connexion" class="btn btn-success">Se connecter</button>
  </div>
</div>
</main>
</fieldset>
</form>

