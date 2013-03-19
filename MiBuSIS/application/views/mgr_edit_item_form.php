<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_emp">
  <?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
	<div class="noti_div">   
      		<?php echo validation_errors(); ?>
 		</div>
<?php 
	 	//heading($forminput,3);
		$id = $this->uri->segment(3);
	 	//echo form_open('portal/manager_editItem_info/'.$id);
	 	echo form_open('portal/editItemDetails');
	 	echo form_hidden('item_id',$e_id['value']);		
		
	 	echo "Item Name" .' : '. form_input('item_name', $e_item_name['value'])."</br>";
	 	//echo "Date Delivered" .' : '. form_input('date_delivered', $e_date_delivered['value'])."</br>";
	 	//echo "Date Expired" .' : '. form_input('date_expired', $e_date_expired['value'])."</br>";
	 	echo 'Date Delivered: <input type="date" name="date_delivered"><br>';
		echo 'Expiry Date: <input type="date" name="date_expired"><br>';
	 	echo "Quantity" .' : '. form_input('quantity', $e_quantity['value'])."</br>";
	 	echo form_submit('mysubmit','Submit!');
?>

</body>
</html>
