<?php
/**
 * Template Name: Front Page
 *
 * Custom Front Page Template.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 *
 * @package Acelin
 */

// Enqueue front page scripts 
function acelin_front_page_scripts() {

	if ( ! has_post_thumbnail( get_theme_mod( 'acelin_fp_section_1' ) ) )
		return;

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_theme_mod( 'acelin_fp_section_1' ) ), 'featured-image' );

	wp_enqueue_script( 'acelin-backstretch', get_template_directory_uri() . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'acelin-front-page', get_template_directory_uri() . '/js/front-page.js' , array( 'jquery' ), '1.0.0' );

	wp_localize_script( 'acelin-front-page', 'BackStretchImg', array( 'src' => str_replace( 'http:', '', esc_url( $image[0] ) ) ) );

}
add_action( 'wp_enqueue_scripts', 'acelin_front_page_scripts' );

get_header(); ?>

	<div id="primary" class="front-page-content-area">
		<main id="main" class="front-page-sections" role="main">

		<?php
		global $frontpagecounter;

		for ( $i = 1; $i < 11; $i++ ) {

			$frontpagecounter = $i;
			acelin_front_page_section( $i );
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
