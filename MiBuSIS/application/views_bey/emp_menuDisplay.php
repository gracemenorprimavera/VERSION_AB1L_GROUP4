<table>
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
				$image_loc = base_url().$d['product_image_location'];
				$image_loc1 = "<img class='prodimg' src=".$image_loc.">"; 
				echo anchor('portal/list_order/'.$d['product_id'].'/'.$page, $image_loc1.'<br>'.$d['product_name'].'<br>P '.$d['price'].'.00'); 
			echo "</td>";
			
			if($ctr==$ctr2)
				echo "</tr>";

			$ctr++;

		}
	?>
</table>