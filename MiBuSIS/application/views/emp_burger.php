<?php include 'resources.php'; ?>

<html>
<head><title>Emp Home</title></head>
<body>

	<div class="logout_emp">
		<?php echo anchor('portal/index', 'Logout'); ?>
	</div>

	<div class="nav_pane">
		<?php 
			include 'emp_nav.php'; 
		?>
	</div>

	<div class="menu_display">	
		<?php include('emp_menuDisplay.php'); ?>
	</div>

	<div class="purchase">
		<?php include('emp_purchase.php'); ?>
	</div>

</body>
</html>
