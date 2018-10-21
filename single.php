<?php 
/**
 * The Template for displaying all single posts.
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
            <h2 class="intro__heading heading_marked-outside h1">Blog</h2>
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
                <article id="post-<?php echo esc_html( the_ID() ); ?>" <?php post_class('blog__item blog__item_pt-0'); ?>>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="blog__date responsive-text">
                        <span><?php echo esc_html( get_the_date( 'd', null ) ); ?></span>
                        <span><?php echo esc_html( get_the_date( 'M', null ) ); ?></span>
                    </div>

                    <div class="blog__block-wide">
                        <?php if ( has_post_thumbnail() ) {
                            $slabb_vertical_class   = ( slabb_is_image_vertical() ) ? 'vertical-feature-post' : '';
                            $slabb_header_class     = 'thumb_post_header';
                            $slabb_content_class    = 'thumb_post_content';
                            $slabb_category_class   = 'thumb_post_category';
                            the_post_thumbnail( 'full', 'class=img-block '. esc_html( $slabb_vertical_class ) );
                        } else {
                            $slabb_header_class     = 'no_thumb_post_header';
                            $slabb_content_class    = 'no_thumb_post_content';
                            $slabb_category_class   = 'no_thumb_post_category';
                        } ?>
                    </div>
                        <div class="<?php echo esc_attr( 'post_category ' . $slabb_category_class ); ?>">
                            <?php echo esc_html__( 'Category: ', 'slabb' ) . esc_html( slabb_show_category() ); ?>
                        </div>
                    <h1 class="<?php echo esc_attr( $slabb_header_class ); ?>"><?php the_title();?></h1>
                        <?php
                        if( post_password_required() ){
                            esc_html_e( 'This post closed by password', 'slabb' );
                        };
                        ?>
                    <div class="<?php echo esc_attr( $slabb_content_class ); ?>">
                        <?php the_content();?>
                    </div>

                    <?php
                    if( !empty( $GLOBALS['numpages'] ) ) {
                        if ( $GLOBALS['numpages'] !== 1 ) {
                    ?>
                            <div class="pagination">
                                <div class="pages post_pages">
                                    <?php
                                    $args = array(
                                        'before'           => '',
                                        'after'            => '',
                                        'link_before'      => '<span>',
                                        'link_after'       => '</span>',
                                        'next_or_number'   => 'number',
                                        'pagelink'         => '%',
                                        'echo'             => 1,
                                    );
                                    wp_link_pages( $args );
                                    ?>
                                </div>
                            </div>
                    <?php
                        };
                    };
                    ?>
                    <div class="post-footer">
                        <div class="post-footer__item tags">
                                <?php the_tags( '<span>#', '</span><span>#', '</span>' ); ?>
                        </div>
                        <div class="post-footer__item social">
                            <?php get_template_part( 'template-parts/social-sharing' ); ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </article>
                <div class="nav-links">
                    <?php
                    $slabb_next_post        = get_next_post();
                    $slabb_first_post       = get_posts( 'numberposts=1&order=ASC' );
                    $slabb_last_post        = get_posts( 'numberposts=1' );
                    $slabb_next_post        = ( $slabb_next_post ) ? $slabb_next_post : $slabb_first_post[0];
                    $slabb_next_post_link   = get_permalink( $slabb_next_post->ID );
                    $slabb_prev_post        = get_previous_post();
                    $slabb_prev_post        = ( $slabb_prev_post ) ? $slabb_prev_post : $slabb_last_post[0];
                    $slabb_prev_post_link   = get_permalink( $slabb_prev_post->ID );
                    ?>
                    <a class="nav-links__item nav-previous" href="<?php echo esc_url( $slabb_next_post_link ); ?>">
                        <span class="post-title link_underline">
                            <?php echo esc_html( $slabb_next_post->post_title ); ?>
                        </span>
                    </a>
                    <a class="nav-links__item nav-next textright" href="<?php echo esc_url( $slabb_prev_post_link ); ?>">
                        <span class="link_underline">
                            <?php echo esc_html( $slabb_prev_post->post_title ); ?>
                        </span>
                    </a>
                </div>
                <?php if( comments_open() || get_comments_number() ) :
                    comments_template( '/comments.php' );
                endif ?>
            </main>
            <?php get_sidebar();?>
        </div>
    </div>
</div>
 <?php get_footer();