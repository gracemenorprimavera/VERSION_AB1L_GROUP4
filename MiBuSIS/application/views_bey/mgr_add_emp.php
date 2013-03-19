
<!-- NEIL -->

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

<div class="mgr_nav">
<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
  <div class="noti_div">
      <?php echo $message; ?>
      <?php echo validation_errors(); ?>
  </div>
  FILL IN ULIT UNG DATA PAG MAY ERROR
<?php
 
  echo form_open('portal/manager_addEmp');
//echo 'Employee ID';
  //echo form_input('emp_id', '');
  echo '<br>';
echo 'First Name';
  echo form_input('first_name', ''/*set_value('first_name')*/);
  echo '<br>';
  echo 'Last Name';
echo form_input('last_name', ''/*set_value('last_name')*/);
  echo '<br>';
//echo 'Time Duty';
 // echo form_input('time_duty', '');
 // echo '<br>';
//echo 'Salary';
  //echo form_input('salary', '');
  //echo '<br>';
//echo 'Day Off';
  //echo form_input('day_off', '');
  //echo '<br>';
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
echo 'Address';
  echo form_input('address', '');
  echo '<br>';
echo 'Contact Number';
  echo form_input('contact_number', '');
  echo '<br>';
echo form_submit('submit','Add Employee');
  echo form_close();

 ?>
</div>



</body>
</html>