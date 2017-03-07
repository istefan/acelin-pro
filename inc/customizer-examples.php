<?php
/**
 * Customizer Control Examples.
 *
 * @package Acelin
 */

/* ---------------------------------------------------------------------------------------------------
    Examples
--------------------------------------------------------------------------------------------------- */

// Text
$options[] = array( 'title'             => __( 'Text Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_text',
                    'default'           => 'Default value',
                    'option'            => 'text',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

// Textarea
$options[] = array( 'title'             => __( 'Textarea Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_textarea',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => 'esc_textarea',
                    'type'              => 'control' );

// Color
$options[] = array( 'title'             => __( 'Color Picker Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_color',
                    'default'           => '#BADA55',
                    'option'            => 'color',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Radio
$options[] = array( 'title'             => __( 'Radio Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_radio',
                    'default'           => 'value2',
                    'option'            => 'radio',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        'value1' => __( 'Choice 1', 'acelin' ),
                        'value2' => __( 'Choice 2', 'acelin' ),
                        'value3' => __( 'Choice 3', 'acelin' ),
                    ),
                    'type'              => 'control' );

// Checkbox
$options[] = array( 'title'             => __( 'Checkbox Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_checkbox',
                    'default'           => '', // 1 for checked
                    'option'            => 'checkbox',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Select
$options[] = array( 'title'             => __( 'Select Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_select',
                    'default'           => 'value2',
                    'option'            => 'select',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        'value1' => __( 'Choice 1', 'acelin' ),
                        'value2' => __( 'Choice 2', 'acelin' ),
                        'value3' => __( 'Choice 3', 'acelin' ),
                    ),
                    'type'              => 'control' );

// Image Upload
$options[] = array( 'title'             => __( 'Image Upload Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_image',
                    'default'           => '',
                    'option'            => 'image',
                    'sanitize_callback' => 'esc_url',
                    'type'              => 'control' );

// File Upload
$options[] = array( 'title'             => __( 'File Upload Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_id',
                    'id'                => 'acelin_file',
                    'default'           => '',
                    'option'            => 'file',
                    'sanitize_callback' => '',
                    'type'              => 'control' );


// URL
$options[] = array( 'title'             => __( 'URL Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_2',
                    'id'                => 'acelin_url',
                    'default'           => '',
                    'option'            => 'url',
                    'sanitize_callback' => 'esc_url',
                    'type'              => 'control' );

// Email
$options[] = array( 'title'             => __( 'Email Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_2',
                    'id'                => 'acelin_email',
                    'default'           => '',
                    'option'            => 'email',
                    'sanitize_callback' => 'sanitize_email',
                    'type'              => 'control' );

// Password
$options[] = array( 'title'             => __( 'Password Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_2',
                    'id'                => 'acelin_password',
                    'default'           => '',
                    'option'            => 'password',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

// number
$options[] = array( 'title'             => __( 'number Field (px)', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_2',
                    'id'                => 'acelin_number',
                    'default'           => 70,
                    'option'            => 'number',
                    'sanitize_callback' => '',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                        'class' => 'example-class',
                    ),
                    'type'              => 'control' );

// Pages
$options[] = array( 'title'             => __( 'Pages Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_pages',
                    'default'           => 0,
                    'option'            => 'pages',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Categories
$options[] = array( 'title'             => __( 'Categories Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_categories',
                    'default'           => 0,
                    'option'            => 'categories',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Tags
$options[] = array( 'title'             => __( 'Tags Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_tags',
                    'default'           => '',
                    'option'            => 'tags',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Post Types
$options[] = array( 'title'             => __( 'Post Types Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_post_types',
                    'default'           => '',
                    'option'            => 'post_types',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Posts
$options[] = array( 'title'             => __( 'Posts Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_posts',
                    'default'           => '',
                    'option'            => 'posts',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Users
$options[] = array( 'title'             => __( 'Users Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_users',
                    'default'           => '',
                    'option'            => 'users',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Menus
$options[] = array( 'title'             => __( 'Menus Field', 'acelin' ),
                    'description'       => '',
                    'section'           => 'acelin_section_3',
                    'id'                => 'acelin_menus',
                    'default'           => '',
                    'option'            => 'menus',
                    'sanitize_callback' => '',
                    'type'              => 'control' );


             