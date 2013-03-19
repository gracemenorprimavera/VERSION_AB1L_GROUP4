<?php include 'resources.php'; ?>

<html>
<head>
	<title>Emp Home</title>
</head>

<body>

<div class="logout_emp">
		<?php echo anchor('portal/employee_home','<img src="'.base_url().'layout/homebutton.png" height="45" width="90"/>'); ?>
		<?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="nav_pane">
	<?php 
		include 'emp_nav.php'; 
	?>
</div>

<div class="menu_display">
	<table border="1px solid black">

		<th>Item ID</th> 
		<th>Item Name</th> 
		<th>Date Delivered</th>
		<th>Date Expired</th>
		<th>Quantity</th> 
		<?php
			foreach ($data as $d) {
				echo "<tr>";
				echo "<td>".$d['item_id']."</td>";
				echo "<td>".$d['item_name']."</td>";
				echo "<td>".$d['date_delivered']."</td>";
				echo "<td>".$d['date_expired']."</td>";
				echo "<td>".$d['quantity']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</div>



</body>
</html>
