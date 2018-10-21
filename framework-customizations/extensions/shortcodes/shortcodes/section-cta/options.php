<?php

$options = array(
		
	 	'cta_button_text' => array(
            'type'  => 'text',
            'value' => '',
            'label' =>  esc_html__( 'CTA button text', 'slabb' ),
            'desc'  => 	esc_html__( 'Enter CTA button text here ', 'slabb' ),
        ),

	 	'cta_final_symbol' => array(
            'type'  => 'text',
            'value' => '',
            'label' =>  esc_html__( 'CTA text block final symbol', 'slabb' ),
            'desc'  => 	esc_html__( 'Enter final symbol here, like ?, ! etc ', 'slabb' ),
        ),
        
        'cta_text_block' => array(
            'type'  => 'addable-box',
            'label' => esc_html__( 'CTA text block', 'slabb' ),
            'box-options' => array(
                'cta_string' => array(
                    'type'  => 'text',
                    'value' => '',
                    'label' =>  esc_html__( 'String text', 'slabb' ),
                    'desc'  => 	esc_html__( 'Enter string for fact block here', 'slabb' ),
                ),
            ),
            'template' => '{{- cta_string }}',
            'limit' => 0,
            'add-button-text' => esc_html__( 'Add String', 'slabb' ),
            'sortable' => true,
        ),
       'cta_top_border_color' => array(
            'type'  => 'color-picker',
            'value' => '#FFF',
            'label' =>  esc_html__( 'Top border color', 'slabb'),
        ),
        'cta_bottom_border_color' => array(
            'type'  => 'color-picker',
            'value' => '#FFF',
            'label' =>  esc_html__( 'Bottom border color', 'slabb'),
        ),
);