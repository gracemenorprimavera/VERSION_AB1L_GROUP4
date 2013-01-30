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
	<div>
	<img src="<?php echo base_url();?>images/1.png" class="drinks_img" /> drinks 1
	<img src="<?php echo base_url();?>images/2.png" class="drinks_img" /> drinks 2
	<img src="<?php echo base_url();?>images/3.png" class="drinks_img" /> drinks 3
	<img src="<?php echo base_url();?>images/4.png" class="drinks_img" /> drinks 4
	<img src="<?php echo base_url();?>images/5.png" class="drinks_img" /> drinks 5
	</div>
</div>

<div class="purchase_display">
	<?php
		$purchase_but = array('name'=>'purchase_but', 'class'=>'item_but');
		echo form_button($purchase_but, 'PURCHASE')
	?>

</div>

</body>
</html>
