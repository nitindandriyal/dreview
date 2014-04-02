<div style="padding: 20px;width:80%">
<h3>Reviews by</h3>
	<?php
		foreach ($result as $row)
		{
	?>
			<div class="reviewGlassy">
				<h3><?php echo $row['id_review']?></h3>
				<span><?php echo $row['review']?></span>
			</div>
	<?php
		}
	?>
</div>
