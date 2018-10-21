<?php
    
    if (!defined('FW')) die('Forbidden'); 

    $slabb_projects = get_posts( 'post_type=slabb_project&numberposts=-1' );

    $slabb_project_title            = '';
    $slabb_project_description      = '';
    $slabb_project_description_link = '';
    $slabb_projects_facts           = array();
    $slabb_projects_facts_link      = '';
    $slabb_project_quote_text       = '';
    $slabb_project_quote_author     = '';
    $slabb_project_portfolio_page   = '';
    $slabb_post_category            = '';
    
    $slabb_projects_title           = $atts['projects_title'];
    $slabb_projects_description     = $atts['projects_description'];
    $slabb_projects_items           = $atts['projects_items'];
 
?>   

<!-- Projects -->
    <section class="projects section-border-top section-border-top_outer">
        <div class="container-fluid">
            <h2 class="heading_double h1">
                <span class="heading_double__duplicate"><?php echo esc_html( $slabb_projects_title ); ?></span>
                <span class="heading_double__main"><?php echo esc_html( $slabb_projects_title ); ?></span>
            </h2>
            <div class="projects__wrap masonry masonry_size-2 row">
                <div class="masonry__sizer"></div>
                <div class="masonry__item masonry__item_big projects__subtitle col-xs-3 text_gray">
                    <em><?php echo esc_html( $slabb_projects_description ); ?></em>
                </div>

              
<?php 
foreach ( $slabb_projects_items as $slabb_projects_item ) {

    $slabb_element_type = $slabb_projects_item[ 'element_type' ];
    switch ( $slabb_element_type ){
        case 'Quote':
            $slabb_widget_type = 'type-7';       
            break;
        case 'Fact block':
            $slabb_widget_type = 'type-8';       
            break;
        default: 
            $slabb_widget_type = $slabb_projects_item[ 'project_widget_type' ];              
    };

    $slabb_project_title                = $slabb_projects_item['project_title'];
    $slabb_project_description          = $slabb_projects_item['featured_project_description_text'];
    $slabb_project_description_link     = $slabb_projects_item['featured_project_description_link'];
    $slabb_project_quote_text           = $slabb_projects_item['quote_text'];
    $slabb_project_quote_author         = $slabb_projects_item['quote_author'];
    $slabb_projects_facts               = $slabb_projects_item['projects_facts'];
    $slabb_projects_facts_link          = $slabb_projects_item['projects_facts_link'];

    if ( empty( $slabb_projects_item['project_page'] ) ){
        $slabb_project_page_url = '';
    } else {
        $slabb_project_page_url = get_the_permalink( $slabb_projects_item['project_page'][0] );    
    };

    if ( empty( $slabb_projects_item['project_portfolio_page'] ) ){
        $slabb_project_portfolio_page = '';
    } else {
        $slabb_project_portfolio_page = get_the_permalink( $slabb_projects_item['project_portfolio_page'][0] );    
    };

   if ( is_string( $slabb_projects_item['project_image'] ) ){
            $slabb_project_image_url = '';
    } else {
            $slabb_project_image_url = $slabb_projects_item['project_image']['url'];      
    };

    foreach ( $slabb_projects as $slabb_project) {
        if ( $slabb_project->post_title == $slabb_project_title ){
            $slabb_post_taxonomy =  wp_get_object_terms( $slabb_project->ID, 'slabb_projects_tax' );
            $slabb_post_category = $slabb_post_taxonomy[0]->name;
        };
    };    
    
       
   if ( $slabb_widget_type == 'type-1' || $slabb_widget_type == 'type-2' || $slabb_widget_type == 'type-4' ) {
        $slabb_widget = sprintf( 
            slabb_project_container( $slabb_widget_type ), 
            esc_html( $slabb_post_category ), 
            esc_attr( $slabb_project_page_url ), 
            esc_attr( $slabb_project_image_url ), 
            esc_html( $slabb_project_title )
        );
    };

    if ( $slabb_widget_type == 'type-3' || $slabb_widget_type == 'type-5' ) {
        $slabb_widget = sprintf( 
            slabb_project_container( $slabb_widget_type ), 
            esc_html( $slabb_post_category ),  
            esc_attr( $slabb_project_page_url ),  
            esc_html( $slabb_project_description ), 
            esc_html( $slabb_project_title )
        );  
    };

    if ( $slabb_widget_type == 'type-6' ) {
        $slabb_widget = sprintf(
            slabb_project_container( $slabb_widget_type ), 
            esc_html( $slabb_post_category ), 
            esc_attr( $slabb_project_page_url ),  
            esc_attr( $slabb_project_image_url ), 
            esc_html( $slabb_project_title ), 
            esc_html( $slabb_project_description ), 
            esc_attr( $slabb_project_description_link ) 
        );
    };
    
    // quote
    if ( $slabb_widget_type == 'type-7' ) {
        $slabb_widget = sprintf(
            slabb_project_container( $slabb_widget_type ), 
            esc_html( $slabb_project_quote_text ), 
            esc_html( $slabb_project_quote_author )  
        );
    };

    // facts
    if ( $slabb_widget_type == 'type-8' ) {
        $slabb_widget = '';
        if ( !empty( $slabb_projects_facts )) {
            $slabb_widget = '<div class="masonry__item col-xs-1">
                        <div class="projects__fact fact os-animation" data-os-animation="bounceIn">
                           <div class="fact__text responsive-text">';
            foreach ( $slabb_projects_facts as $slabb_projects_fact ) {
                $slabb_widget .= '<span>' . esc_html( $slabb_projects_fact['fact_text'] ) . '</span>';
             };
            $slabb_widget .= '</div><div class="fact__link"><a href="' . esc_attr( $slabb_project_portfolio_page ) . '" class="btn">';
            $slabb_widget .= esc_html( $slabb_projects_facts_link );
            $slabb_widget .= '</a></div></div></div>';
        };
    };
    
    $slabb_string = wp_unslash( $slabb_widget );
       
    // echo wp_kses( $slabb_string, SLABB_ALLOWED_TAGS );
    echo wp_kses( $slabb_string,  Slabb_Theme_Constants::get_allowed_tags() );
    
};
?>

            </div> <!--projects__wrap-->
        </div> <!-- container-fluid -->
    </section>        
    <!-- Projects end -->


<?php 
function slabb_project_container( $type ){
    $slabb_container = '';

    $slabb_container_1 = '<div class="masonry__item col-xs-2">
    <div class="project_type-1 os-animation" data-os-animation="fadeInUp">
    <div class="project__wrap">
    <div class="project__content">
    <div class="project__img">
    <div class="project__category horizontal-line category-text">
    <span class="horizontal-line__text">%1$s</span></div>
    <a class="project__img-link img-zoom" href="%2$s">
    <div class="img-mask os-animation" data-os-animation="imageLoad">
    <img src="%3$s" alt="%4$s">
    <div class="mask"></div>
    </div></a></div></div>
    <h2 class="project__title"><a class="link_underline" href="%2$s">%4$s</a></h2>
    </div></div></div>';
    
    $slabb_container_2 = '<div class="masonry__item col-xs-2">
                    <div class="project project_type-2 os-animation" data-os-animation="fadeInUp">
                        <div class="project__wrap">
                            <div class="project__content">
                                <div class="project__img">
                                    <div class="project__category category-text horizontal-line"><span class="horizontal-line__text">%1$s</span></div>
                                    <a class="project__img-link img-zoom" href="%2$s">
                                        <div class="img-mask os-animation" data-os-animation="imageLoad">
                                            <img src="%3$s" alt="%4$s">
                                            <div class="mask"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h2 class="project__title"><a class="link_underline" href="%2$s">%4$s</a></h2>
                        </div>
                    </div>
                </div>';

    $slabb_container_3 = ' <div class="masonry__item col-xs-3">
                    <div class="project project_type-3 os-animation" data-os-animation="fadeInUp">
                        <div class="project__wrap block-square">
                            <div class="project__content bg_yellow">
                                <div class="project__margin">
                                    <div class="project__category category-text"><span>%1$s</span></div>
                                    <h2 class="project__title horizontal-line"><span class="horizontal-line__text"><a class="link_underline" href="%2$s">%4$s</a></span></h2>
                                    <div>%3$s</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

    $slabb_container_4 = ' 
            <div class="masonry__item col-xs-2">
                    <div class="project project_type-4 os-animation" data-os-animation="fadeInUp">
                        <div class="project__wrap">
                            <div class="project__content bg_blue">
                                <div class="project__img">
                                    <div class="project__category category-text horizontal-line text_white"><span class="horizontal-line__text">%1$s</span></div>
                                    <a class="project__img-link img-zoom" href="%2$s">
                                        <div class="img-mask os-animation" data-os-animation="imageLoad">
                                            <img src="%3$s" alt="%4$s">
                                            <div class="mask"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h2 class="project__title"><a class="link_underline" href="%2$s">%4$s</a></h2>
                        </div>
                    </div>
                </div>';

    $slabb_container_5 = '<div class="masonry__item col-xs-2">
                    <div class="project project_type-5 os-animation" data-os-animation="fadeInUp">
                        <div class="project__wrap block-square">
                            <div class="project__content">
                                <div class="project__category category-text"><span>%1$s</span></div>
                                <h2 class="project__title"><span><a class="link_underline" href="%2$s">%4$s</a></span></h2>
                                <div>%3$s</div>
                            </div>
                        </div>
                    </div>
                </div>';

    $slabb_container_6 = '<div class="masonry__item masonry__item_big col-xs-3">
                            <div class="project project_type-6 os-animation" data-os-animation="fadeInUp">
                                <div class="project__wrap">
                                    <div class="project__content">
                                        <div class="project__img">
                                            <a class="project__img-link img-zoom" href="%2$s">
                                                <div class="img-mask os-animation" data-os-animation="imageLoad">
                                                    <img src="%3$s" alt="%4$s">
                                                    <div class="mask"></div>
                                                </div>
                                            </a>
                                            <div class="project__category category-text text_black"><span>%1$s</span></div>
                                            <h2 class="project__title text_yellow"><span><a href="%2$s">%4$s</a></span></h2>
                                        </div>
                                        <div class="project__desc">
                                            <div class="project__desc-text">%5$s</div>
                                            <a class="project__desc-link link_underline" href="%2$s">%6$s</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';

    $slabb_container_7 = '<div class="masonry__item col-xs-2">
                            <div class="projects__blockquote blockquote os-animation" data-os-animation="fadeInUp">
                                <blockquote class="blockquote__text_big">%1$s
                                    <cite class="blockquote__author">%2$s</cite>
                                </blockquote>
                            </div>
                        </div>';
           

   switch ( $type ){
        case 'type-1': 
            $slabb_container = $slabb_container_1;
            break;
        case 'type-2': 
            $slabb_container = $slabb_container_2;
            break;
        case 'type-3': 
            $slabb_container = $slabb_container_3;
            break;
        case 'type-4': 
            $slabb_container = $slabb_container_4;
            break;
        case 'type-5': 
            $slabb_container = $slabb_container_5;
            break;
        case 'type-6': 
            $slabb_container = $slabb_container_6;
            break;
        case 'type-7': 
            $slabb_container = $slabb_container_7;
            break;
        default:
            $slabb_container = $slabb_container_1;
   };

    return $slabb_container;
};



