<?php

$slabb_projects = get_posts( 'post_type=slabb_project&numberposts=-1' );

$slabb_projects_id_array    = array( '0' );
$slabb_projects_title_array = array( '' );

foreach ( $slabb_projects as $slabb_project ) {
    $slabb_projects_id_array[]      = $slabb_project->ID;
    $slabb_projects_title_array[]   = $slabb_project->post_title;
};

$slabb_projects_choices = array_combine( $slabb_projects_title_array,$slabb_projects_title_array  );


$options = array(
		'projects_title' => array(
			'type'	=> 'text',
			'label' => esc_html__( 'Section title', 'slabb' )
		),
		'projects_description' => array(
			'type'	=> 'textarea',
			'label' => esc_html__( 'Section description', 'slabb' )
		),
     	'projects_items' => array(
                'type'  => 'addable-box',
                'label' => esc_html__( 'Elements', 'slabb' ),
                'box-options' => array(
						'element_type'	=> array(
		                        'type'  	=> 'select',
		                        'value' 	=> 'Project',
		                        'label' 	=> esc_html__( ' Select type of element', 'slabb' ),
		                        'choices' 	=> array(
		                        	'Project'	 => esc_html__( 'Project', 'slabb' ),
		                        	'Quote'		 => esc_html__( 'Quote', 'slabb' ),
									'Fact block' => esc_html__( 'Facts block', 'slabb' ),
	                        	),
		                        'no-validate' => false,
                    	),                		
                        'project_title' 	=> array(
		                        'type'  	=> 'select',
		                        'value' 	=> '',
		                        'label' 	=> esc_html__( ' Select project', 'slabb' ),
		                        'choices' 	=> $slabb_projects_choices,
		                        'no-validate' => false,
                    	),
	                    'project_widget_type' 	=> array(
			                    'type'  	=> 'select',
			                    'value' 	=> '',
			                    'label' 	=> esc_html__( ' Select project widget type', 'slabb' ),
			                    'choices' 	=> array(
		        					'type-1' => esc_html__( 'Type 1', 'slabb' ),
		        					'type-2' => esc_html__( 'Type 2', 'slabb' ),
		        					'type-3' => esc_html__( 'Type 3', 'slabb' ),
		        					'type-4' => esc_html__( 'Type 4', 'slabb' ),
		        					'type-5' => esc_html__( 'Type 5', 'slabb' ),
		        					'type-6' => esc_html__( 'Featured project', 'slabb' ),
			                	),
			                	'no-validate' => false,
			            ),    	
	                    'project_page' 	=> array(
			                    'type'  		=> 'multi-select',
			                    'value' 		=> '',
			                    'label' 		=> esc_html__( ' Select project page', 'slabb' ),
			                    'population' 	=> 'posts',
     							'source' 		=> 'page',
			                    'no-validate' 	=> false,
	                	),
	                	'project_image' 	=> array(
		                        'type'  	=> 'upload',
		                        'value' 	=> '',
		                        'label' 	=> esc_html__( ' Select image for widget', 'slabb' ),
                    	),
	    
		  			   'featured_project_description_text' => array(
		                        'type'  	=> 'textarea',
		                        'value' 	=> '',
		                        'label' 	=> esc_html__( 'Text for the description block', 'slabb' ),
		                        'desc'  	=> esc_html__( 'Only for types 3,5 and featured widgets ', 'slabb' ),
                    	),
                    	'featured_project_description_link' => array(
		                        'type'  	=> 'text',
		                        'value' 	=> '',
		                        'label' 	=> esc_html__( ' Link text for the description block ', 'slabb' ),
		                        'desc'  	=> esc_html__( 'Only for featured projects', 'slabb' ),
                    	),
						'quote_author' => array(
				            'label' => esc_html__( 'Quote author', 'slabb' ),
				            'type' 	=> 'text',
				            'desc' 	=> esc_html__( 'Only for quote elements', 'slabb' ),
				            'value' => '',
				        ),
				        'quote_text' => array(
					            'label' => esc_html__( 'Quote text', 'slabb' ),
					            'type' 	=> 'textarea',
					            'desc' 	=> esc_html__( 'Only for quote elements', 'slabb' ),
					            'value' => '',
				        ),

						'projects_facts' => array(
						            'type'  => 'addable-box',
						            'label' => esc_html__( 'Fact text block', 'slabb' ),
						            'box-options' => array(
						                 'fact_text' => array( 
						                 	'label' => esc_html__( 'String text', 'slabb' ),
						                 	'type' => 'text'
						                 ),
						                 'id'	=> array( 'type' => 'unique' ), 
						                 
						            ),
						            'template' => '{{- fact_text }}', 
						            'limit'				=> 0, 
						            'add-button-text'	=> esc_html__( 'Add string', 'slabb' ),
						            'desc'				=> esc_html__( 'This option for a fact block only', 'slabb' ),
						            'sortable'			=> true,
						    	),
						'projects_facts_link' => array( 
							'type'	=> 'text',
							'label' => esc_html__( 'Facts block link text', 'slabb' ), 
							'desc'	=> esc_html__( 'This option for a fact block only', 'slabb' ),
						),
						'project_portfolio_page' 	=> array(
			                    'type'  		=> 'multi-select',
			                    'value' 		=> '',
			                    'label' 		=> esc_html__( ' Select portfolio page', 'slabb' ),
			                    'desc'			=> esc_html__( 'This option for a fact block only', 'slabb' ),
			                    'population' 	=> 'posts',
     							'source'		=> 'page',
			                    'no-validate'	=> false,
	                	),
                ),
                'template'	=> '{{- element_type }} {{- project_title }}',
                'limit'		=> 0,
                'add-button-text' => esc_html__( 'Add element', 'slabb' ),
                'sortable' => true,
        ),
    	
);