<?php include 'resources.php'; ?>

<html>
<head>
	<title>Emp Home</title>
</head>

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
	
	<!--<img src="<?php echo base_url();?>images/1.png" class="addons_img" /> addons 1
	<img src="<?php echo base_url();?>images/2.png" class="addons_img" /> addons 2
	<img src="<?php echo base_url();?>images/3.png" class="addons_img" /> addons 3
	<img src="<?php echo base_url();?>images/4.png" class="addons_img" /> addons 4
	<img src="<?php echo base_url();?>images/5.png" class="addons_img" /> addons 5 -->
<table border="1px solid black">

	<?php
		$ctr = 0;
		$ctr2=-1;
		foreach ($data as $d) { 
			//echo $ctr;
			
			if($ctr%4==0) {
				echo "<tr>";
				$ctr2 = $ctr+3;
			}
			
			echo "<td>";	
				$image_loc = base_url().$d['image_location'];
				$image_loc1 = "<img class='prodimg' src=".$image_loc.">"; 
				echo anchor('portal/sample/'.$d['image_product_id'], $image_loc1.$ctr); 
			echo "</td>";
			
			if($ctr==$ctr2)
				echo "</tr>";

			$ctr++;

		}
	?>
</table>
	
</div>

<div class="purchase_display">
	<center>
		<h3>ORDER LIST</h3>
	<table>	
	<?php 
		foreach ($data2 as $d) { 
			echo '<tr>';
			echo '<td>'.$d['product_name'].'</td>';
			echo '<td>'.$d['product_price'].'</td>';
			echo '</tr>';
		}
	?>
	</table>

	</center>
</div>
<div class="purchase_button">
	
	<?php
		$purchase_but = array('name'=>'purchase_but', 'class'=>'item_but');
		echo form_button($purchase_but, 'PURCHASE')
	?>

</div>

</body>
</html>
