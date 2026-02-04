<?php
//if(!is_product() && !is_product_category()): 
if(!is_product()): ?>
	
	<table>
		<tr>
			<td><?php the_field('home__product-key-1'); ?></td>
			<td><?php the_field('home__product-value-1'); ?></td>
		</tr>
		<tr>
			<td><?php the_field('home__product-key-2'); ?></td>
			<td><?php the_field('home__product-value-2'); ?></td>
		</tr>
	</table>
	
	<?php
	endif;