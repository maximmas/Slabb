<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 */
get_header();

?>

<section class="intro intro_inner">
    <div class="container-fluid">
        <div class="row">
            <div class="intro-wrap col-xs-5 col-sm-4 col-sm-offset-1">
                <h1 class="intro__heading heading_marked-outside">
                    <?php esc_html_e( 'Search results:', 'slabb' ); ?>
                    <?php echo esc_html( get_search_query() ); ?>
                    </h1>
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
                    if( have_posts() ) :
                        while(have_posts()) : the_post();
                            if ( $post->post_type !== 'post' ) continue;
                            get_template_part('template-parts/content');
                        endwhile;
                    else: {; ?>
                        <p><?php esc_html_e( 'No results' , 'slabb'); ?></p>
                        <h3><?php esc_html_e( 'Search Blog', 'slabb' ); ?></h3>
                        <?php get_template_part( 'searchform' );
                    } endif;?>

                </div> <!-- .masonry -->
                <!-- Pagination -->
                <?php
                if (isset($query)) {
                    slabb_pagination( $query );
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
