<div class="purchase_display">
	<center>
		<h3>ORDER LIST</h3>
	<table>	
	<?php 
		foreach ($data2 as $d) { 
			$page = $this->uri->segment(2);
			$price = $d['product_price'];
			echo '<tr>';
			echo '<td>'.$d['product_name'].'</td>';
			echo '<td>'.$d['product_price'].'</td>';
			echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
			echo anchor('portal/cancel_order/'.$page.'/'.$price, 'cancel').'</td>';	
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