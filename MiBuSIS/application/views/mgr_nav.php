<div id="menu">
	<ul class="menu">
		<li><a href="#" class="parent"><span>Change Password</span></a>
		   	<div><ul>
				<li> <?php echo anchor('portal/manager_changeEPassword','<span>Change Employee Password</span>')?> </li>
				<li> <?php echo anchor('portal/manager_changeMPassword','<span>Change Manager Password</span>')?> </li>
		    </ul></div> 
		</li>

		<li><a href="#" class="parent"><span>Update Employee List</span></a>
		   <div><ul>
		   		<li> <?php echo anchor('portal/manager_addEmp','<span>Add Employee</span>')?> </li>
				<li> <?php echo anchor('portal/manager_viewEmpList','<span>View Employee List</span>')?> </li>
				<li> <?php echo anchor('portal/editdetails','<span>Edit/Delete Employee</span>')?> </li>				
		    </ul></div> 
		</li>

		<li><a href="#" class="parent"><span>Update Available Items</span></a>
		    <div><ul>
		    	<li> <?php echo anchor('portal/manager_addItem','<span>Add Items</span>')?> </li>
				<li> <?php echo anchor('portal/manager_viewItems','<span>View Items</span>')?> </li>
				<li> <?php echo anchor('portal/manager_editItem','<span>Edit/Delete Items</span>')?> </li>
		    </ul></div> 
		</li>

		<li><a href="#" class="parent"><span>Update Products</span></a>
			<div><ul>
			<li> <?php echo anchor('portal/manager_addProduct', 'Add Product'); ?> </li>
			<li> <?php echo anchor('portal/manager_viewProduct', 'View Product'); ?> </li>
			<li> <?php echo anchor('portal/manager_removeProduct', 'Delete Product'); ?> </li>
			</ul></div> 
		</li>

		<li> <?php echo anchor('portal/manager_viewRemovedItems', 'View Removed Items'); ?> </li>
		<li> <?php echo anchor('portal/manager_viewSales', 'View Sales'); ?> </li>
		
		
		<li> <?php echo anchor('portal/manager_generateReports', 'Generate Report'); ?> </li>
	</ul>
</div>