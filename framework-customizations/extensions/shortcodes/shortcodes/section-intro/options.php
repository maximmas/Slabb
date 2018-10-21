<?php

$options = array(
	'intro_greeting' => array( 
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Greeting text', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter greeting text here', 'slabb' )
    ),
    'intro_name' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Name', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter your name here', 'slabb' )
    ),
    'intro_position' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Position text', 'slabb' ),
        'desc'  => 	esc_html__( 'Decribe your position here', 'slabb' )
    ),
    'intro_hire_me_button' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( '`Hire me` button text', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter text for \'Hire me\' button', 'slabb' )
    ),
    'intro_portfolio_button' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( '`View Portfolio` button text', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter text for \'View Portfolio\' button', 'slabb' )
        
    ),
    'intro_portfolio_button_link' => array(
        'type'  		=> 'multi-select',
        'value' 		=> '',
        'label' 		=> esc_html__( '`View Portfolio` button link', 'slabb' ),
        'desc'          => 	esc_html__( 'Select portfolio page for \'View Portfolio\' button', 'slabb' ),
        'population' 	=> 'posts',
        'source' 		=> 'page',
        'no-validate' 	=> false,
    ),
    'intro_image' => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Image', 'slabb' ),
		'desc'  => esc_html__( 'Choose image for this section', 'slabb' ),
	),
);
