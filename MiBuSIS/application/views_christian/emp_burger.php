<?php include 'resources.php'; ?>

<html>
<head><title>Emp Home</title></head>
<body>


	<div class="logout_emp">
		<?php echo anchor('portal/employee_home','<img src="'.base_url().'layout/homebutton.png" height="45" width="90"/>'); ?>
		<?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
	</div>

	<div id="burger">
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
</div>
</body>
</html>
