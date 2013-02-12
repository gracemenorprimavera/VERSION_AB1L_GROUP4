<?php include 'resources.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<script type="" src=""></script>
	<link rel = "" type = "" href = "" />
	<title>Employee Form 1</title>
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
	 	//heading($forminput,3);
	 	echo form_open('portal/editdetails');
	 	//echo form_open();
	 	echo form_hidden('emp_id',$e_id['value']);

	 	echo "First Name" .' : '. form_input('first_name', $e_fname['value'])."</br>";
	 	echo "Last Name" .' : '. form_input('last_name', $e_lname['value'])."</br>";
	 	echo "Time Duty" .' : '. form_input('time_duty', $e_time_duty['value'])."</br>";
	 	echo "Salary" .' : '. form_input('salary', $e_salary['value'])."</br>";
	 	echo "Day off" .' : '. form_input('day_off', $e_dayoff['value'])."</br>";
	 	echo "Address" .' : '. form_input('address', $e_address['value'])."</br>";
	 	echo "Contact Number" .' : '. form_input('contact_number', $e_contactNumber['value'])."</br>";
	 	echo form_submit('mysubmit','Submit!');

	?>

	</div>
</body>
</html>