<?php 
	foreach ($categories as $category) {
		?>
		<li class="category"  data-id="<?php echo $category['id'];?>"><a><?php echo $category['name'];?></a></li>
		<?php
	}
?>