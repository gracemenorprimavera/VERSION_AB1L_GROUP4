


<?php 
 	 
 	echo form_open('portal/user_login'); 
 	echo form_password(array('name'=>'password', 'value'=>'', 'size'=>'30', 'class'=>'log'));	
 	echo '<br>'; 
	echo form_submit(array('class'=>'log', 'id'=>'login_button','name'=>'submit'), 'Login'); 
 	echo form_close();

 ?>


<center><b>
	<?php echo $message;?>
</b></center>



