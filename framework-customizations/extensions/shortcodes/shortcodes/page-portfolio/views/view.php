<?php
if (!defined('FW')) die('Forbidden');

$slabb_all_projects         = get_posts('post_type=slabb_project&numberposts=-1');
$slabb_portfolio_items      = $atts['portfolio_items'];
$slabb_portfolio_projects   = array();
$slabb_portfolio_categories = get_terms(array(
    'taxonomy' => 'slabb_projects_tax',
    'fields' => 'names'
));
$slabb_replace = array('/','\\','-','_',' ');

$i = 0;
foreach ($slabb_portfolio_items as $slabb_portfolio_item) {
    foreach ($slabb_all_projects as $slabb_all_project) {
        if ($slabb_all_project->post_title == $slabb_portfolio_item) {

            $slabb_portfolio_projects[$i]['id']         = $slabb_all_project->ID;
            $slabb_p_tax                                = wp_get_object_terms( $slabb_all_project->ID, 'slabb_projects_tax' );
            $slabb_portfolio_projects[$i]['category']   = ( empty($slabb_p_tax) ) ? '' : $slabb_p_tax[0]->name;
            $slabb_portfolio_projects[$i]['main_image'] = fw_get_db_post_option( $slabb_all_project->ID, 'portfolio_main_image' );
            $slabb_portfolio_projects[$i]['add_images'] = fw_get_db_post_option( $slabb_all_project->ID, 'portfolio_add_images' );
            $slabb_portfolio_projects[$i]['is_wide']    = fw_get_db_post_option( $slabb_all_project->ID, 'is_wide_container' );
            $slabb_portfoilo_page                       = fw_get_db_post_option( $slabb_all_project->ID, 'project_general_page' );
            if ( empty( $slabb_portfoilo_page ) ) {
                $slabb_portfolio_projects[$i]['page'] = home_url( '/' );
            } else {
                $slabb_portfolio_projects[$i]['page'] = get_the_permalink( $slabb_portfoilo_page[0] );
            }
        };
    };
    $i++;
};

?>

<div class="portfolio-list section">
    <div id="i_filter" class="filter">
        <div class="filter__toggle"></div>
        <div class="filter__wrap container-fluid">
            <div class="filter__item opened" data-filter="*"><?php esc_html_e( 'All', 'slabb' ); ?></div>
            <?php
            foreach ( $slabb_portfolio_categories as $index => $category_name ) {;

                $slabb_category_filter = str_replace($slabb_replace, '', $category_name );
                $slabb_category_filter = strtolower( $slabb_category_filter );
                ?>
                <div class="filter__item"
                     data-target="#filter-<?php echo esc_attr( $index ); ?>"
                     data-filter=".<?php echo esc_html( $slabb_category_filter );?>">
                    <?php echo esc_html( $category_name ); ?>
                </div>
            <?php }; ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="portfolio-list__wrap grid masonry row" data-horizontal="true">
            <div class="masonry__sizer"></div>
                <?php
                foreach ( $slabb_portfolio_projects as $slabb_portfolio_project ) {
                    $container_width = ( $slabb_portfolio_project['is_wide'] == 'yes' ) ? 3 : 2;
                    $slabb_category_filter = str_replace($slabb_replace, '', $slabb_portfolio_project['category']  );
                    $slabb_category_filter = strtolower( $slabb_category_filter );
                    ?>
                    <div class="masonry__item col-xs-<?php echo esc_html( $container_width ) . " " . esc_html( $slabb_category_filter ) ?>">
                        <a class="preview" href="<?php echo esc_url( $slabb_portfolio_project['page'] ); ?>">
                            <div class="cover">
                                <div class="cover__item cover__item_main">
                                    <img src="<?php echo esc_url( $slabb_portfolio_project['main_image']['url'] ); ?>">
                                </div>
                                <?php
                                if ( count($slabb_portfolio_project['add_images']) ) {
                                    foreach ( $slabb_portfolio_project['add_images'] as $slabb_add_image ) {
                                        echo fw_html_tag('div', array(
                                            'class' => 'cover__item',
                                            'style' => 'background-image: url(' . esc_url( $slabb_add_image['url'] ) . ')'
                                        ), true);
                                    };
                                }; ?>
                            </div>
                            <div class="border">
                                <span class="top"></span>
                                <span class="right"></span>
                                <span class="bottom"></span>
                                <span class="left"></span>
                            </div>
                        </a>
                    </div>
                <?php }; ?>
         </div>
    </div>
</div>
