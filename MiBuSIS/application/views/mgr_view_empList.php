<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_emp">
  <?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div  class="mgr_nav" >
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewEmp_display">

	<table border="1px solid black">
	    <tbody style="background-color:orange">
		<th><?php echo anchor('portal/manager_viewEmpList_by_id','Employee ID')?></th> 
		<th><?php echo anchor('portal/manager_viewEmpList_by_fname','First Name')?></th> 
		<th><?php echo anchor('portal/manager_viewEmpList_by_lname','Last Name')?></th>
		<th><?php echo anchor('portal/manager_viewEmpList_by_timeduty','Time of Duty')?></th>
		<th><?php echo anchor('portal/manager_viewEmpList_by_dayoff','Day Off')?></th> 
		</tbody>
		<?php

			foreach ($data as $d) {
				echo "<tr>";
				echo "<td>".$d['emp_id']."</td>";
				echo "<td>".$d['first_name']."</td>";
				echo "<td>".$d['last_name']."</td>";
				echo "<td>".$d['time_duty']."</td>";
				echo "<td>".$d['day_off']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</div>


</body>
</html>