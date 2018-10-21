<?php

$options = array( 
    'about_text' 		=> array( 'type'  => 'textarea', 'label' =>  esc_html__( 'Description text', 'slabb' ) ),
    'about_position' 	=> array( 'type'  => 'text', 'label' =>  esc_html__( 'Your position', 'slabb' ) ),
    'about_link' => array( 
        'type'  => 'text',
        'label' =>  esc_html__( 'Link to the blog text', 'slabb' ),
        'value' => 'Read my blog' 
        ),
    'about_image' => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Image', 'slabb' ),
	),
);
