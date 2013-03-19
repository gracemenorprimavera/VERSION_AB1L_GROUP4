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

<div class="menu_display">
	<div id="overview">
		<p >
			&nbsp;&nbsp;&nbsp;&nbsp;Minute Burger Sales and Inventory System (MiBuSIS) is a system developed as a requirement for the CMSC 128: Introduction to Software Engineering course.
			The developers of the system aimed to create a system that would be easier to use and could produce a more reliable inventory record.
			The group who created MiBuSIS is composed of five junior and senior students from the University of the Philippines Los Banos, Laguna.
		</p>
	</div>
	<div id="warning">
		<table>
		<?php
			echo 'The following items are almost out of stock:';
			foreach ($data as $d) {
				echo "<tr>";
				echo "<td>".$d['item_name']."</td>";
				echo "</tr>";
			}
		?></table>
	</div>
	<div id="out">
		<table >

		<?php
			echo '<br> The following items are already out of stock:';
			foreach ($data2 as $d) {
				echo "<tr>";
				echo "<td>".$d['item_name']."</td>";
				echo "</tr>";
			}
		?>
		</table>
	</div>
</div>



</body>
</html>
