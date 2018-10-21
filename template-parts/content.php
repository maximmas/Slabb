<?php
/**
 * The template for displaying non-sticky posts on blog index page
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.0
 */
?>

<?php
$slabb_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
?>

<div id="post-<?php the_ID(); ?>" <?php  post_class( 'masonry__item' ); ?>>
<?php if ( $slabb_img_url ){?>

    <!--    dispaly post with image-->
    <div class="blog-post os-animation" data-os-animation="fadeInUp">
        <div class="blog__date responsive-text">
            <span><?php echo esc_html( get_the_date( 'd', null ) ); ?></span>
            <span><?php echo esc_html( get_the_date( 'M', null ) ); ?></span>
        </div>
        <a href="<?php esc_url( the_permalink() );?>" class="img-zoom"><img src="<?php echo esc_url( $slabb_img_url[0] ) ?>"></a>
        <div class="blog-post__title ">
            <a class="link_underline" href="<?php esc_url( the_permalink() );?>">
                <?php the_title() ?>
            </a>
        </div>
        <div class="blog-post__excerpt_thumb">
            <?php
            if( post_password_required() ){
                esc_html_e( 'This post closed by password', 'slabb' );
            } else {
                if (false === get_post_format() ) {
                    slabb_display_excerpt();
                } else {
                    the_content();
                }
            }; ?>
        </div>
    </div>
    <?php } else {?>

    <!--    dispaly post without image-->
    <div class="blog-post blog-post_text block-square os-animation" data-os-animation="fadeInUp">
        <div class="blog__date responsive-text">
            <span><?php echo esc_html( get_the_date( 'd', null ) ); ?></span>
            <span><?php echo esc_html( get_the_date( 'M', null ) ); ?></span>
        </div>
        <a href="<?php esc_url( the_permalink() );?>" class="img-zoom"><img src="<?php echo esc_url( $slabb_img_url[0] ) ?>"></a>
        <div class="blog-post__title post-without-thumb">
            <a class="link_underline link_underline-black" href="<?php esc_url( the_permalink() );?>">
                <?php
                the_title();
                ?>
            </a>
            <div class="blog-post__excerpt">
                <?php
                if( post_password_required() ){
                    esc_html_e( 'This post closed by password', 'slabb' );
                } else {
                    if ( false === get_post_format() ) {
                        slabb_display_excerpt();
                    } else {
                        the_content();
                    }
                }; ?>
            </div>
        </div>
    </div>
    <?php }?>
    
    <div class="blog-pagination inner-post-pagination index-pagination">
        <?php
        $args = array(
            'before'           => '',
            'after'            => '',
            'next_or_number'   => 'number',
            'pagelink'         => '%',
            'echo'             => 1,
        );
        wp_link_pages( $args );
        ?>
    </div>
</div>
     


    