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
	 	//heading($forminput,3);
	 	echo form_open('portal/editItemDetails');
	 	//echo form_open();
	 	echo form_hidden('item_id',$e_id['value']);		
		
	 	echo "Item Name" .' : '. form_input('item_name', $e_item_name['value'])."</br>";
	 	echo "Date Delivered" .' : '. form_input('date_delivered', $e_date_delivered['value'])."</br>";
	 	echo "Date Expired" .' : '. form_input('date_expired', $e_date_expired['value'])."</br>";
	 	echo "Quantity" .' : '. form_input('quantity', $e_quantity['value'])."</br>";
	 	echo form_submit('mysubmit','Submit!');
?>

</body>
</html>
