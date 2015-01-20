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









//no close PHP