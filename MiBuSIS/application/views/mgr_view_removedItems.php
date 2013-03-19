<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_emp">
  <?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="mgr_nav" id="viewRemovedItem_display">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewProduct_display">
	<table border="1px solid black">
	<tbody style="background-color:orange">
	<th>Item ID</th>
	<th>Item Name</th>
	<th>Quantity</th>
	</tbody>
<?php

	foreach ($data as $d) {
		echo "<tr>";
		echo "<td>".$d['item_id']."</td>";
		echo "<td>".$d['item_name']."</td>";
		echo "<td>".$d['quantity']."</td>";
		echo "</tr>";
	}
?>
</table>
</div>


</body>
</html>