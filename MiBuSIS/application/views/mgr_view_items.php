<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
</div>

<div class="mgr_nav" >
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewItem_display">
	<table border="1px solid black">

		<th><?php echo anchor('portal/manager_viewItemList_by_id','Item ID')?></th> 
		<th><?php echo anchor('portal/manager_viewItemList_by_fname','Item Name')?></th> 
		<th><?php echo anchor('portal/manager_viewItemList_by_lname','Date Delivered')?></th>
		<th><?php echo anchor('portal/manager_viewItemList_by_timeduty','Date Expired')?></th>
		<th><?php echo anchor('portal/manager_viewItemList_by_dayoff','Quantity')?></th> 
	<?php
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