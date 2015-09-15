<h1>Nos évènements</h1>

<table class="table table-bordered table-responsive">
	<thead class="table-head">
		<tr>
			<th>Evènement</th>
	        <th>Date</th>
	        <th>Heure</th>
	        <th>Lieu</th>
	        <th>Prix</th>
	        <th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
	if( !isset($bdd) ) {
		include_once(url_for("bdd_connect.php"));
	}
	$request = $bdd->prepare('SELECT * FROM events ORDER BY date DESC');
	$request->execute();
	$entries = $request->fetchAll();
	foreach($entries as $entry) {
		$entry['date'] = new DateTime($entry['date']);
		echo "<tr>"."<td>".$entry['name']."</td>"."<td>".$entry['date']->format('d/m/Y')."</td>"."<td>".$entry['date']->format('H:i')."</td>"."<td>".$entry['location']."</td>"."<td>".number_format($entry['member_price'], 2)." €</td>"."<td><a href=#>+</a></td>"."</tr>";
	}
	if(isset($_SESSION['type']) AND $_SESSION['type']=="Admin") {
		echo "<form action=".url_for("events/post/")."main.php method=post ><tr><td><input type=text id=name name=name /></td><td><input type=date id=date name=date /></td><td><input type=time name=time id=time /></td><td><input type=text name=lieu id=lieu /></td><td><input type=number step=any id=prix name=prix /></td><td><input type=submit name=addEvent id=addEvent value=Ajouter /></td></tr></form>";
	}
?>
	</tbody>
</table>
