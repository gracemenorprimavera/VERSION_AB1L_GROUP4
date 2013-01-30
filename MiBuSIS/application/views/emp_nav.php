

<?php
	
	echo anchor('portal/index', 'Logout');

	echo form_open(); // indicate the page here !!!!
	$burger_but = array('name'=>'burger_but', 'class'=>'item_but');
	$drinks_but = array('name'=>'drinks_but', 'class'=>'item_but');
	$chips_but = array('name'=>'chips_but', 'class'=>'item_but');
	$addons_but = array('name'=>'addons_but', 'class'=>'item_but');
	
	echo form_button($burger_but, 'Burger Meal');
	echo anchor('portal/burger', 'Burger Meal');
	
	echo form_button($drinks_but, 'Drinks');
	echo anchor('portal/drinks', 'Drinks');

	echo form_button($chips_but, 'Chips');
	echo anchor('portal/chips', 'Chips');

	echo form_button($addons_but, 'Add-ons');
	echo anchor('portal/addons', 'Add-ons');

	echo form_close();

?>

