<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>
<div class="banner"></div>
<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewItem_display">
	
	<div class="noti_div">
      <?php //echo $data2['message']; ?>
  	</div>
	<table border="1px solid black">
		<th>Item ID </th> 
		<th>Item Name </th> 
		<th> Date Delivered</th>
		<th> Date Expired </th>
		<th>Edit </th>
		<th>Delete </th>
	<?php
	
	//echo form_open('');

 	foreach($data as $d){
 		echo "<tr>";
 		echo "<td> ".$d['item_id']." </td> ";
 		echo "<td>".$d['item_name']."</td>";
 		echo "<td>".$d['date_delivered']."</td>";
 		echo "<td>".$d['date_expired']."</td>";
 		echo "<td>". anchor('portal/manager_editItem_info/'.$d['item_id'],'Edit') ."</td>";
 		echo "<td>". anchor('portal/manager_removeItem_info/'.$d['item_id'],'Remove', array('onclick' => "return confirm ('Are you sure want to remove ". $d['item_name'] ." from item list?')")) ."</td>";
 		echo "</tr>";
 		
 	}

	//echo form_close();
	
?>
</div>


</body>
</html>