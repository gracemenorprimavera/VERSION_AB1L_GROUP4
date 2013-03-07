<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
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

<div class="mgr_display" id="viewProduct_display">
<table border="1px solid black">
<?php
	foreach ($data as $d) {
		echo "<tr>";
		echo "<td>".$d['item_id']."</td>";
		echo "<td>".$d['item_name']."</td>";
		echo "</tr>";
	}
?>
</table>

</div>


</body>
</html>