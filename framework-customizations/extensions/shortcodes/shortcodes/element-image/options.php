<?php

$options = array(
    'blog_image' => array(
        'type'  => 'upload',
        'label' => esc_html__( 'Image', 'slabb' ),
        'desc'  => esc_html__( 'Choose image ', 'slabb' ),
    ),
	'blog_caption_text' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Caption text', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter caption text here', 'slabb' )
    ),
    'blog_caption_link' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Link', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter URL here', 'slabb' )
    ),
    'blog_link_text' => array(
        'type'  => 'text',
        'value' => '',
        'label' =>  esc_html__( 'Link text', 'slabb' ),
        'desc'  => 	esc_html__( 'Enter link text here', 'slabb' )
    ),
    'blog_image_target' =>array(
        'type'  => 'switch',
        'value' => '_blank',
        'label' => esc_html__( 'Open the link in new window?', 'slabb' ),
        'left-choice' => array(
            'value' => '_blank',
            'label' => esc_html__( 'Yes', 'slabb' ),
        ),
        'right-choice' => array(
            'value' => '_self',
            'label' => esc_html__( 'No', 'slabb' ),
        ),
    )

);
