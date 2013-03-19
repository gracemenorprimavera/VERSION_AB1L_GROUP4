<?php include 'resources.php'; ?>

<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_emp">
  <?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
<div id="overview">
		<p >
			&nbsp;&nbsp;&nbsp;&nbsp;Minute Burger Sales and Inventory System (MiBuSIS) is a system developed as a requirement for the CMSC 128: Introduction to Software Engineering course.
			The developers of the system aimed to create a system that would be easier to use and could produce a more reliable inventory record.
			The group who created MiBuSIS is composed of five junior and senior students from the University of the Philippines Los Banos, Laguna.
		</p>
	</div>
</div>


</body>
</html>