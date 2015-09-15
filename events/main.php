<h1>Nos évènements</h1>

<div class="agenda">
    <div class="table-responsive">
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                <!-- Single event in a single day -->
                <tr>
                    <td class="agenda-date" class="active" rowspan="1">
                        <div class="dayofmonth">26</div>
                        <div class="dayofweek">Saturday</div>
                        <div class="shortdate text-muted">July, 2014</div>
                    </td>
                    <td class="agenda-time">
                        5:30 AM
                    </td>
                    <td class="agenda-events">
                        <div class="agenda-event">
                            <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i>
                            Fishing
                        </div>
                    </td>
                </tr>

                <!-- Multiple events in a single day (note the rowspan) -->
                <tr>
                    <td class="agenda-date" class="active" rowspan="3">
                        <div class="dayofmonth">24</div>
                        <div class="dayofweek">Thursday</div>
                        <div class="shortdate text-muted">July, 2014</div>
                    </td>
                    <td class="agenda-time">
                        8:00 - 9:00 AM
                    </td>
                    <td class="agenda-events">
                        <div class="agenda-event">
                            Doctor's Appointment
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="agenda-time">
                        10:15 AM - 12:00 PM
                    </td>
                    <td class="agenda-events">
                        <div class="agenda-event">
                            Meeting with executives
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="agenda-time">
                        7:00 - 9:00 PM
                    </td>
                    <td class="agenda-events">
                        <div class="agenda-event">
                            Aria's dance recital
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<table class="table table-bordered table-responsive">
	<thead class="table-head">
		<tr>
			<th>Evènement</th>
	        <th>Date</th>
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
		echo "<tr>"."<td>".$entry['name']."</td>"."<td>".$entry['date']."</td>"."<td>".$entry['location']."</td>"."<td>".$entry['member_price']."</td>"."</tr>";
	}
?>
	</tbody>
</table>
