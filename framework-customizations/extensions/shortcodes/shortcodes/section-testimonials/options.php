<?php

$slabb_testimonials             = get_posts('post_type=slabb_testimonial&numberposts=-1');
$slabb_testimonial_title_array  = array('');

foreach ( $slabb_testimonials as $slabb_testimonial ) {
    $slabb_testimonial_id_array[]       = $slabb_testimonial->ID;
    $slabb_testimonial_title_array[]    = $slabb_testimonial->post_title;
};

$slabb_testimonial_choices = array_combine($slabb_testimonial_title_array, $slabb_testimonial_title_array);

$options = array(
        'testimonial_items' => array(
            'type'  => 'addable-box',
            'label' => esc_html__( 'Testimonials', 'slabb' ),
            'box-options' => array(
                'testimonial_title' => array(
                    'type'          => 'select',
                    'value'         => '',
                    'label'         => esc_html__( 'Select testimonial', 'slabb' ),
                    'choices'       => $slabb_testimonial_choices,
                    'no-validate'   => false,
                ),
                'testimonial_widget_type' => array(
                        'type'  => 'switch',
                        'label' => esc_html__( 'Display this item in wide container?', 'slabb' ),
                        'left-choice' => array(
                            'value' => 'normal',
                            'label' => esc_html__( 'No', 'slabb' ),
                        ),
                        'right-choice' => array(
                            'value' => 'wide',
                            'label' => esc_html__( 'Yes', 'slabb' ),
                        ),
                    ),
            ),
            'template'          => '{{- testimonial_title }}',
            'limit'             => 0,
            'add-button-text'   => esc_html__( 'Add testimonial', 'slabb' ),
            'sortable'          => true,
        ),
    'title_testimonial_block' => array(
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

    );