<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php 
			if( function_exists('rad_slider') ):
				rad_slider();
			else:
				the_post_thumbnail( 'big-banner' );
			endif;
			 ?>

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
			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

<?php awesome_recent_products( 6, 'product' ); ?>

</main><!-- end #content -->

<?php get_sidebar('frontpage'); //include sidebar-frontpage.php ?>
<?php get_footer(); //include footer.php ?>