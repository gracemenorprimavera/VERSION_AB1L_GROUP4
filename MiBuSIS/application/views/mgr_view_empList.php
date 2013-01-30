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
		echo $d['first_name']." ".$d['last_name']." ".$d['time_duty']." ".$d['day_off'];
		echo "<br>"; 
	}
	
?>
</div>


</body>
</html>