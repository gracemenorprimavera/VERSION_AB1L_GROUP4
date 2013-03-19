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
<div>
<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
	<div class="noti_div">
     <?php //echo $data2['message']; ?>
  </div>
	<table border="1px solid black">
		<th><?php echo 'Employee ID'; ?></th> 
		<th><?php echo 'Name'; ?></th> 
		<th><?php echo 'Edit'; ?></th>
		<th><?php echo 'Delete'; ?></th>
	<?php
		
		//echo form_open('');
	 	foreach($data as $d){
	 		echo "<tr>";
	 		echo "<td>".$d['emp_id']." </td> ";
	 		echo "<td>".$d['first_name'].' '.$d['last_name']."</td>";
	 		echo "<td>". anchor('portal/manager_editEmp_info/'.$d['emp_id'],'Edit') ."</td>";
	 		echo "<td>". anchor('portal/manager_removeEmp_info/'.$d['emp_id'],'Remove', array('onclick' => "return confirm ('Are you sure want to remove " . $d['first_name'].' '.$d['last_name'] ." from employee list?')"))
 ."</td>";
	 		echo "</tr>";
	 	}
		//echo form_close();	
	?>
	</table>
</div>


</body>
</html>
