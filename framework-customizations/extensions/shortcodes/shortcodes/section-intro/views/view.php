<?php 

if (!defined('FW')) die('Forbidden');

$slabb_intro_greeting           = $atts['intro_greeting'];
$slabb_intro_name               = $atts['intro_name'];
$slabb_intro_position           = $atts['intro_position'];
$slabb_intro_hire_me_button     = $atts['intro_hire_me_button'];
$slabb_intro_portfolio_button   = $atts['intro_portfolio_button'];
$slabb_intro_portfolio_btn_link = $atts['intro_portfolio_button_link'];
$slabb_intro_image              = $atts['intro_image'];

if ( empty( $slabb_intro_portfolio_btn_link ) ) {
    $slabb_intro_portfolio_btn_link = home_url( '/' );
} else {
    $slabb_intro_portfolio_btn_link = get_permalink( $slabb_intro_portfolio_btn_link[0] );
};
?>
<!-- Intro -->
<section class="intro intro_main section_fixed">
    <div class="intro-wrap container-fluid">
        <div class="row">
            <div class="intro__text col-xs-5 col-sm-3 col-md-2 col-md-offset-1">
                <h1 class="intro__heading">
                    <strong>
                        <span class="text_white">
                            <?php echo esc_html( $slabb_intro_greeting ); ?>
                        </span>
                        <?php echo esc_html( $slabb_intro_name ); ?>
                    </strong>
                </h1>
                <h2 class="intro__subheading horizontal-line"><span class="horizontal-line__text text_spacing"><?php echo esc_html( $slabb_intro_position ); ?></span></h2>
                <div class="intro__btns">
                    <div class="intro__btns-item">
                        <a class="btn btn_cta popup-with-anim"
                           href="#popup-message"><?php echo esc_html( $slabb_intro_hire_me_button ); ?></a>
                    </div>
                    <div class="intro__btns-item">
                        <a href="<?php echo esc_url( $slabb_intro_portfolio_btn_link ); ?>"
                           class="btn"><?php echo esc_html( $slabb_intro_portfolio_button ); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="intro__img col-xs-3">
            	<?php if ( !empty ( $slabb_intro_image ) ){?>
                <img src="<?php echo esc_url( $slabb_intro_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $slabb_intro_name ); ?>">
                <?php } ?>     
            </div>
        </div>
    </div>
</section>
<!-- Intro end -->
