<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			

			<div class="entry-content">
				<?php //if showing a single post or page, display all the content, otherwise show the short content
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt();
				}
				?>

				<?php //get the price. if it exists, show it in a price tag
				$price = get_post_meta( $post->ID, 'Price', true ); 
				if($price){
				?>
				<span class="product-price"><?php echo $price; ?></span>

				<?php } //end if price ?>

			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			//run pagenavi if the plugin exists, otherwise do the default prev/next buttons
			if( function_exists('wp_pagenavi') && !wp_is_mobile() ){
				wp_pagenavi();
			}else{
				previous_posts_link( '&larr; Newer Posts' );
				next_posts_link( 'Older Posts &rarr;' );	
			}					
			?>
		</div>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('shop'); //include sidebar-shop.php ?>
<?php get_footer(); //include footer.php ?>