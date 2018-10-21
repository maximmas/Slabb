<?php if (!defined('FW')) die('Forbidden');

					
$options = array(
	'project_general_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'GENERAL SETTINGS', 'slabb' ),
        'options' => array(
            'project_general_date' => array(
                'type'  => 'date-picker',
                'value' => '',
                'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                'label' => esc_html__( 'Date', 'slabb' ),
                'desc'  => esc_html__( 'Enter project\'s date here', 'slabb' ),
                'monday-first' => true, 
                'min-date' => date('01-01-1900'), 
                'max-date' => null, 
            ),
            'project_general_client' => array(
                'type'  => 'text',
                'value' => '',
                'label' =>  esc_html__( 'Client', 'slabb' ),
                'desc'  => 	esc_html__( 'Enter client\'s name here', 'slabb' )
            ),
            'project_general_page' => array(
                'type'  		=> 'multi-select',
                'value' 		=> '',
                'label' 		=> esc_html__( 'Page', 'slabb' ),
                'desc'          => esc_html__( 'Select page with project\'s details', 'slabb' ),
                'help'          => esc_html__( 'This option uses on Home and Portfolio pages', 'slabb' ),
                'population' 	=> 'posts',
                'source' 		=> 'page',
                'no-validate' 	=> false,
            ),
            'project_general_description' => array(
                'type'          => 'textarea',
                'label'         => esc_html__( 'Short description', 'slabb' ),
            )
        ),
    ),
    'project_story_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'STORY SECTION', 'slabb' ),
        'options' => array(
            'project_story_title' => array(
                'type'  => 'text',
                'value' => '',
                'label' =>  esc_html__( 'Title', 'slabb' ),
            ),
            'project_story_description' => array(
                'type'  => 'textarea',
                'value' => '',
                'label' =>  esc_html__( 'Description', 'slabb' ),
            ),
            'project_story_images' => array(
                'type'  => 'multi-upload',
                'label' => esc_html__( 'Select images', 'slabb' ),
                'desc'  => esc_html__( 'Images resolution should be 700x700px or 1080x700px', 'slabb' ),
                'images_only' => true,
            ),

        ),
    ),
    'project_development_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'DEVELOPMENT PROCESS SECTION', 'slabb' ),
        'options' => array(
            'project_development_milestone' => array(
                'type'  => 'addable-box',
                'label' => esc_html__('Milestone blocks', 'slabb'),
                'box-options' => array(
                    'milestone_title' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' =>  esc_html__( 'Title', 'slabb' ),
                        'desc'  => 	esc_html__( 'Enter milestone title here', 'slabb' )
                    ),
                    'milestone_text' => array(
                        'type'  => 'textarea',
                        'value' => '',
                        'label' =>  esc_html__( 'Text', 'slabb' ),
                        'desc'  => 	esc_html__( 'Enter milestone text here', 'slabb' )
                    ),
                    'milestone_text_position' =>  array(
                        'type'  => 'switch',
                        'value' => 'left',
                        'label' => esc_html__( 'Text position ( left/right )', 'slabb' ),
                        'left-choice' => array(
                            'value' => 'left',
                            'label' => esc_html__( 'Left', 'slabb' ),
                        ),
                        'right-choice' => array(
                            'value' => 'right',
                            'label' => esc_html__( 'Right', 'slabb' ),
                        ),
                    ),
                    'list_item' => array(
                        'type'  => 'addable-option',
                        'label' => esc_html__( 'List', 'slabb' ),
                        'option' => array( 'type' => 'text' ),
                        'add-button-text' => esc_html__( 'Add item', 'slabb' ),
                        'sortable' => true,
                    )

                ),
                'template' => '{{- milestone_title }}',
                'limit' => 0,
                'add-button-text' => esc_html__('Add milestone', 'slabb'),
                'sortable' => true,
            ),
        ),
    ),

    'project_gallery_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'IMAGES GALLERY SECTION', 'slabb' ),
        'options' => array(
            'project_gallery_title' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' =>  esc_html__( 'Title', 'slabb' ),
            ),
            'project_gallery_description' => array(
                        'type'  => 'textarea',
                        'value' => '',
                        'label' =>  esc_html__( 'Description', 'slabb' ),
                    ),
            'project_gallery_main_image' => array(
                'type'  => 'upload',
                'label' => esc_html__( 'Main image', 'slabb' ),
                'desc' => esc_html__(  'Image resolution should be 1080x700px', 'slabb' ),
                'images_only' => true,
            ),
            'project_gallery_images' => array(
                        'type'  => 'multi-upload',
                        'label' => esc_html__( 'Gallery images', 'slabb' ),
                        'desc' => esc_html__(  'Images resolution should be 700x700px', 'slabb' ),
                        'images_only' => true,
               
            ),
            'project_fact_block' => array(
                'type'  => 'addable-box',
                'label' => esc_html__('Fact Check block', 'slabb'),
                'box-options' => array(
                    'project_fact_string' => array(
                        'type'  => 'text',
                        'label' =>  esc_html__( 'String text', 'slabb' ),
                    )
                ),
                'template' => '{{- project_fact_string }}',
                'limit' => 0, 
                'add-button-text' => esc_html__( 'Add String', 'slabb' ),
                'sortable' => true,
            ),
        ),
    ),

            'project_parallax_settings'     => array(
                'type'             => 'box',
                'title'            => esc_html__( 'PARALLAX GALLERY SECTION ( FOR COMMERCIAL VERSION ONLY )', 'slabb' ),
                'options' => array(
                    'parallax_title' => array(
                                'type'  => 'text',
                                'value' => '',
                                'label' =>  esc_html__( 'Title', 'slabb' ),
                            ),
                    'parallax_description' => array(
                                'type'  => 'textarea',
                                'value' => '',
                                'label' =>  esc_html__( 'Description', 'slabb' ),
                            ),
                    'parallax_images' => array(
                                'type'  => 'multi-upload',
                                'value' => '',
                                'label' => esc_html__( 'Images', 'slabb' ),
                                'desc' =>  esc_html__( 'Images resolution should be 1920x1340px', 'slabb' ),

                            ),
                ),
            ),
            
   
    'project_video_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'VIDEO SECTION ( FOR COMMERCIAL VERSION ONLY )', 'slabb' ),
        'options' => array(
            'video_url' => array(
                        'type'  => 'text',
                        'label' =>  esc_html__( 'Video URL', 'slabb' ),
                    ),
            'video_img' => array(
                'type'  => 'upload',
                'label' =>  esc_html__( 'Static image', 'slabb' ),
                'desc' =>   esc_html__( 'Image resolution should be 1440x710px', 'slabb' ),
            ),
            'project_video_title' => array(
                'type'  => 'addable-box',
                'label' => esc_html__('Title block', 'slabb'),
                'box-options' => array(
                    'video_title_string' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' =>  esc_html__( 'Title string', 'slabb' ),
                        'desc'  =>  esc_html__( 'Enter text here', 'slabb' ),
                    ),
                ),
                'template' => '{{- video_title_string }}',
                'limit' => 0, 
                'add-button-text' => esc_html__('Add string', 'slabb'),
                'sortable' => true,
            ),
        ),
    ),

    'project_result_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'RESULT SECTION', 'slabb' ),
        'options' => array(
            'result_title' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' =>  esc_html__( 'Title', 'slabb' ),
                     ),
            'result_text' => array(
                        'type'  => 'textarea',
                        'value' => '',
                        'label' =>  esc_html__( 'Text', 'slabb' ),
                     ),
            'result_url' => array(
                'type'      => 'text',
                'value'     => '',
                'label'     =>  esc_html__( 'Project link', 'slabb' ),
                'desc'      =>  esc_html__( 'Link to finished project', 'slabb' ),
             ),
            'result_gallery_page' => array(
                'type'          => 'multi-select',
                'value'         => '',
                'label'         => esc_html__( 'Portfolio gallery page', 'slabb' ),
                'population'    => 'posts',
                'source'        => 'page',
                'no-validate'   => false,
            ),
            'result_parallax_image' => array(
                'type'  => 'upload',
                'value' => '',
                'label' => esc_html__( 'Background image', 'slabb' ),
                'desc' =>  esc_html__( 'Image resolution should be 1920 x 1150px', 'slabb' ),
            ),
        ),
    ),

    'project_nav_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'NAVIGATION SECTION', 'slabb' ),
        'options' => array(
            'project_next_page' => array(
                'type'          => 'multi-select',
                'value'         => '',
                'label'         => esc_html__( 'Next project', 'slabb' ),
                'desc'          => esc_html__( 'Select next project\'s details page', 'slabb' ),
                'population'    => 'posts',
                'source'        => 'page',
                'no-validate'   => false,
            ),
            'project_prev_page' => array(
                'type'          => 'multi-select',
                'value'         => '',
                'label'         => esc_html__( 'Previous project', 'slabb' ),
                'desc'          => esc_html__( 'Select previous project\'s details page', 'slabb' ),
                'population'    => 'posts',
                'source'        => 'page',
                'no-validate'   => false,
            ),
         ),
    ),

    'project_portfolio_settings'     => array(
        'type'             => 'box',
        'title'            => esc_html__( 'PORTFOLIO WIDGET SETTINGS', 'slabb' ),
        'options' => array(
            'is_wide_container' =>array(
                    'type'  => 'switch',
                    'value' => 'no',
                    'label' => esc_html__( 'Display in wide container?', 'slabb' ),
                    'left-choice' => array(
                        'value' => 'no',
                        'label' => esc_html__( 'No', 'slabb' ),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'slabb' ),
                    ),
            ),
            'portfolio_main_image' => array(
                        'type'  => 'upload',
                        'images_only' => true,
                        'label' =>  esc_html__( 'Main image', 'slabb' ),
            ),
            'portfolio_add_images' => array(
                        'type'  => 'addable-option',
                        'label' => esc_html__( 'Additional images', 'slabb' ),
                        'option' => array( 
                            'type' => 'upload',
                            'images_only' => true,
                        ),
                        'add-button-text' => esc_html__( 'Add image', 'slabb' ),
                        'sortable' => true,
            )
        ),
    ),
);
