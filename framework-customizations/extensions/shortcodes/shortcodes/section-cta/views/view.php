<?php 

if (!defined('FW')) die('Forbidden'); 

$slabb_cta_button_text  = $atts['cta_button_text'];
$slabb_cta_final_symbol = $atts['cta_final_symbol'];
$slabb_cta_text_strings = $atts['cta_text_block'];
$slabb_top_border       = $atts['cta_top_border_color'];
$slabb_bottom_border    = $atts['cta_bottom_border_color'];
$slabb_hash 	        = slabb_get_hash();
slabb_add_cta_style( $slabb_hash, $slabb_top_border, $slabb_bottom_border );
?>

<!-- CTA -->
<section class="cta section-border-top_cta section-border-bottom_cta <?php echo 'cta-' . esc_html( $slabb_hash ); ?>">
    <div class="container-fluid">
        <div class="cta-wrap row">
            <div class="cta__item col-xs-5 col-sm-2">
                <div class="cta__heading">
                    <h2 class="cta__heading-wrap">
                        <span class="cta__heading-text responsive-text">
                            <?php 
                            foreach( $slabb_cta_text_strings as $slabb_cta_text_string ){;?>
                                <span> 
                                    <?php echo esc_html( $slabb_cta_text_string['cta_string'] );?>
                                </span>    
                            <?php }; ?>
                        </span>
                        <span class="cta__heading-icon">
                            <?php echo esc_html( $slabb_cta_final_symbol );?>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="cta__item col-xs-5 col-sm-3">
                <a class="btn btn_cta btn_big btn_wide popup-with-anim" href="#popup-message">
                    <?php echo esc_html( $slabb_cta_button_text );?>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- CTA end -->

