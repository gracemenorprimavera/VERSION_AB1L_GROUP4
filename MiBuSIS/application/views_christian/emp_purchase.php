
<div class="purchase_display">

	<center>
<div class="alex">
	<img class="header" alt="" src="<?php echo base_url();?>layout/order.png" height="75" width="250">
	<table>	
		<th> <img class="header" alt="" src="<?php echo base_url();?>layout/quantity2.png" height="30" width="60"> </th>
		<th> <img class="header" alt="" src="<?php echo base_url();?>layout/product2.png" height="30" width="60"> </th>
		<th> <img class="header" alt="" src="<?php echo base_url();?>layout/price2.png" height="30" width="60"> </th>
		<th> <img class="header" alt="" src="<?php echo base_url();?>layout/cancel2.png" height="30" width="60"></th>
</div>	

<div class="babyalex">
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
			echo anchor('portal/cancel_order/'.$page.'/'.$price, '<img src="'.base_url().'layout/x.png" height="25" width="25"/>').'</td>';	
			echo form_close();
			
			//echo anchor('portal/cancel_order/'.$page.'/'.$price, 'cancel').
			echo'</td>';	
			echo '</tr>';
			$total = $total+($d['quantity']*$d['product_price']);
		}
	?>

	</table>
</div>
	</center>

</div>
<div class="purchase_button">
	
	<table class="purchase">
		<th><img class="header" alt="" src="<?php echo base_url();?>layout/total.png" height="35" width="100">  </th>
		<th> <?php echo 'P'.$total; ?> </th>
	</table>
	<br>

	<?php
		echo anchor('portal/emp_purchase_order', '<img src="'.base_url().'layout/purchase.png" height="50" width="200"/>');
	?>


</div>
</div>