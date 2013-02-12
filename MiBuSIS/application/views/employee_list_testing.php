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
<?php
	
	echo form_open('');

 	foreach($data as $d){
 		echo "<td>";
 		echo "<td> ".$d['emp_id']." </td> ";
 		echo "<td>".$d['first_name'].' '.$d['last_name']."</td>";
 		echo "      <td>". anchor('portal/manager_editEmp_info/'.$d['emp_id'],'Edit') ."</td>";
 		echo "</td>";
 		echo "</br>";
 	}

	echo form_close();
	
?>
</div>


</body>
</html>
