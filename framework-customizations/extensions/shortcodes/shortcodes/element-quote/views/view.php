<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
$slabb_blog_quote_t = $atts['blog_quote_text'];
$slabb_blog_quote_a = $atts['blog_quote_author'];

?>

<div class="blockquote os-animation" data-os-animation="fadeInUp">
    <blockquote>
        <?php echo esc_html( $slabb_blog_quote_t );?>
        <cite class="blockquote__author"><?php echo esc_html( $slabb_blog_quote_a );?></cite>
    </blockquote>
</div>
