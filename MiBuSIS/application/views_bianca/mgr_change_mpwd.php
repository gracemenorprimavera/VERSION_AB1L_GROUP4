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

<div class="mgr_display" >
	<div id="pwd_div">
		<div class="noti_div">
			<?php echo $message; ?>
			<?php echo validation_errors(); ?>
		</div>
	<br>
	<?php 
	 	//echo validation_errors(); 
	 	echo form_open('portal/save_mpassword');
	 	echo 'Previous Password';
	 	echo form_password(array('name'=>'prevpassword', 'value'=>'', 'size'=>'30', 'class'=>'log')); 
	 	echo '<br>'; 
	 	echo 'New Password';	
	 	echo form_password(array('name'=>'newpassword', 'value'=>'', 'size'=>'30', 'class'=>'log'));
	 	echo '<br>'; 
	 	echo 'Confirm New Password';	
	 	echo form_password(array('name'=>'confirmnewpassword', 'value'=>'', 'size'=>'30', 'class'=>'log'));		
	 	echo '<br><br>'; 	
		echo form_submit(array('id'=>'login_button','name'=>'submit'), 'Change Manager Password'); // alert for previous password
	 	echo form_close();

	 ?>
	</div>
</div>


</body>
</html>