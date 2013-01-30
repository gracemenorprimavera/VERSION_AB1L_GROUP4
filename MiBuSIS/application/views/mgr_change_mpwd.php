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
 	 
 	echo form_open('portal/save_mpassword');
 	echo 'Previous Password';
 	echo form_input(array('name'=>'prevpassword', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
 	echo '<br>'; 
 	echo 'New Password';	
 	echo form_password(array('name'=>'newpassword', 'value'=>'', 'size'=>'30', 'class'=>'log'));	
 	echo '<br>'; 	
	echo form_submit(array('id'=>'login_button','name'=>'submit'), 'Change Manager Password'); // alert for previous password
 	echo form_close();

 ?>
<center>
<?php
	echo $message;
?>
</center>
</div>


</body>
</html>