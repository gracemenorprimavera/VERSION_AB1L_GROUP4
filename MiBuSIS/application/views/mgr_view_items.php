<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
<?php
	foreach ($data as $d) {
		echo $d['item_id']." ".$d['item_name']." ".$d['date_delivered']." ".$d['date_expired']." ".$d['quantity'];
		echo "<br>";
	}
?>

</div>


</body>
</html>