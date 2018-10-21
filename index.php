<?php
/**
 * The template for displaying blog index page
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
 */
get_header();

?>
   
<section class="intro intro_inner">
    <div class="container-fluid">
        <div class="row">
            <div class="intro-wrap col-xs-5 col-sm-4 col-sm-offset-1">
                <h1 class="intro__heading heading_marked-outside"><?php esc_html_e('Blog', 'slabb'); ?></h1>
                <?php
                if (function_exists('fw_ext_breadcrumbs') && !is_front_page()) {
                    fw_ext_breadcrumbs();
                };
                ?>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <main class="blog-main col-xs-5">
                <div class="masonry masonry_size-3 row">
                       <div class="masonry__sizer"></div>
                       <?php
                        $slabb_paged    = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                        $slabb_sticky   = get_option( 'sticky_posts' );
                        if ( !empty( $slabb_sticky ) ) {
                            $slabb_sticky_query = new WP_Query(array(
                                'paged' => $slabb_paged,
                                'post__in' => $slabb_sticky
                            ));

                            while ($slabb_sticky_query->have_posts()) : $slabb_sticky_query->the_post();
                                get_template_part( 'template-parts/content', 'sticky' );
                            endwhile;
                            wp_reset_postdata();
                        };
                            $slabb_query = new WP_Query(array(
                                'paged' => $slabb_paged,
                                'post__not_in' => $slabb_sticky,
                                'ignore_sticky_posts' => 1
                            ));
                        while ( $slabb_query->have_posts()) : $slabb_query->the_post();
                            get_template_part( 'template-parts/content' );
                        endwhile;
                        wp_reset_postdata();
                        ?>
                </div> <!-- .masonry -->
                <!-- Pagination -->
                <?php
                if ( isset( $slabb_query ) ) {
                    slabb_pagination( $slabb_query );
                };
                ?>
                <!-- Pagination end -->
            </main>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
