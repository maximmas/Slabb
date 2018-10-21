<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'page_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'Page settings', 'slabb' ),
        'options' => array(
           'header_type' => array(
               'type'  => 'select',
               'value' => 'type-1',
               'label' => esc_html__( 'Select header type', 'slabb' ),
               'choices' => array(
                   'type-1' => esc_html__( 'No header', 'slabb' ),
                   'type-4' => esc_html__( 'Empty header', 'slabb' ),
                   'type-2' => esc_html__( 'Header with page title', 'slabb' ),
                   'type-3' => esc_html__( 'Header with page title and breadcrumbs', 'slabb' ),
               ),
               'no-validate' => false,
           )
        ),
    ),
);