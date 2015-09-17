<form class="form-horizontal tuile col-sm-6 col-sm-offset-3" action="<?php echo url_for("inscription/post/"); ?>" method="post">
<fieldset>

<!-- Form Name -->
<div class="tuile-head"><h1>Inscription</h1></div>

<!-- email -->
<main class="tuile-main">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="E-m@il">E-m@il</label>
  <div class="controls">
    <input id="E-m@il" name="E-m@il" placeholder="Adresse email" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Pseudo -->
<div class="control-group">
  <label class="control-label" for="pseudo">Pseudo</label>
  <div class="controls">
    <input id="pseudo" name="pseudo" placeholder="Pseudo" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Text nom -->
<div class="control-group">
  <label class="control-label" for="nom">Nom</label>
  <div class="controls">
    <input id="nom" name="nom" placeholder="nom" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Text prenom -->
<div class="control-group">
  <label class="control-label" for="prenom">Prénom</label>
  <div class="controls">
    <input id="prenom" name="prenom" placeholder="Prénom" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Date de naissance -->
<div class="control-group">
  <label class="control-label" for="birthday">Date de naissance</label>
  <div class="controls">
    <input id="birthday" name="birthday" placeholder="jj/mm/aaaa" class="input-xxlarge" required="" type="date">
  </div>
</div>

<!-- Localisation -->
<div class="control-group">
  <label class="control-label" for="localisation">Localisation</label>
  <div class="controls">
    <input id="localisation" name="localisation" placeholder="Localisation" class="input-xxlarge" required="" type="text">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Mot de passe</label>
  <div class="controls">
    <input id="password" name="password" placeholder="Mot de passe" class="input-xxlarge" required="" type="password">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password_verif">Confirmation du mot de passe</label>
  <div class="controls">
    <input id="password_verif" name="password_verif" placeholder="Retapez votre mot de passe" class="input-xxlarge" required="" type="password">
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="Connecter"></label>
  <div class="controls">
    <button id="connection" name="connection" class="btn btn-primary">Se connecter</button>
    <button id="validation" name="validation" class="btn btn-success">Valider</button>
  </div>
</div>
</main>
</fieldset>
</form>
