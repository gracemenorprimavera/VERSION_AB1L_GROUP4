<!--<?php include 'resources.php'; ?>


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
	insert add form here
</div>


</body>
</html>-->

<!-- NEIL -->

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
 
  echo form_open('portal/manager_addEmp');
echo 'Employee ID';
  echo form_input('emp_id', '');
  echo '<br>';
echo 'First Name';
  echo form_input('first_name', '');
  echo '<br>';
  echo 'Last Name';
echo form_input('last_name', '');
  echo '<br>';
echo 'Time Duty';
  echo form_input('time_duty', '');
  echo '<br>';
echo 'Salary';
  echo form_input('salary', '');
  echo '<br>';
echo 'Day Off';
  echo form_input('day_off', '');
  echo '<br>';
echo 'Address';
  echo form_input('address', '');
  echo '<br>';
echo 'Contact Number';
  echo form_input('contact_number', '');
  echo '<br>';
echo form_submit('submit','Add Employee');
  echo form_close();

 ?>
<center>



</body>
</html>