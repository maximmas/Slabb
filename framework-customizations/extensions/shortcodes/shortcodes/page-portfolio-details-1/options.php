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
    'portfolio_details1_item' =>array(
            'type'          => 'select',
            'value'         =>'Select project',
            'label'         => esc_html__( 'Select project', 'slabb' ),
            'choices' 	    => $slabb_projects_choices,
            'no-validate'   => false,
        )
);








