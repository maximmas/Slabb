<?php
/**
 * The template for displaying sticky posts index in loop
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 */
?>
<div id="post-<?php the_ID(); ?>" <?php  post_class( 'masonry__item masonry__item_wide' ); ?>>
        <?php 
            $slabb_img_url  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
            $slabb_no_thumb = ( empty( $slabb_img_url ) ) ? true : false;
        ?>        
    <div class="blog-post os-animation video blog-post_sticky <?php if ( $slabb_no_thumb ) echo esc_attr(' blog-post_sticky_noimg'); ?>"
         data-os-animation="fadeInUp">
        <div class="blog__date responsive-text">
            <span><?php echo esc_html( get_the_date( 'd', null ) ); ?></span>
            <span><?php echo esc_html( get_the_date( 'M', null ) ); ?></span>
        </div>
        <?php 
          if( !$slabb_no_thumb ){?>
        <a href="<?php esc_url( the_permalink() );?>" class="img-zoom"><img src="<?php echo esc_url( $slabb_img_url[0] ) ?>"></a>
        <?php } ?>
        <div class="blog-post__title <?php if ( $slabb_no_thumb ) echo esc_attr( ' blog-post__title_sticky' ); ?>">
            <a class="link_underline" href="<?php esc_url( the_permalink() );?>">
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
</div>
       

    