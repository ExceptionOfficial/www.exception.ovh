<h1>Page des projets</h1>

<?php if (isset($_SESSION['id']) AND $_SESSION['pseudo'] == "begarco") { ?>
<div class="tuile">
	<div class="tuile-head">
		<h1>Ajout d'un projet</h1>
	</div>
	<main class="tuile-main">
		<form action="<?php echo url_for('add_project'); ?>" method=post class=add-entry>
		<dl>
		<dt>Nom du projet :
		<dd><input type=text size=30 name=name>
		<dt>Texte :
		<dd><textarea name=text rows=5 cols=40></textarea>
		<dt>Version :
		<dd><input type=text size=30 name=version>
		<dt>URL :
		<dd><input type=text size=30 maxlength=64 name=url>
		<dt>Image :
		<dd><input type=text size=30 name=image>
		<dd><input type=submit value=Valider>
		</dl>
		</form>
	</main>
</div>

<?php }
	if( !isset($bdd) ) {
		include_once(url_for("bdd_connect.php"));
	}
	$request = $bdd->prepare('SELECT * FROM projects');
	$request->execute();
	$entries = $request->fetchAll();
	foreach($entries as $entry) {
?>
<div class="col-sm-12 col-lg-6 col-md-6">
			<div class="thumbnail">
				<img src=<?php echo $entry['image']; ?> alt=""/>
				<div class="caption">
					<h4><a href="#"><?php echo $entry['name']; ?></a></h4>
					<article class="main-project"><?php echo $entry['description']; ?></article>
					<section class="">
						<em><?php echo "le ".$entry['date']." par ".$entry['creator']; ?></em>
					</section>
				</div>
			</div>
		</div>
<?php
  		}

?>
