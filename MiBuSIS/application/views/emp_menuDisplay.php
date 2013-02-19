<table border="1px solid black">
	<?php
		$ctr = 0;
		$ctr2=-1;
		foreach ($data as $d) { 
			//echo $ctr;
			$page="";
			if($ctr%4==0) {
				echo "<tr>";
				$ctr2 = $ctr+3;
			}
			$page = $this->uri->segment(2); // needed to redirect to the same page
			echo "<td>";	
				$image_loc = base_url().$d['image_location'];
				$image_loc1 = "<img class='prodimg' src=".$image_loc.">"; 
				echo anchor('portal/list_order/'.$d['image_product_id'].'/'.$page, $image_loc1.'<br>'.$d['image_product_name']); 
			echo "</td>";
			
			if($ctr==$ctr2)
				echo "</tr>";

			$ctr++;

		}
	?>
</table>