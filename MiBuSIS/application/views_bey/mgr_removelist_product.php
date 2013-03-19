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

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewProduct_display">
	<table border="1px solid black">
		<th> Product ID</th>
		<th> Product Name</th>
		<th> Delete</th>
	<?php
		//echo form_open('');
		foreach($data as $d){
	 		echo "<tr>";
	 		echo "<td> ".$d['product_id']." </td> ";
	 		echo "<td>".$d['product_name']."</td>";
	 		echo "<td>". anchor('portal/delete/'.$d['product_id'],'Remove', array('onclick' => "return confirm ('Are you sure want to remove ". $d['product_name'] ." from product list?')")) ."</td>";
	 		echo "</tr>";
	 	}
	 	//echo form_close();
	?>
	</table>
</div>


</body>
</html>