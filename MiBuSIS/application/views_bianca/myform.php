
<?php echo validation_errors(); ?>
<?php echo form_open('portal/user_login'); ?>

<h5> USERNAME 
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="30" /> </h5>
	
<h5> PASSWORD 
<input type="password" name="password" value="<?php echo set_value('password') ?>" size="30" /> </h5>

PASSWORD CONFIRM
<input type="password" name="password_con" value=""  size="30" /> <br>

EMAIL ADDRESS
<input type="text" name="email" value="" size="30" /> <br>

<input type="submit" value="Submit" size="30" />

</form>

