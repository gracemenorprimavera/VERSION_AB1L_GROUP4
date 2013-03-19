<?php include 'resources.php'; ?>

<html>
<head>
	<title>Emp Home</title>
</head>

<body>

<div class="logout_emp1">
	<?php echo anchor('portal/check_stock','<img src="'.base_url().'layout/stock.png" height="45" width="130"/>'); ?>
	<?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="nav_pane">
	<?php 
		include 'emp_nav.php'; 
	?>
</div>

<div class="menu_display1">
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
