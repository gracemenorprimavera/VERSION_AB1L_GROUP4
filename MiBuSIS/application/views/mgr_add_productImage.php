<?php include 'resources.php'; ?>


<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<div class="logout_emp">
  <?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="mgr_nav" >
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display" id="viewSales_display">
	<?php $id = $this->uri->segment(3); ?>
	<?php echo validation_errors(); ?>
	<?php echo $error; ?>

		<br>Image Location:
	    <img class="species_pic" alt="" src="">
	    <?php //$id = $this->uri->segment(3); /* to identify the taxon id */?> 
	    <?php echo form_open_multipart('portal/do_upload/'.$id);?>
		<input type="file" name="userfile" size="15" /><br>
		<input type="submit" value="Add Product" /><br>
</div>


</body>
</html>