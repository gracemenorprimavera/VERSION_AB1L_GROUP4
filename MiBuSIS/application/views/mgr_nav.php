
<?php
	echo anchor('portal/index', 'Logout');

	//echo form_open();
	//$stock_but = array('name'=>'stock_but', 'class'=>'item_but');
	//$sold_but = array('name'=>'sold_but', 'class'=>'item_but');
	//$genreports_but = array('name'=>'genreports_but', 'class'=>'item_but');

	
	//echo form_button($stock_but, 'Stocks');
	//echo anchor('portal/manager_changePassword', 'Change Password');
	//echo "<br>";
?>

<li><a href="#" class="parent"><span>Change Password</span></a>
    <ul>
		<li><?php echo anchor('portal/manager_changeEPassword','<span>Change Employee Password</span>')?></li>
		<li><?php echo anchor('portal/manager_changeMPassword','<span>Change Manager Password</span>')?></li>
    </ul>
</li>

<li><a href="#" class="parent"><span>Update Employee List</span></a>
    <ul>
		<li><?php echo anchor('portal/manager_viewEmpList','<span>View Employee List</span>')?></li>
		<li><?php echo anchor('portal/manager_editEmp','<span>Edit Employee Info</span>')?></li>
		<li><?php echo anchor('portal/manager_addEmp','<span>Add Employee</span>')?></li>
    </ul>
</li>

<li><a href="#" class="parent"><span>Update Available Items</span></a>
    <ul>
		<li><?php echo anchor('portal/manager_viewItems','<span>View Items</span>')?></li>
		<li><?php echo anchor('portal/manager_editItem','<span>Edit Items</span>')?></li>
		<li><?php echo anchor('portal/manager_addItem','<span>Add Items</span>')?></li>
    </ul>
</li>

<?php 	
	echo '<li>';
	echo anchor('portal/manager_viewRemovedItems', 'View Removed Items');
	echo "</li><li>";

	echo anchor('portal/manager_viewSales', 'View Sales');
	echo "</li><li>";

	echo anchor('portal/manager_generateReports', 'Generate Report');
	echo "</li><li>";
	
	echo anchor('portal/manager_addProduct', 'Add Product');
	echo "</li><li>";

	echo anchor('portal/manager_removeProduct', 'Remove Product');
	echo "</li>";

	echo form_close();
?>