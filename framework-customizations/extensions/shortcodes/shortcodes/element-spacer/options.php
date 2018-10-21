<?php

$options = array(
    'slabb_wide_spacer_height'   => array(
        'label'   => esc_html__( 'Height for wide screens', 'slabb' ),
        'desc'    => esc_html__( 'Empty space height in px for screens wider than 1439 px', 'slabb' ),
        'type'    => 'slider',
        'value' => 50,
        'properties' => array(
            'min' => 0,
            'max' => 300,
            'step' => 1, 
        ),
    ),
        'slabb_med_spacer_height'   => array(
        'label'   => esc_html__( 'Height for medium screens', 'slabb' ),
        'desc'    => esc_html__( 'Empty space height in px for screens up to 1439 px', 'slabb' ),
        'type'    => 'slider',
        'value' => 50,
        'properties' => array(
            'min' => 0,
            'max' => 300,
            'step' => 1, 
        ),
    ),
        'slabb_small_spacer_height'   => array(
        'label'   => esc_html__( 'Height for small screens', 'slabb' ),
        'desc'    => esc_html__( 'Empty space height in px for screens up to 1199 px', 'slabb' ),
        'type'    => 'slider',
        'value' => 50,
        'properties' => array(
            'min' => 0,
            'max' => 300,
            'step' => 1, 
        ),
    )
);

