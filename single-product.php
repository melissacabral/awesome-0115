<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail( 'large', array('class' => 'product-image') ); ?>

			<div class="entry-content">

				<?php the_meta(); /* outputs a list of ALL custom fields for this post */ ?>

				<?php the_terms( $post->ID, 'brand', 'Brand: '  ); ?>

				<?php the_content(); ?>
			</div>
				
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			//links to 
			previous_post_link( '%link' , '&larr; Older Post: %title' );
			next_post_link( '%link' , 'Newer Post: %title &rarr;'  );				
			?>
		</div>

		

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>