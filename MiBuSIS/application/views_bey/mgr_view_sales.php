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

<div class="mgr_display" id="viewItem_display">
	<br>
<table border="1px solid black">
<?php
	echo "<th>Quantity</th>";
	echo "<th>Product ID</th>";
	echo "<th>Product Name</th>";
	echo "<th>Product Price</th>";
	echo "<th>Subtotal</th>";
	
	foreach ($data as $d) {
		echo "<tr>";
		echo "<td>".$d['quantity']."</td>";
		echo "<td>".$d['product_id']."</td>";
		echo "<td>".$d['product_name']."</td>";
		echo "<td>".$d['product_price']."</td>";
		echo "<td>".$d['subtotal']."</td>";
		echo "</tr>";
	}
?>
</table>
</div>


</body>
</html>