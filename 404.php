<?php
/*
 * The template for 404 page.
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
  */
get_header();
?>

<section class="page-404">
    <div class="container-fluid">
        <div class="page-404__container os-animation" data-os-animation="fadeInUp">
            <div class="page-404__item">
                <div class="page-404__heading">
                    <div class="horizontal-line">
                        <div class="horizontal-line__text">
                            <div class="fact">
                                <div class="fact__text">
                                    <span><?php echo esc_html( '404', 'slabb' ); ?></span>
                                </div>
                            </div>
                            <h1 class="page-404__heading-text responsive-text">
                                <span><?php esc_html_e( 'This page', 'slabb' ); ?></span>
                                <span><?php esc_html_e( 'Is not found', 'slabb' ); ?></span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-404__item page-404__btn">
                <a class="btn" href="<?php echo esc_url( home_url('/') );?>  "><?php esc_html_e( 'Back to homepage', 'slabb' ); ?></a>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>

