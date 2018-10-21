<?php
if (!defined('FW')) die('Forbidden');

global $post;

$slabb_all_projects         = get_posts( 'post_type=slabb_project&numberposts=-1&orderby=date' );
$slabb_portfolio_item       = $atts[ 'portfolio_details1_item' ]; 

/* Default values */
$slabb_portfoilo_settings   = array(
    'title'                 => '',
    'date'                  => '',
    'client'                => '',
    'category'              => '',
    'story_title'           => '',
    'story_description'     => '',
    'story_images'          => array(),
    'result_title'          => '',
    'result_description'    => '',
    'result_url'            => '',
    'result_gallery_page'   => array( 'url' => home_url ( '/' ) ),
    'result_parallax_img'   => '',
    'milestones'            => '',
    'gallery_title'         => '', 
    'gallery_main_image'    => array( 'url' => home_url ( '/' ) ),
    'gallery_description'   => '',
    'gallery_images'        => array(),
    'fact_strings'          => array(),
    'next_project'          => '',
    'prev_project_id'       => '',
    'next_project_id'       => ''
);

$slabb_parallax_img         = '';  
$slabb_next_project_url     = $slabb_prev_project_url   = home_url ( '/' );
$slabb_next_project_title   = $slabb_prev_project_title = 'Home';

foreach ( $slabb_all_projects as $slabb_all_project ) {
    if ( $slabb_all_project->post_title == $slabb_portfolio_item ) {
        $slabb_portfoilo_settings[ 'title' ]                = $slabb_portfolio_item;
        $slabb_portfoilo_settings[ 'date' ]                 = fw_get_db_post_option( $slabb_all_project->ID, 'project_general_date' );
        $slabb_portfoilo_settings[ 'client' ]               = fw_get_db_post_option( $slabb_all_project->ID, 'project_general_client' );
        $slabb_portfolio_tax                                =  wp_get_object_terms( $slabb_all_project->ID, 'slabb_projects_tax' );
        $slabb_portfoilo_settings[ 'category' ]             = ( !empty( $slabb_portfolio_tax ) ) ? $slabb_portfolio_tax[0]->name : '';
        $slabb_portfoilo_settings[ 'story_title' ]          = fw_get_db_post_option( $slabb_all_project->ID, 'project_story_title' );
        $slabb_portfoilo_settings[ 'story_description' ]    = fw_get_db_post_option( $slabb_all_project->ID, 'project_story_description' );
        $slabb_portfoilo_settings[ 'story_images' ]         = fw_get_db_post_option( $slabb_all_project->ID, 'project_story_images' );
        $slabb_portfoilo_settings[ 'result_title' ]         = fw_get_db_post_option( $slabb_all_project->ID, 'result_title' );
        $slabb_portfoilo_settings[ 'result_description' ]   = fw_get_db_post_option( $slabb_all_project->ID, 'result_text' );
        $slabb_portfoilo_settings[ 'result_url' ]           = fw_get_db_post_option( $slabb_all_project->ID, 'result_url' );
        $slabb_portfoilo_settings['result_gallery_page']    = fw_get_db_post_option( $slabb_all_project->ID, 'result_gallery_page' );
        $slabb_portfoilo_settings['result_parallax_img']    = fw_get_db_post_option( $slabb_all_project->ID, 'result_parallax_image' );
        $slabb_portfoilo_settings[ 'milestones' ]           = fw_get_db_post_option( $slabb_all_project->ID, 'project_development_milestone' );
        $slabb_portfoilo_settings[ 'gallery_title' ]        = fw_get_db_post_option( $slabb_all_project->ID, 'project_gallery_title' );
        $slabb_portfoilo_settings[ 'gallery_description' ]  = fw_get_db_post_option( $slabb_all_project->ID, 'project_gallery_description' );
        $slabb_portfoilo_settings[ 'gallery_main_image' ]   = fw_get_db_post_option( $slabb_all_project->ID, 'project_gallery_main_image' );
        $slabb_portfoilo_settings[ 'gallery_images' ]       = fw_get_db_post_option( $slabb_all_project->ID, 'project_gallery_images' );
        $slabb_portfoilo_settings[ 'fact_strings' ]         = fw_get_db_post_option( $slabb_all_project->ID, 'project_fact_block' );
        $slabb_portfoilo_settings[ 'next_project' ]         = fw_get_db_post_option( $slabb_all_project->ID, 'project_next_page' );
        $slabb_portfoilo_settings[ 'prev_project_id' ]      = fw_get_db_post_option( $slabb_all_project->ID, 'project_prev_page' );
        $slabb_portfoilo_settings[ 'next_project_id' ]      = fw_get_db_post_option( $slabb_all_project->ID, 'project_next_page' );
        
       
        if ( empty ( $slabb_portfoilo_settings['result_parallax_img'] ) ){
            $slabb_parallax_img = '';    
        } else {
            $slabb_parallax_img = $slabb_portfoilo_settings['result_parallax_img']['url'];
        };
        
        if ( empty( $slabb_portfoilo_settings[ 'next_project_id' ] ) ){
            $slabb_next_project_url     = home_url ( '/' );
            $slabb_next_project_title   = 'Home';    
        } else {
            $slabb_next_project_url     = get_permalink( $slabb_portfoilo_settings[ 'next_project_id' ][0] );
            $slabb_next_project_title   = get_the_title( $slabb_portfoilo_settings[ 'next_project_id' ][0] );    
        };
        if ( empty( $slabb_portfoilo_settings[ 'prev_project_id' ] ) ){
            $slabb_prev_project_url     = home_url ( '/' );
            $slabb_prev_project_title   = 'Home';    
        } else {
            $slabb_prev_project_url     = get_permalink( $slabb_portfoilo_settings[ 'prev_project_id' ][0] );
            $slabb_prev_project_title   = get_the_title( $slabb_portfoilo_settings[ 'prev_project_id' ][0] );    
        };

        if ( empty( $slabb_portfoilo_settings['result_gallery_page'] ) ) {
            $slabb_portfoilo_settings['result_gallery_page'][0]    = home_url ( '/' );
        };

        if ( empty( $slabb_portfoilo_settings['gallery_main_image'] ) ){
            $slabb_portfoilo_settings['gallery_main_image']['url'] = home_url ( '/' );  
        }
       

    };
};

?>


<!-- Intro -->
            <div class="section-bg bg_yellow section-border-top section-border-bottom">
                <section class="intro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="intro-wrap col-xs-5 col-sm-4 col-sm-offset-1 col-lg-3">
                                <div class="intro__content">
                                    <h1 class="intro__heading intro__heading_type-2 intro__heading_line-left horizontal-line horizontal-line_left"><span class="horizontal-line__text"><?php echo esc_html( $slabb_portfoilo_settings[ 'title' ] ); ?></span></h1>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-4 col-sm-offset-1 col-lg-1 col-lg-offset-0">
                                <div class="project-info">
                                    <div class="project-info__item">
                                        <?php esc_html_e( 'Date: ', 'slabb' );?>
                                    <div>
                                    <strong><?php echo esc_html( $slabb_portfoilo_settings[ 'date' ] ); ?></strong>
                                </div>
                            </div>
                                    <div class="project-info__item">
                                        <?php esc_html_e( 'Client: ', 'slabb' );?>
                                         <div>
                                            <strong><?php echo esc_html( $slabb_portfoilo_settings[ 'client' ] ); ?></strong>
                                        </div>
                                    </div>
                                    <div class="project-info__item">
                                        <?php esc_html_e( 'Category: ', 'slabb' );?>
                                        <div>
                                            <strong>
                                               <a class="link_underline"
                                                   href="<?php echo esc_url( get_permalink( $slabb_portfoilo_settings['result_gallery_page'][0] ) );?>">
                                                   <?php echo esc_html( $slabb_portfoilo_settings[ 'category' ] ); ?>  
                                                </a>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Intro end -->
            <section class="project-story">
                <div class="container-fluid">
                    <div class="pretext">
                        <div class="row">
                            <div class="col-xs-5 col-md-1 block-center">
                                <h2 class="heading_vertical-line responsive-text">
                                    <span>
                                       <?php echo esc_html( $slabb_portfoilo_settings[ 'story_title' ] ); ?>
                                    </span>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-4 col-lg-3 block-center text-center">
                                <em>
                                <?php echo esc_html( $slabb_portfoilo_settings[ 'story_description' ] ); ?>
                                </em>
                            </div>
                        </div>
                    </div>
                    <div class="masonry masonry_size-2 gallery-masonry row" data-horizontal="true">
                        <div class="masonry__sizer"></div>
                        <?php
                        foreach ( $slabb_portfoilo_settings['story_images'] as $slabb_story_image ){
                            $slabb_img_url  = $slabb_story_image[ 'url' ];
                            $slabb_img_id   = $slabb_story_image[ 'attachment_id' ];
                            $slabb_image_fullurl = wp_get_attachment_url( $slabb_img_id );
                            $slabb_img_size = getimagesize( $slabb_image_fullurl );
                            /* square images display in .xs-2 container
                            /* rectangle images display in .xs-3 container
                            */
                            $slabb_col = ( $slabb_img_size[0] == $slabb_img_size[1] ) ? 2 : 3;?>
                            <div class="masonry__item gallery__item col-xs-<?php echo esc_attr( $slabb_col ); ?>">
                                <a href="<?php echo esc_url( $slabb_img_url );?>"
                                   class="img-zoom"
                                   title="Description">
                                    <div class="img-mask os-animation" data-os-animation="imageLoad">
                                        <img src="<?php echo esc_url( $slabb_img_url );?>"
                                             alt="<?php echo esc_html( $slabb_portfoilo_settings[ 'story_title' ] ); ?>">
                                        <div class="mask"></div>
                                    </div>
                                </a>
                            </div>
                        <?php }; ?>
                    </div>
                </div>
            </section>
            <div class="section-bg">
                <section class="project-desc">
                    <div class="container-fluid">
                    <?php
                    if ( !empty( $slabb_portfoilo_settings['milestones'] ) ){
                        foreach( $slabb_portfoilo_settings['milestones'] as $slabb_milestone ){
                            $slabb_classes = array();
                            if ( $slabb_milestone[ 'milestone_text_position' ] == 'left' ){
                                $slabb_classes[0] = 'pull-right';
                                $slabb_classes[1] = 'text-right';
                                $slabb_classes[2] = 'col-lg-offset-1';
                            } else {
                                $slabb_classes[0] = $slabb_classes[1] = $slabb_classes[2] = '';
                            };?>
                        <div class="project-desc__item">
                            <div class="row">
                                <div class="project-desc__title col-xs-5 col-md-2 <?php echo esc_attr( $slabb_classes[0] );?>">
                                    <div class="horizontal-line <?php echo esc_attr( $slabb_classes[1] );?>">
                                        <h2 class="responsive-text horizontal-line__text heading_half">
                                            <span>
                                                <?php echo esc_html( $slabb_milestone[ 'milestone_title' ] );?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-3 col-lg-2 <?php echo esc_attr( $slabb_classes[2] );?>">
                                    <?php
                                    echo esc_html( $slabb_milestone[ 'milestone_text' ] );
                                    if ( !empty( $slabb_milestone[ 'list_item' ] ) ) {
                                        foreach ( $slabb_milestone['list_item'] as $slabb_list_item ) {
                                            ; ?>
                                            <ul>
                                                <li><strong><?php echo esc_html( $slabb_list_item ); ?></strong></li>
                                            </ul>
                                        <?php };
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php };
                    };
                    ?>
                    </div>
                </section>
            </div>
            <section>
                <div class="container-fluid">
                    <div class="masonry grid gallery-masonry row" data-horizontal="true">
                        <div class="masonry__sizer"></div>
                        <div class="grid__row">
                            <div class="masonry__item grid__item gallery__item col-xs-3">
                                <a href="<?php echo esc_url( $slabb_portfoilo_settings['gallery_main_image']['url'] );?>" class="img-zoom">
                                    <div class="img-mask os-animation" data-os-animation="imageLoad">
                                        <img src="<?php echo esc_url( $slabb_portfoilo_settings['gallery_main_image']['url'] );?>"
                                             alt="<?php echo esc_attr( $slabb_portfoilo_settings['gallery_title'] );?>">
                                        <div class="mask"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="masonry__item grid__item col-xs-2">
                                <div class="project project_type-7">
                                    <div class="project__wrap">
                                        <div class="project__content">
                                            <div class="bg_blue">
                                                <div class="project__margin">
                                                    <h3 class="project__title"><span><?php echo esc_html( $slabb_portfoilo_settings[ 'gallery_title' ] );?></span></h3>
                                                    <div>
                                                        <?php echo esc_html( $slabb_portfoilo_settings[ 'gallery_description' ] );?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__row">
                            <!--  fact check block -->
                            <div class="masonry__item grid__item grid__item_top col-xs-1">
                                <span class="fact fact_vertical-line os-animation" data-os-animation="bounceIn">
                                    <div class="fact__text responsive-text">
                                        <?php
                                        foreach( $slabb_portfoilo_settings[ 'fact_strings' ] as $slabb_fact ){;?>
                                            <span>
                                                <?php echo esc_html( $slabb_fact['project_fact_string'] );?>
                                            </span>
                                         <?php };?>
                                    </div>
                                </div>
                            </div>
                            <!--  gallery-->
                            <?php
                            foreach( $slabb_portfoilo_settings[ 'gallery_images' ] as $slabb_gallery_image ){;?>
                                <div class="masonry__item grid__item gallery__item col-xs-2">
                                    <a href="<?php echo esc_url( $slabb_gallery_image[ 'url' ] ); ?>" class="img-zoom">
                                        <div class="img-mask os-animation" data-os-animation="imageLoad">
                                            <img src="<?php echo esc_url( $slabb_gallery_image[ 'url' ] ); ?>"
                                                 alt="<?php echo esc_html( $slabb_portfoilo_settings[ 'gallery_title' ] );?>">
                                            <div class="mask"></div>
                                        </div>
                                    </a>
                                </div>
                            <?php }; ?>
                        </div>
                    </div>
                        <?php 
                        echo fw_html_tag('div', array(
                                            'class' => 'site jarallax',
                                            'style' => 'background: url(' . esc_url( $slabb_parallax_img ) . ') center bottom / cover' ), false);
                                        ?>
                        <div class="site__overlay"></div>
                        <a class="site__link link_underline" 
                            href="<?php echo esc_url( $slabb_portfoilo_settings[ 'result_url' ]); ?>"
                            target="_blank">
                        <?php echo esc_url( $slabb_portfoilo_settings[ 'result_url' ]); ?>
                        </a>
                    </div>
                </div>
            </section>
            <section class="project-conclusion">
                <div class="container-fluid">
                    <div class="pretext">
                        <div class="row">
                            <div class="col-xs-5 col-md-1 block-center">
                                <h2 class="heading_vertical-line responsive-text">
                                    <span><?php echo esc_html( $slabb_portfoilo_settings[ 'result_title' ]); ?></span>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-4 col-lg-3 block-center text-center">
                                <em>
                                    <?php echo esc_html( $slabb_portfoilo_settings[ 'result_description' ]); ?>
                                </em>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="project-nav">
                <div class="container-fluid">
                    <div class="nav-links nav-links_with-menu">
                        <a class="nav-links__item nav-previous" href="<?php echo esc_url( $slabb_prev_project_url ); ?>">
                            <span class="post-title link_underline"><?php echo esc_html( $slabb_prev_project_title ); ?></span>
                        </a>
                        <a class="nav-links__item nav-next textright" href="<?php echo esc_url( $slabb_next_project_url ); ?>">
                            <span class="link_underline"><?php echo esc_html( $slabb_next_project_title ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
