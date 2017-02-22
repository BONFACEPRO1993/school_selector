<h1><?= $title ?></h1>

<div id="county-body">
		<table>
			<tr><td>County Code</td><td>County</td></tr>
			<?php
				foreach ($counties as $records) {
					echo "<tr><td>".$records->county_id."</td><td>".$records->county_name."</td></tr>";
				}
			?>
		</table>

</div>
