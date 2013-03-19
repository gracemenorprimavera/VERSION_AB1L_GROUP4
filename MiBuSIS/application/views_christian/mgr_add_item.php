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

<div class="mgr_display">
	<div class="noti_div">
      <?php echo $message; ?>
      <?php echo validation_errors(); ?>
  </div>

	<?php 
	 	 
	 	echo form_open('portal/manager_addItem');
		//echo 'Product ID';
	 	//echo form_input('item_id', ''); 
	 	echo '<br>'; 
		echo 'Item Name';
	 	echo form_input('item_name', ''); 
	 	echo '<br>'; ?>
	 
    Date Delivered: <input type="date" name="date_delivered"><br>

    Expiry Date: <input type="date" name="date_expired"><br>

	 <?php
   	echo 'Quantity';
	 	echo form_input('quantity', ''); 
	 	echo '<br>'; 
		echo form_submit('submit','Add Item');
	 	echo form_close();

	 	/* echo 'Date Delivered';
    $options = array(
           'empty' => 'MONTH',
           '01'  => 'January',
           '02'    => 'February',
           '03'   => 'March',
           '04'  => 'April',
           '05'    => 'May',
           '06'   => 'June',
           '07'  => 'July',
           '08'    => 'August',
           '09'   => 'September',
           '10'  => 'October',
           '11'    => 'November',
           '12'   => 'December'
        );
       echo form_dropdown('month_del', $options, 'empty');

        $options = array(
           'empty' => 'DAY', '1'=>'1', '2'=>'2','3'=>'3', '4'=>'4', '5'=> '5',
           '6'=>'6', '7'=>'7','8'=>'8','9'=>'9', '10'=>'10',
           '11'=>'11', '12'=>'12','13'=>'13','14'=>'14', '15'=>'15',
           '16'=>'16', '17'=>'17','18'=>'18','19'=>'19', '20'=>'20',
           '21'=>'21', '22'=>'22','23'=>'23','24'=>'24', '24'=>'24',
           '26'=>'26', '27'=>'27','28'=>'28','29'=>'29', '30'=>'30'

           
        );
       echo form_dropdown('month_del', $options, 'empty');


        $options = array(
           'empty' => 'MONTH',
           '01'  => 'January',
           '02'    => 'February',
           '03'   => 'March',
           '04'  => 'April',
           '05'    => 'May',
           '06'   => 'June',
           '07'  => 'July',
           '08'    => 'August',
           '09'   => 'September',
           '10'  => 'October',
           '11'    => 'November',
           '12'   => 'December'
        );
       echo form_dropdown('month_exp', $options, 'empty');
       echo '<br>'; 
  */
      // echo form_open('test/add_date');
	 ?>
 

 
  
</div>

</body>
</html>