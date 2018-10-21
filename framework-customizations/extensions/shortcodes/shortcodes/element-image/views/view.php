<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
$slabb_blog_image       = $atts['blog_image'];
$slabb_blog_text        = $atts['blog_caption_text'];
$slabb_blog_link_url    = $atts['blog_caption_link'];
$slabb_blog_link_text   = $atts['blog_link_text'];
$slabb_blog_target      = $atts['blog_image_target'];

$slabb_blog_link_url = ( empty( $slabb_blog_link_url ) ) ? home_url( '/' ) : $slabb_blog_link_url;

?>

<figure class="img_block">
    <div class="img-mask os-animation" data-os-animation="imageLoad">
        <div class="f">
            <img class="img_bordered" src="<?php echo esc_url( $slabb_blog_image['url'] ); ?>">
            <div class="mask"></div>
        </div>
    </div>
    <figcaption class="img-caption">
        <?php echo esc_html( $slabb_blog_text ) . ' ';?>
        <a class="link_underline" href="<?php echo esc_url( $slabb_blog_link_url );?>" target="<?php echo esc_attr( $slabb_blog_target );?>">
            <?php echo esc_html( $slabb_blog_link_text );?>
        </a>
    </figcaption>
</figure>



