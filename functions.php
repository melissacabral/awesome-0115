<?php
//turn on some sleeping features
add_theme_support('post-thumbnails');

//make these elements follow new HTML5 guidelines
add_theme_support( 'html5', array( 'search-form', 'comment-list', 'comment-form', 'gallery',
									'caption' )  );
// adds <link> elements on all archives for RSS feeds
add_theme_support('automatic-feed-links' );

add_theme_support( 'custom-background', array( 'default-color' => '5f5d59' ) );

add_theme_support( 'post-formats', array( 'gallery', 'quote', 'audio', 'video', 'image' ) );

//make additional image sizes
add_image_size( 'big-banner', '1300', '300', true );

// adds ability to have editor-style.css for the edit content area
add_editor_style();

/**
 * required - set maximum width for embeds
 */
if ( ! isset( $content_width ) ) $content_width = 710;

/**
 * Make Excerpts Better - change length and [...]
 * @since  0.1
 */
function awesome_ex_length(){
	//on search results, make the excerpt 25 words max. otherwise, 75 words.
	if(is_search()){
		return 25; /*words.*/
	}else{
		return 75; /* words. default is 55 */
	}
}
add_filter( 'excerpt_length', 'awesome_ex_length' );

function awesome_readmore(){
	$link = get_permalink();
	return "<a href='$link' class='readmore'>Keep Reading &hellip;</a>";
}
add_filter( 'excerpt_more', 'awesome_readmore' );

/**
 * Activate Menu Areas
 * @since  0.1
 */
function awesome_menu_areas(){
	register_nav_menus( array(
		'main_menu' => 'Main Menu at the top of every page',
		'utilities' => 'Utility Bar',
	) );
}
add_action( 'init', 'awesome_menu_areas' );

/**
 * Add Widget Areas (dynamic sidebars)
 * @since  0.1
 */
function awesome_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'description' 	=> 'These widgets will appear next to the blog and archive views',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Home Widgets',
		'id'			=> 'home-widgets',
		'description' 	=> 'These widgets will appear on the front page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Page Sidebar',
		'id'			=> 'page-sidebar',
		'description' 	=> 'These widgets will appear next to most pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Footer Widgets',
		'id'			=> 'footer-widgets',
		'description' 	=> 'These widgets will appear at the bottom of everything',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'awesome_widget_areas' );


/**
 * Display 6 most recent products
 */
function awesome_recent_products( $number = 6, $type = 'post' ){
	 //custom query to get  most recent products
	$products_query = new WP_Query( array(
		'post_type' 		=> $type,
		'posts_per_page' 	=> $number,
	) ); 

	//custom loop
	if( $products_query->have_posts() ):
	?>
	<section class="latest-products">
		<h2>Newest Products in the shop:</h2>

		<ul>
			<?php while( $products_query->have_posts() ):
			  		$products_query->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">

					<?php the_post_thumbnail( 'thumbnail' ); ?>

					<div class="product-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; 
	//prevent clashing with other loops
	wp_reset_postdata(); 
}






//no close PHP