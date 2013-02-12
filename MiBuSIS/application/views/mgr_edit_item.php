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
	
	echo form_open('');

 	foreach($data as $d){
 		echo "<td>";
 		echo "<td> ".$d['item_id']." </td> ";
 		echo "<td>".$d['item_name']."</td>";
 		echo "      <td>". anchor('portal/manager_editItem_info/'.$d['item_id'],'Edit') ."</td>";
 		echo "</td>";
 		echo "</br>";
 	}

	echo form_close();
	
?>
</div>


</body>
</html>