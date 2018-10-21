<?php if (!defined('FW')) die('Forbidden'); ?>

<?php 
$slabb_settings_options         = fw_get_db_settings_option();
$slabb_about_name               = $slabb_settings_options['person_name'];
$slabb_about_text               = $atts['about_text'];
$slabb_about_position           = $atts['about_position'];
$slabb_about_link               = $atts['about_link'];
$slabb_about_image              = $atts['about_image'];

?>
 <section class="about">
    <div class="container-fluid">
        <div class="about__wrap staggered-animation-container row">
            <div class="about__item col-xs-2 col-sm-2 col-md-offset-1">
                <div class="about__photo img_underlayer">
                    <div class="img-mask staggered-animation" data-os-animation="imageLoad">
                        <img src="<?php echo esc_url( $slabb_about_image[ 'url' ]); ?>" alt="<?php echo esc_attr( $slabb_about_name ); ?>">
                        <div class="mask"></div>
                    </div>
                </div>
            </div>
            <div class="about__item col-xs-3 col-sm-3 col-md-2">
                <div class="category-text staggered-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s">
                    <span>
                    <?php echo esc_html( $slabb_about_position ); ?>    
                    </span>
                </div>
                <h2 class="about__heading horizontal-line horizontal-line_left staggered-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.7s"><span class="horizontal-line__text"><?php echo esc_html( $slabb_about_name ); ?></span></h2>
                <div class="staggered-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.9s">
                    <p>
                     <?php echo esc_html( $slabb_about_text ); ?>    
                    </p>
                    <a class="link_underline" href="<?php echo home_url('/blog'); ?>">
                     <?php echo esc_html( $slabb_about_link ); ?>    
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>