<?php

$options = array(
    'contact_title' => array(
        'type'  => 'addable-box',
        'label' => esc_html__( 'Title block', 'slabb' ),
        'box-options' => array(
            'title_string' => array(
                'type'  => 'text',
                'value' => '',
            ),
        ),
        'template' => '{{- title_string }}',
        'limit' => 0,
        'add-button-text' => esc_html__( 'Add string', 'slabb' ),
        'sortable' => true,
    ),
    'contact_is_wide_title' => array(
        'type'  => 'switch',
        'value' => 'no',
        'label' => esc_html__( 'Display full-width title ?', 'slabb' ),
        'desc'  => esc_html__( 'Select title display mode', 'slabb' ),
        'left-choice' => array(
            'value' => 'yes',
            'label' => esc_html__( 'Yes', 'slabb' ),
        ),
        'right-choice' => array(
            'value' => 'no',
            'label' => esc_html__( 'No', 'slabb' ),
        ),
    ),
    'contact_subtitle' => array('type'  => 'text', 'label' =>  esc_html__( 'Subtitle string', 'slabb' ) ),

);