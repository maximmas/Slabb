<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
$slabb_services_title       = $atts['services_title'];
$slabb_services_subtitle    = $atts['services_subtitle'];
$slabb_services_items       = $atts['services_items'];
$slabb_services_facts       = $atts['services_facts'];
$slabb_delay                = 0.2;
$slabb_services             = array();

$slabb_services_posts = get_posts('post_type=slabb_service&numberposts=-1');

foreach ( $slabb_services_items as $slabb_services_item ) {
    foreach ( $slabb_services_posts as $slabb_services_post ) {
        if ( $slabb_services_item['service_title'] === $slabb_services_post->post_title ) {
            $slabb_services[ $slabb_services_post->ID ]['title'] = $slabb_services_item['service_title'];
        };
    };
};
?>

<!-- Services -->
<div class="section-bg_">
    <section class="services">
        <div class="container-fluid">
            <h2 class="heading_rotated"><?php echo esc_html( $slabb_services_title ); ?></h2>
            <h3 class="heading_marked-part heading_marked-part-right h1">
                <span class="heading_marked-part__text"><?php echo esc_html( $slabb_services_subtitle ); ?></span>
            </h3>
            <div class="row">
                <div class="col-xs-5 col-md-3 col-md-offset-1">
                    <div class="services-wrap staggered-animation-container">
                        <?php
                        foreach ( $slabb_services as $slabb_service_id => $slabb_service_title ) {
                            ?>
                            <figure class="services__item staggered-animation"
                                    data-os-animation="fadeInUp"
                                    data-os-animation-delay="<?php echo esc_html( $slabb_delay ) . 's'; ?>">
                                <div id="services-item-icon-<?php echo esc_html( $slabb_service_id ); ?>"
                                     class="services__item-img services__item-img_bordered"></div>
                                <figcaption class="services__item-caption">
                                    <?php echo esc_html( $slabb_service_title['title'] ); ?>
                                </figcaption>
                            </figure>
                            <?php
                            $slabb_delay += 0.2;
                        };
                        ?>
                    </div>
                </div>
                <div class="col-xs-5 col-md-1">
                    <div class="fact os-animation" data-os-animation="bounceIn">
                        <div class="fact__text responsive-text">
                            <?php
                            foreach ( $slabb_services_facts as $slabb_services_fact ) {
                                ; ?>
                                <span id="shortcode-<?php echo esc_attr( $slabb_services_fact['id'] ); ?>"><?php echo esc_html( $slabb_services_fact['fact_text'] ); ?></span>
                            <?php
                             };
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="remove-section-margin_"></div>
<!-- Services end -->