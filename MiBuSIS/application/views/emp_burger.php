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
	<table border="1px solid black">
		<tr>
			<td> <img src="<?php echo base_url();?>images/1.png" class="meal_img" /><br> Meal 1 </td>
			<td> <img src="<?php echo base_url();?>images/2.png" class="meal_img" /><br> Meal 2 </td>
			<td> <img src="<?php echo base_url();?>images/3.png" class="meal_img" /><br> Meal 3 </td>
			<td> <img src="<?php echo base_url();?>images/4.png" class="meal_img" /><br> Meal 4 </td>
			<td> <img src="<?php echo base_url();?>images/5.png" class="meal_img" /><br> Meal 5 </td>
		</tr>
		
	</table>
</div>

<div class="purchase_display">
	<?php
		$purchase_but = array('name'=>'purchase_but', 'class'=>'item_but');
		echo form_button($purchase_but, 'PURCHASE')
	?>

</div>

</body>
</html>
