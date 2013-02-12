<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">


<?php 
 	 
 	echo form_open('portal/manager_addItem');
	echo 'Product ID';
 	echo form_input('item_id', ''); 
 	echo '<br>'; 
	echo 'Product Name';
 	echo form_input('item_name', ''); 
 	echo '<br>'; 
 	echo 'Date Delivered';
	echo form_input('date_delivered', ''); 
 	echo '<br>';
	echo 'Expiry Date';
 	echo form_input('date_expired', ''); 
 	echo '<br>';
 	echo 'Quantity';
 	echo form_input('quantity', ''); 
 	echo '<br>'; 
	echo form_submit('submit','Add Item');
 	echo form_close();

 ?>
 <center>

</div>

</body>
</html>