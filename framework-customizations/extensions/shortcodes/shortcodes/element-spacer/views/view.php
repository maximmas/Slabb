<?php if (!defined('FW')) die('Forbidden'); ?>

<?php 
$slabb_w_height = $atts['slabb_wide_spacer_height'];
$slabb_m_height = $atts['slabb_med_spacer_height'];
$slabb_s_height = $atts['slabb_small_spacer_height'];
$slabb_hash 	= slabb_get_hash();

slabb_add_spacer_style( $slabb_hash, $slabb_w_height, $slabb_m_height, $slabb_s_height );

?>

<div class="spacer <?php echo 'spacer-' . esc_html( $slabb_hash ); ?>"></div>
