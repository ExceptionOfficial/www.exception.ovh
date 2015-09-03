<h1>Fil d'actualité</h1>
	<?php if (isset($_SESSION['id']) AND $_SESSION['pseudo'] == "begarco") { ?>
    		<form action="<?php echo url_for('articles/'); ?>main.php" method=post class=add-entry>
      		  <dl>
        	    <dt>Titre :
       		    <dd><input type=text name=title>
				<dt>Catégorie :
       		    <dd><input type=text name=category>
       		    <dt>URL image :
       		    <dd><input type=text name=image>
        	    <dt>Contenu :
        	    <dd><textarea name=contenu rows=5 cols=40></textarea>
        	    <dd><input type=submit value="Publier">
      		  </dl>
		</form>
	<?php
		}
	?>

	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  	<?php
		if( !isset($bdd) ) {
			include_once(url_for("bdd_connect.php"));
		}
		$request = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
		$request->execute();
		$entries = $request->fetchAll();
		foreach($entries as $entry) {
	?>
			<div class="thumbnail">
				<div class="tuile-head">
					<h4><a href="#"><?php echo $entry['titre']; ?></a></h4>
				</div>
				<img src=<?php echo url_for($entry['image']); ?> alt="">
				<div class="caption">

					<article><?php echo $entry['contenu']; ?></article>
				</div>
				<div class="tuile-footer">
					<em><?php echo "le ".$entry['date']." par ".$entry['auteur']; ?></em>
				</div>
			</div>
<?php
  		}
?>
	</div>
	<div class="thumbnail col-lg-3 col-md-3 hidden-sm hidden-xs">
		<?php $indice = sizeof($entries)-1; ?>
				<img src=<?php echo url_for($entries[$indice]['image']); ?> alt="">
				<div class="caption">
					<h4><a href="#"><?php echo $entries[$indice]['titre']; ?></a></h4>
					<article><?php echo $entries[$indice]['contenu']; ?></article>
				</div>
	</div>

