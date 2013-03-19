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

<div class="mgr_display" id="viewItem_display">
	<br>
	
<table border="1px solid black">
<tbody style="background-color:orange">
	<th>Quantity</th>
	<th>Product ID</th>
	<th>Product Name</th>
	<th>Product Price</th>
	<th>Subtotal</th>
</tbody>
<?php
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
<?php
	echo "<h3><b>Total Sales: P $totalsales</b></h3></br>";
?>
</div>


</body>
</html>