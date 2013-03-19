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

<div class="mgr_display" id="viewProduct_display">
	<div class="noti_div">
     <?php echo $data2['message']; ?>
	<?php echo validation_errors(); ?>
  </div>


<?php 
		//echo form_open('portal/upload_picture')
	 	echo form_open('portal/addProductDetails');
		 	echo "Product ID" .' : '. form_input('product_id','')."</br>";
		 	echo "Product Name" .' : '. form_input('product_name','')."</br>";
		 	echo "Category";
		 	$options = array(
	           'empty' => ' ',
	           'Meal'  => 'Meal',
	           'Drinks'    => 'Drinks',
	           'Addons'   => 'Addons',
	           'Chips'   => 'Chips',
	        );
	       echo form_dropdown('product_category', $options, 'empty');

		 	
		 	?>
		 	
      	
		 	<br>
      	<?php
		 	echo "Price" .' : '. form_input('price', '')."</br>";
			
			foreach($data as $d){
				echo form_checkbox('checkedboxes[]',$d['item_id']).$d['item_name']."</br>";
			}
			
	 	echo form_submit('add product','Continue')."</br>";
?>
</div>


</body>
</html>