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
 	echo form_input(array('name'=>'item_id', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
 	echo '<br>'; 
	echo 'Product Name';
	$data = array('name'=>'item_name','id'=>'first_name', 'value'=>'Product Name', 'size'=>'30', 						'class'=>'log');
 	echo form_input($data); 
 	echo '<br>'; 
 	echo 'Item 1:';
 	echo form_input(array('name'=>'date_delivered', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
 	echo '<br>';
	echo 'Item 2';
 	echo form_input(array('name'=>'expioration_date', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
 	echo '<br>'; 
	echo 'Item 3';
 	echo form_input(array('name'=>'quantity', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
 	echo '<br>';  
	echo form_submit(array('id'=>'login_button','name'=>'submit'), 'Add Item'); // alert for previous password
 	echo form_close();

 ?>

</body>
</html>
