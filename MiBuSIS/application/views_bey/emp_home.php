<?php include 'resources.php'; ?>

<html>
<head>
	<title>Emp Home</title>
</head>

<body>

<div class="logout_emp">
	<?php echo anchor('portal/index', 'Logout'); ?>
	<?php echo anchor('portal/check_stock', 'Check Stock'); ?>
</div>

<div class="nav_pane">
	<?php 
		include 'emp_nav.php'; 
	?>
</div>

<div class="menu_display">
	<h1> Some message/logo here </h1>
	
	<table>
	<?php
		echo 'The following items are almost out of stock.';
		foreach ($data as $d) {
			echo "<tr>";
			echo "<td>".$d['item_name']."</td>";
			echo "</tr>";
		}
	?></table><table>

	<?php
		echo '<br> The following items are already out of stock.';
		foreach ($data2 as $d) {
			echo "<tr>";
			echo "<td>".$d['item_name']."</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>



</body>
</html>
