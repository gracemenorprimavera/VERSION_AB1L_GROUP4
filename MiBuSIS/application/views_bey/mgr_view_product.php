<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>
<div class="banner"></div>
<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
</div>

<div class="mgr_nav" >
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewProduct_display">
	<table border="1px solid black">
		<th><?php echo anchor('portal/manager_viewProductList_by_id','Product ID')?></th> 
		<th><?php echo anchor('portal/manager_viewProductList_by_name','Product Name')?></th> 
		<th><?php echo anchor('portal/manager_viewProductList_by_category','Category')?></th>
		<th><?php echo anchor('portal/manager_viewProductList_by_price','Price')?></th>
		
	<?php
		//echo form_open('');
		foreach($data as $d){
	 		echo "<tr>";
	 		echo "<td> ".$d['product_id']." </td> ";
	 		echo "<td>".$d['product_name']."</td>";
	 		echo "<td> ".$d['product_category']." </td> ";
	 		echo "<td>P ".$d['price']."</td>";
	 		echo "</tr>";
	 	}
	 	//echo form_close();
	?>
	</table>
</div>


</body>
</html>