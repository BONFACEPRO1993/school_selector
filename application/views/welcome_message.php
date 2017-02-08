<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Secodary School Selection</title>	
</head>
<body>

<div id="main-container">
	<h1>Counties in Kenya</h1>

	<div id="body">
		<table>
			<tr><td>County Code</td><td>County</td></tr>
			<?php
				foreach ($counties as $records) {
					echo "<tr><td>".$records->county_id."</td><td>".$records->county_name."</td></tr>";
				}
			?>
		</table>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>