
<?php
	
	echo form_open('portal/emp_burger/1'); 
 	echo form_submit(array('class'=>'mealbutton','name'=>'submit'), 'Burger Meal'); 
 	echo form_close();

 	echo form_open('portal/emp_drinks/2'); 
 	echo form_submit(array('class'=>'mealbutton1','name'=>'submit'), 'Drinks'); 
 	echo form_close();

 	echo form_open('portal/emp_chips/3'); 
 	echo form_submit(array('class'=>'mealbutton1','name'=>'submit'), 'Chips'); 
 	echo form_close();

 	echo form_open('portal/emp_addons/4'); 
 	echo form_submit(array('class'=>'mealbutton1','name'=>'submit'), 'Add-ons'); 
 	echo form_close();

?>

