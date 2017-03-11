<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Acelin
 */


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acelin_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'page-template-template-no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'acelin_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function acelin_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'acelin_pingback_header' );


/**
 * Echo header scripts in to wp_head().
 */
function acelin_header_scripts() {
	global $post;

	echo html_entity_decode( apply_filters( 'acelin_header_scripts', get_theme_mod( 'acelin_header_scripts' ) ) );

	// If singular, echo scripts from custom field
	if ( is_singular() )
		echo html_entity_decode( get_post_meta( $post->ID, '_acelin_scripts', true ) );

}
add_action( 'wp_head', 'acelin_header_scripts' );
add_filter( 'acelin_header_scripts', 'do_shortcode' );

 
/**
 * Echo the footer scripts.
 */
function acelin_footer_scripts() {
	echo html_entity_decode( apply_filters( 'acelin_footer_scripts', get_theme_mod( 'acelin_footer_scripts' ) ) );
}
add_action( 'wp_footer', 'acelin_footer_scripts' );
add_filter( 'acelin_footer_scripts', 'do_shortcode' );


if ( ! function_exists( 'acelin_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 */
function acelin_excerpt_more() {
	$link = sprintf( '<span class="more-link"><a href="%1$s">%2$s</a></span>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s &raquo;', 'acelin' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'acelin_excerpt_more' );
endif;


if ( ! function_exists( 'acelin_footer_widgets' ) ) :
/**
 * Prints the footer widgets.
 */
function acelin_footer_widgets( $widgets = 3 ) {

	/*
	 * Stop if fotter widgets is set to zero
	 */
	if ( $widgets == 0 )
		return;

	switch ( $widgets ) {
		case '1':
			$widget_class = '';
			break;
		case '2':
			$widget_class = 'one-half';
			break;
		case '3':
			$widget_class = 'one-third';
			break;
		case '4':
			$widget_class = 'one-fourth';
			break;
	}

	// Set 'first' class if needed
	$first = ( $widgets > 1 ) ? 'first' : '';

	/*
	 * The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if ( ! is_active_sidebar( 'footer-1' ) && 
		 ! is_active_sidebar( 'footer-2' ) && 
		 ! is_active_sidebar( 'footer-3' ) && 
		 ! is_active_sidebar( 'footer-4' ) )
		return;

	// If we get this far, we have widgets. Let do this.
	echo '<aside class="widget-area footer-sidebar" role="complementary" itemtype="http://schema.org/WPSideBar">';
	echo '<div class="wrap">';

	printf( '<div class="footer-widgets %s %s">', $first, $widget_class );
		dynamic_sidebar( 'footer-1' );
	echo '</div><!-- .footer-widgets -->';

	if ( $widgets > 1 ) {
		printf( '<div class="footer-widgets %s">', $widget_class );
			dynamic_sidebar( 'footer-2' );
		echo '</div><!-- .footer-widgets -->';
	}

	if ( $widgets > 2 ) {
		printf( '<div class="footer-widgets %s">', $widget_class );
			dynamic_sidebar( 'footer-3' );
		echo '</div><!-- .footer-widgets -->';
	}

	if ( $widgets > 3 ) {
		printf( '<div class="footer-widgets %s">', $widget_class );
			dynamic_sidebar( 'footer-4' );
		echo '</div><!-- .footer-widgets -->';
	}

	echo '</div><!-- .wrap -->';
	echo '</aside><!-- .footer-sidebar -->';

}
endif;


if ( ! function_exists( 'acelin_footer_credits' ) ) :
/**
 * Prints the footer widgets.
 */
function acelin_footer_credits() {

	if ( get_theme_mod( 'acelin_footer_credits' ) ) {
		$footer_credits = html_entity_decode( get_theme_mod( 'acelin_footer_credits' ) );
	} else {
		$footer_credits = acelin_default_footer_credits();
	}

	printf( '<p>%1$s &copy; %2$s <a href="%3$s">%4$s</a> &middot; %5$s</p>',
		__( 'Copyright', 'acelin' ), 
		date( 'Y' ), 
		esc_url( home_url( '/' ) ),
		get_bloginfo( 'name' ),
		$footer_credits
	);

}
endif;


/**
 * Prints the footer widgets.
 */
function acelin_default_footer_credits() {

	$footer_credits = sprintf( '%1$s <a href="%2$s" target="_blank" rel="designer">WPshed</a> &middot; %3$s <a href="%4$s" target="_blank">WordPress</a> ',
		esc_html__( 'Theme by', 'acelin' ),
		esc_url( 'https://wpshed.com' ),
		esc_html__( 'Powered by', 'acelin' ),
		esc_url( 'https://wordpress.org' )
	);
	return $footer_credits;

}


/**
 * Fix linebreak in shortcode content.
 */
function acelin_parse_content( $content ) {
    /* Parse nested shortcodes and add formatting. */
    $content = trim( wpautop( do_shortcode( $content ) ) );
    /* Remove '</p>' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '</p>' )
        $content = substr( $content, 4 );
    /* Remove '<p>' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '<p>' )
        $content = substr( $content, 0, -3 );
    /* Remove any instances of '<p></p>'. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    return $content;
}


/**
 * Turn off comments and pingbacks by default for pages.
 */
function acelin_comments_off_for_pages( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
        $data['ping_status']    = 0;
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'acelin_comments_off_for_pages' );


/**
 * Register Portfolio Post Type.
 */
function acelin_register_post_type_portfolio() {

	$slug = sanitize_title( get_theme_mod( 'acelin_portfolio_slug', 'portfolio' ) );

	$labels = array(
		'name'               	=> _x( 'Projects', 'post type general name', 'acelin' ),
		'singular_name'      	=> _x( 'Project', 'post type singular name', 'acelin' ),
		'menu_name'          	=> _x( 'Portfolio', 'admin menu', 'acelin' ),
		'name_admin_bar'     	=> _x( 'Project', 'add new on admin bar', 'acelin' ),
		'add_new'            	=> _x( 'Add New', 'portfolio', 'acelin' ),
		'add_new_item'       	=> __( 'Add New Project', 'acelin' ),
		'edit_item'          	=> __( 'Edit Project', 'acelin' ),
		'new_item'           	=> __( 'New Project', 'acelin' ),
		'view_item'          	=> __( 'View Projects', 'acelin' ),
		'all_items'          	=> __( 'All Projects', 'acelin' ),
		'search_items'       	=> __( 'Search Projects', 'acelin' ),
		'not_found'          	=> __( 'No Projects found', 'acelin' ),
		'not_found_in_trash' 	=> __( 'No Projects found in Trash', 'acelin' ),
		'parent_item_colon'  	=> '',
	);

	$args = array(
		'labels'             	=> $labels,
		'public'             	=> true,
		'publicly_queryable' 	=> true,
		'show_ui'            	=> true,
		'can_export'         	=> true,
		'show_in_nav_menus'  	=> true,
		'query_var'          	=> true,
		'has_archive'        	=> true,
		'rewrite'            	=> apply_filters( 'acelin_portfolio_post_type_rewrite_args', array(
			'feeds'      	=> true,
			'slug'      	=> $slug,
			'with_front'	=> false,
		) ),
		'capability_type'		=> 'post',
		'hierarchical'       	=> false,
		'menu_position'      	=> '58.995',
		'menu_icon'				=> 'dashicons-portfolio',
		'supports'           	=> array(
									'title',
									'editor',
									'thumbnail',
									'excerpt',
								),
	);

	register_post_type( 'portfolio', apply_filters( 'acelin_portfolio_post_type_args', $args ) );

}

add_action( 'init', 'acelin_register_post_type_portfolio' );


/**
 * Default Portfolio posts / page.
 */
function acelin_portfolio_query( $query ){
    if( ! is_admin()
        && $query->is_post_type_archive( 'portfolio' )
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', get_theme_mod( 'acelin_portfolio_posts', '12' ) );
    }
}
add_action( 'pre_get_posts', 'acelin_portfolio_query' );


/**
 * Display 12 products per page - WooCommerce
 */
function acelin_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'acelin_woocommerce_products_per_page', 20 );


