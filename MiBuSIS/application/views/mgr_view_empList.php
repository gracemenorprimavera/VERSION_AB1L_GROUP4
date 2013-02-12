<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
<table border="1px solid black">
	<?php
		echo "<th>Employee ID</th>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>Time of Duty</th>";
		echo "<th>Day off</th>";

		foreach ($data as $d) {
			echo "<tr>";
			echo "<td>".$d['emp_id']."</td>";
			echo "<td>".$d['first_name']."</td>";
			echo "<td>".$d['last_name']."</td>";
			echo "<td>".$d['time_duty']."</td>";
			echo "<td>".$d['day_off']."</td>";
			echo "</tr>";
		}
	?>
</table>
</div>


</body>
</html>