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
	
	<img src="<?php echo base_url();?>images/1.png" class="addons_img" /> addons 1
	<img src="<?php echo base_url();?>images/2.png" class="addons_img" /> addons 2
	<img src="<?php echo base_url();?>images/3.png" class="addons_img" /> addons 3
	<img src="<?php echo base_url();?>images/4.png" class="addons_img" /> addons 4
	<img src="<?php echo base_url();?>images/5.png" class="addons_img" /> addons 5
	
</div>

<div class="purchase_display">
	<?php
		$purchase_but = array('name'=>'purchase_but', 'class'=>'item_but');
		echo form_button($purchase_but, 'PURCHASE')
	?>

</div>

</body>
</html>
