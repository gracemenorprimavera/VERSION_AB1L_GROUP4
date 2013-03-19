<div class="purchase_display">
	<center>
		<h3>ORDER LIST</h3>
	<table>	
		<th> Quantity </th>
		<th> Product </th>
		<th> Price </th>
		<th> Cancel</th>
	<?php 
		$total = 0;
		foreach ($data2 as $d) { 
			$page = $this->uri->segment(2);
			$price = $d['product_price'];
			echo '<tr>';
			echo '<td>'.$d['quantity'].'</td>';
			echo '<td>'.$d['product_name'].'</td>';
			echo '<td>'.$d['product_price'].'</td>';
			echo '<td>';
			echo anchor('portal/cancel_order/'.$page.'/'.$price, 'cancel').'</td>';	
			echo '</tr>';
			$total = $total+($d['quantity']*$d['product_price']);
		}
	?>

	</table>

	</center>
</div>
<div class="purchase_button">
	
	<table class="purchase">
		<th> TOTAL </th>
		<th> <?php echo 'P'.$total; ?> </th>
	</table>
	<br>

	<?php
		echo anchor('portal/emp_purchase_order', 'PURCHASE');	
		
	?>


</div>