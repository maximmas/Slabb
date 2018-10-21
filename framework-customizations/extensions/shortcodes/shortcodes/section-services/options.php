<?php

$slabb_services = get_posts( 'post_type=slabb_service&numberposts=-1' );
$slabb_services_title_array = array( '---------------' );

foreach ( $slabb_services as $slabb_service ) {
    $slabb_services_title_array[]   = $slabb_service->post_title;
};

$slabb_services_choices = array_combine( $slabb_services_title_array, $slabb_services_title_array  );
$options = array(
	'services_title' => array(
                'type'  => 'text',
                'value' => '',
                'label' =>  esc_html__( 'Section title', 'slabb' ),
                'desc'  => 	esc_html__( 'Enter the title of this section', 'slabb' )
            ),
	'services_subtitle' => array(
                'type'  => 'text',
                'value' => '',
                'label' =>  esc_html__( 'Section subtitle', 'slabb' ),
                'desc'  => 	esc_html__( 'Enter the subtitle of this section', 'slabb' )
            ),


	 'services_facts' => array(
            'type'  => 'addable-box',
            'label' => esc_html__( 'Fact text block', 'slabb' ),
            'box-options' => array(
                 'fact_text' => array('label' => esc_html__( 'String text', 'slabb'), 'type' => 'text'),
                 'id'    => array( 'type' => 'unique' ),
            ),
            'template' => '{{- fact_text }}', 
            'limit' => 0, 
            'add-button-text' => esc_html__( 'Add string', 'slabb' ),
            'sortable' => true,
    ),

     'services_items' => array(
                'type'  => 'addable-box',
                'label' => esc_html__( 'Services', 'slabb' ),
                'box-options' => array(
                    'service_title' => array(
                        'type'          => 'select',
                        'value'         => '',
                        'label'         => esc_html__( ' Select service', 'slabb' ),
                        'choices'       => $slabb_services_choices,
                        'no-validate'   => false,
                    )
                ),
                'template'          => '{{- service_title }}', 
                'limit'             => 0, 
                'add-button-text'   => esc_html__( 'Add service', 'slabb' ),
                'sortable'          => true,
            ),
    );



  