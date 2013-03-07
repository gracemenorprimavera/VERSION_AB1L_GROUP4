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

	<div class="mgr_display" id="viewEmp_display">
		<div class="noti_div">   
      		<?php echo validation_errors(); ?>
 		</div>
	 <?php 
	 	//heading($forminput,3);
	 	$id = $this->uri->segment(3);
	 	//echo form_open('portal/manager_editEmp_info/'.$id);
	 	echo form_open('portal/editdetails');
	 	echo form_hidden('emp_id',$e_id['value']);

	 	echo "First Name" .' : '. form_input('first_name', $e_fname['value'])."</br>";
	 	echo "Last Name" .' : '. form_input('last_name', $e_lname['value'])."</br>";
	 	//echo "Time of Duty" .' : '. form_input('time_duty', $e_time_duty['value'])."</br>";
 		//echo "Salary" .' : '. form_input('salary', $e_salary['value'])."</br>";
	 	//echo "Day off" .' : '. form_input('day_off', $e_dayoff['value'])."</br>";
	 	 echo 'Time of Duty';
    $options = array(
           'empty' => ' ',
           'Morning'  => 'Morning ( 6:00am-2:00pm )',
           'Afternoon'    => 'Afternoon ( 2:00pm-10:00pm )',
           'Evening'   => 'Evening ( 10:00pm-6:00am )'
        );
       echo form_dropdown('time_duty', $options, 'empty');
       echo '<br>';    
  
       echo 'Day Off';
    $options2 = array(
           'empty' => ' ',
           'Monday'  => 'Monday',
           'Tuesday'    => 'Tuesday',
           'Wednesday'   => 'Wednesday',
           'Thursday'    => 'Thursday',
           'Friday'   => 'Friday',
           'Saturday'    => 'Saturday',
           'Sunday'   => 'Sunday'
        );
       echo form_dropdown('day_off', $options2, 'empty');
       echo '<br>';
	 	echo "Address" .' : '. form_input('address', $e_address['value'])."</br>";
	 	echo "Contact Number" .' : '. form_input('contact_number', $e_contactNumber['value'])."</br>";
	 	echo form_submit('mysubmit','Submit!');

	?>

	</div>
</body>
</html>