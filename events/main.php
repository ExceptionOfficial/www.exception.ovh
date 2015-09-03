<h1>Nos évènements</h1>
<table class="table table-bordered table-responsive">
	<thead class="table-head">
		<tr>
			<th>Evènement</th>
	        <th>Date</th>
	        <th>Lieu</th>
	        <th>Prix</th>
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
		echo "<tr>"."<td>".$entry['name']."</td>"."<td>".$entry['date']."</td>"."<td>".$entry['location']."</td>"."<td>".$entry['member_price']."</td>"."</tr>";
	}
?>
	</tbody>
</table>
