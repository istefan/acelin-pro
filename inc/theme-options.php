<?php
/**
 * Customizer Controls - Theme Options.
 *
 * @package Acelin
 */

// User access level
$capability = 'edit_theme_options';

/**
 * Here we will set the options we are going to have in the customizer.
 */
$options = array(); // If you delete this line, the sky will fall down! So you better don't.

/* ---------------------------------------------------------------------------------------------------
    Panels
--------------------------------------------------------------------------------------------------- */

// Theme Options
$options[] = array( 'title'             => __( 'Theme Options', 'acelin' ),
                    'description'       => '',
                    'id'                => 'acelin_theme_options',
                    'priority'          => 28,
                    'theme_supports'    => '',
                    'type'              => 'panel' );


/* ---------------------------------------------------------------------------------------------------
    Front Page
--------------------------------------------------------------------------------------------------- */

// Front Page - Section
$options[] = array( 'title'             => __( 'Front Page', 'acelin' ),
                    'description'       => __( 'Each section will be populated with the content of the selected page.', 'acelin' ),
                    'panel'             => 'acelin_theme_options',
                    'id'                => 'acelin_fp_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

// Front Page Section Pages
for ( $i = 1; $i < 11; $i++ ) { 

    $options[] = array( 'title'             => __( 'Front Page Section', 'acelin' ) . ' ' . $i,
                        'description'       => '',
                        'section'           => 'acelin_fp_options',
                        'id'                => 'acelin_fp_section_' . $i,
                        'default'           => 0,
                        'option'            => 'pages',
                        'sanitize_callback' => '',
                        'type'              => 'control' );

}

/* ---------------------------------------------------------------------------------------------------
    Site Footer
--------------------------------------------------------------------------------------------------- */

// Site Footer - Section
$options[] = array( 'title'             => __( 'Site Footer', 'acelin' ),
                    'description'       => '',
                    'panel'             => 'acelin_theme_options',
                    'id'                => 'acelin_footer_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

// Footer Widgets
$options[] = array( 'title'             => __( 'Footer Widgets', 'acelin' ),
                    'description'       => __( 'The number of widgets in the footer.', 'acelin' ),
                    'section'           => 'acelin_footer_options',
                    'id'                => 'acelin_footer_widgets',
                    'default'           => '3',
                    'option'            => 'select',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        '0' => __( 'No footer widgets', 'acelin' ),
                        '1' => __( '1 Footer Widget', 'acelin' ),
                        '2' => __( '2 Footer Widgets', 'acelin' ),
                        '3' => __( '3 Footer Widgets', 'acelin' ),
                        '4' => __( '4 Footer Widgets', 'acelin' ),
                    ),
                    'type'              => 'control' );

// Footer Credits
$options[] = array( 'title'             => __( 'Footer Credits', 'acelin' ),
                    'description'       => __( 'This will replace the default footer credits', 'acelin' ),
                    'section'           => 'acelin_footer_options',
                    'id'                => 'acelin_footer_credits',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => 'esc_textarea',
                    'type'              => 'control' );

/* ---------------------------------------------------------------------------------------------------
    Portfolio
--------------------------------------------------------------------------------------------------- */

// Site Footer - Section
$options[] = array( 'title'             => __( 'Portfolio', 'acelin' ),
                    'description'       => '',
                    'panel'             => 'acelin_theme_options',
                    'id'                => 'acelin_portfolio_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

// Portfolio Page Title
$options[] = array( 'title'             => __( 'Portfolio Page Title', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_title',
                    'default'           => '',
                    'option'            => 'text',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

// Portfolio Page Description
$options[] = array( 'title'             => __( 'Portfolio Page Description', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_text',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Portfolio Post Columns
$options[] = array( 'title'             => __( 'Portfolio Post Columns', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_cols',
                    'default'           => 2,
                    'option'            => 'select',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        '1' => __( '1 Column', 'acelin' ),
                        '2' => __( '2 Columns', 'acelin' ),
                        '3' => __( '3 Columns', 'acelin' ),
                        '4' => __( '4 Columns', 'acelin' ),
                    ),
                    'type'              => 'control' );

// Portfolio Posts / Page
$options[] = array( 'title'             => __( 'Portfolio Posts / Page', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_posts',
                    'default'           => 12,
                    'option'            => 'number',
                    'sanitize_callback' => '',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ),
                    'type'              => 'control' );

// Display title on Portfolio archive page.
$options[] = array( 'title'             => __( 'Display title on Portfolio archive page.', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_show_title',
                    'default'           => '1',
                    'option'            => 'checkbox',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Display excerpt on Portfolio archive page.
$options[] = array( 'title'             => __( 'Display excerpt on Portfolio archive page.', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_excerpt',
                    'default'           => '',
                    'option'            => 'checkbox',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Slug
$options[] = array( 'title'             => __( 'Portfolio Slug', 'acelin' ),
                    'description'       => __( 'This is helpful for search engines. Example: use books if you showcase your books. Note: If you change the slug, you need to go to Settings > Permalinks and save the changes again.', 'acelin' ),
                    'section'           => 'acelin_portfolio_options',
                    'id'                => 'acelin_portfolio_slug',
                    'default'           => 'portfolio',
                    'option'            => 'text',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

/* ---------------------------------------------------------------------------------------------------
    Custom Scripts
--------------------------------------------------------------------------------------------------- */

// Custom Scripts - Section
$options[] = array( 'title'             => __( 'Custom Scripts', 'acelin' ),
                    'description'       => '',
                    'panel'             => 'acelin_theme_options',
                    'id'                => 'acelin_scripts_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

// Header Scripts
$options[] = array( 'title'             => __( 'Header Scripts', 'acelin' ),
                    'description'       => __( 'This code will output immediately before the closing </head> tag in the document source.', 'acelin' ),
                    'section'           => 'acelin_scripts_options',
                    'id'                => 'acelin_header_scripts',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Footer Scripts
$options[] = array( 'title'             => __( 'Footer Scripts', 'acelin' ),
                    'description'       => __( 'This code will output immediately before the closing </body> tag in the document source.', 'acelin' ),
                    'section'           => 'acelin_scripts_options',
                    'id'                => 'acelin_footer_scripts',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => '',
                    'type'              => 'control' );
