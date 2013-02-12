<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
<table border="1px solid black">
<?php
	echo "<th>Item ID</th>";
	echo "<th>Item Name</th>";
	echo "<th>Date Delivered</th>";
	echo "<th>Date Expired</th>";
	echo "<th>Quantity</th>";

	foreach ($data as $d) {
		echo "<tr>";
		echo "<td>".$d['item_id']."</td>";
		echo "<td>".$d['item_name']."</td>";
		echo "<td>".$d['date_delivered']."</td>";
		echo "<td>".$d['date_expired']."</td>";
		echo "<td>".$d['quantity']."</td>";
		echo "</tr>";
	}
?>
</table>

</div>


</body>
</html>