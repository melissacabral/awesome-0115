<aside id="sidebar">

	<?php //show a "View all" button if filtered by taxonomy 
	if( is_tax() ){
	?>

	<section class="widget products-view-all">
		<a href="<?php echo get_post_type_archive_link( 'product' ); ?>" class="button">View All Products</a>
	</section>
	
	<?php } ?>

	<section class="widget">
		<h3 class="widget-title">Filter by Brand:</h3>

		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'brand',
				'title_li' => '', 
				'show_count' => true,
			) ); ?>
		</ul>

	</section>

</aside>