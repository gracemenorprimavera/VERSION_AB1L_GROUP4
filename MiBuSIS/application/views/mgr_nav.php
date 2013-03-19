<style type="text/css">
  #navigation {font-size:20px; width:280px;}
  #navigation ul {margin:0px; padding:0px;}
  #navigation li {list-style: none;} 

  ul.top-level {background:#666;}
  ul.top-level li {
   border-bottom: #fff solid;
   border-top: #fff solid;
   border-width: 1px;
  }

  #navigation a {
   color: #fff;
   cursor: pointer;
   display:block;
   height:40px;
   width: 250px;
   line-height: 25px;
   text-indent: 10px;
   text-decoration:none;
   padding-top: 7px;
  }
  #navigation a:hover{
   text-decoration:underline;
  }

  #navigation li:hover {
   background: #f90;
   position: relative;
  }

  ul.sub-level {
    display: none;
  }
  li:hover .sub-level {
      background: #999;
      border: #fff solid;
      border-width: 1px;
      display: block;
      position: absolute;
      left: 280px;
      top: 5px;
  }
  ul.sub-level li {
      border: none;
      float:left;
      width:240;
  }

  
</style>

<div id="navigation">
    <ul class="top-level">
        <li><a href="#">Change Password</a>
            <ul class="sub-level">
                <li> <?php echo anchor('portal/manager_changeEPassword','<span>Employee Password</span>')?></li>
                <li> <?php echo anchor('portal/manager_changeMPassword','<span>Manager Password</span>')?></li>
            </ul>
        </li>
        <li><a href="#">Update Employee</a>
            <ul class="sub-level">
              <li> <?php echo anchor('portal/manager_addEmp','<span>Add Employee</span>')?> </li>
              <li> <?php echo anchor('portal/manager_viewEmpList','<span>View Employee List</span>')?> </li>
              <li> <?php echo anchor('portal/editdetails','<span>Edit/Delete Employee</span>')?> </li>        
            </ul>
        </li>
        <li><a href="#">Update Available Items</a>
            <ul class="sub-level">
              <li> <?php echo anchor('portal/manager_addItem','<span>Add Items</span>')?> </li>
              <li> <?php echo anchor('portal/manager_viewItems','<span>View Items</span>')?> </li>
              <li> <?php echo anchor('portal/manager_editItem','<span>Edit/Delete Items</span>')?> </li>
            </ul>
        </li>
        <li><a href="#">Update Product</a>
            <ul class="sub-level">
              <li> <?php echo anchor('portal/manager_addProduct', 'Add Product'); ?> </li>
              <li> <?php echo anchor('portal/manager_viewProduct', 'View Product'); ?> </li>
              <li> <?php echo anchor('portal/manager_removeProduct', 'Delete Product'); ?> </li>      
            </ul>
        </li>
        <li> <?php echo anchor('portal/manager_viewRemovedItems', 'View Removed Items'); ?> </li>
       
        <li> <?php echo anchor('portal/manager_viewSales', 'View Sales'); ?> </li>
    
        <li> <?php echo anchor('portal/manager_generateReports', 'Generate Report'); ?> </li>

    </ul>
</div>