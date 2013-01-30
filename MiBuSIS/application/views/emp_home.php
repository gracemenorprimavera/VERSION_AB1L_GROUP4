<?php include 'resources.php'; ?>

<html>
<head>
	<title>Emp Home</title>
</head>

<body>

<div class="nav_pane">
	<?php 
		include 'emp_nav.php'; 
	?>
</div>

<div class="menu_display">
	<h1> Some message/logo here </h1>
</div>

<div class="purchase_display">
	<?php
		$purchase_but = array('name'=>'purchase_but', 'class'=>'item_but');
		echo form_button($purchase_but, 'PURCHASE')
	?>
</div>

</body>
</html>
