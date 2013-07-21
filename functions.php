<?php

require_once ('lib/admin.php');
require_once ('lib/menu_functions.php');

// Cleaning up the Wordpress Head
function gp_head_cleanup() {
  // remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                         // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                           // WP version
	if (!is_admin()) {
		wp_deregister_script('jquery');                                   // De-Register jQuery
		wp_register_script('jquery', '', '', '', true);                   // It's already in the Header
	}
}
	// launching operation cleanup
	add_action('init', 'gp_head_cleanup');
	// remove WP version from RSS
	function gp_rss_version() { return ''; }
	add_filter('the_generator', 'gp_rss_version');
$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // the URL to check against
$test_url = @fopen($url,'r'); // test parameters
if( $test_url !== false ) { // test if the URL exists

    function load_external_jQuery() { // load external file
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); // register the external file
        wp_enqueue_script('jquery'); // enqueue the external file
    }

    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function
} else {

    function load_local_jQuery() {
        wp_deregister_script('jquery'); // initiate the function
        wp_register_script('jquery', bloginfo('template_url').'/javascript/jquery.min.js', __FILE__, false, '1.7.2', true); // register the local file
        wp_enqueue_script('jquery'); // enqueue the local file
    }

    add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function
}
function load_scroll() {
	wp_register_script ('scroll', get_bloginfo('template_url').'/javascript/scroll.js', 'jQuery');
	wp_enqueue_script('scroll');
	}

    add_action('wp_enqueue_scripts', 'load_scroll'); // initiate the function

// loading jquery reply elements on single pages automatically
function gp_queue_js(){ if (!is_admin()){ if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script( 'comment-reply' ); }
}
	// reply on comments script
	add_action('wp_print_scripts', 'gp_queue_js');

// Fixing the Read More in the Excerpts
// This removes the annoying […] to a Read More link
// function gp_excerpt_more($more) {
// 	global $post;
// 	// edit here if you like
// 	return '...  <a href="'. get_permalink($post->ID) . '" class="more-link button nice radius" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
// }
// add_filter('excerpt_more', 'gp_excerpt_more');

// Adding WP 3+ Functions & Theme Support
function gp_theme_support() {
	add_theme_support( 'post-thumbnails' );      // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
	add_theme_support( 'custom-background' );   // wp custom background
	add_theme_support( 'automatic-feed-links' ); // rss thingy
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/
	// adding post format support
	add_theme_support( 'menus' );            // wp menus
	register_nav_menus(                      // wp3+ menus
		array(
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);
}

// launching this stuff after theme setup
add_action('after_setup_theme','gp_theme_support');
// adding sidebars to Wordpress (these are created in functions.php)
//add_action( 'widgets_init', 'gp_register_sidebars' );
// adding the gp search form (created in functions.php)
add_filter( 'get_search_form', 'gp_wpsearch' );

//Show template in title
add_filter( 'template_include', 'var_template_id', 1000 );
function var_template_id( $t ){
$GLOBALS['current_template_id'] = basename($t);
return $t;
}

function get_template_id( $echo = false ) {
if( !isset( $GLOBALS['current_template_id'] ) )
return false;
if( $echo )
echo $GLOBALS['current_template_id'];
else
return $GLOBALS['current_template_id'];
}
// Call Googles HTML5 Shim, but only for users on old versions of IE
function gp_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'gp_IEhtml5_shim');

?>
