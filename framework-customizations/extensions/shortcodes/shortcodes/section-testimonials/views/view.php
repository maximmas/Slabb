<?php
if (!defined('FW')) die('Forbidden'); 

$slabb_testimonial_posts = get_posts( 'post_type=slabb_testimonial&numberposts=-1' );

$slabb_testimonial_titles   = $atts[ 'title_testimonial_block' ];
$slabb_testimonial_items    = $atts[ 'testimonial_items' ];

$slabb_testimonials = array();

$t=0;
foreach ( $slabb_testimonial_items as $slabb_testimonial_item ) {
    foreach ( $slabb_testimonial_posts as $slabb_testimonial_post ) {
        if ( $slabb_testimonial_item['testimonial_title'] === $slabb_testimonial_post->post_title ) {
            $slabb_testimonials[ $t ]['container']    = $slabb_testimonial_item[ 'testimonial_widget_type' ];
            $slabb_testimonials[ $t ]['author']       = $slabb_testimonial_post->post_title;
            $slabb_testimonials[ $t ]['content']      = $slabb_testimonial_post->post_content;
        };
    };
    $t++;
};

?>
            <div class="section-bg">
                <section class="testimonials">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="testimonials__heading col-xs-5 col-lg-2">
                                <div class="heading_compact horizontal-line">
                                    <h2 class="testimonials__heading-text responsive-text horizontal-line__text">
                                        <?php
                                        foreach ( $slabb_testimonial_titles as $slabb_testimonial_title ){;?>
                                            <span><?php echo esc_html( $slabb_testimonial_title['title_string'] );?></span>
                                        <?php
                                        };
                                        ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="testimonials__wrap col-xs-5 col-lg-4">
                                <div class="testimonials__items row">
                                <?php
                                    foreach ( $slabb_testimonials as $slabb_testimonial ){
                                        $slabb_testim_class = ( $slabb_testimonial['container'] == 'wide' ) ? ' testimonial_big' : '';?>
                                        <div class="testimonial<?php echo esc_html( $slabb_testim_class );?>">
                                            <div class="blockquote os-animation" data-os-animation="fadeInUp">
                                                <blockquote>
                                                    <?php echo esc_html( $slabb_testimonial['content'] );?>
                                                    <cite class="blockquote__author">
                                                        <?php echo esc_html( $slabb_testimonial['author'] );?>
                                                    </cite>
                                                </blockquote>
                                            </div>
                                        </div>
                                    <?php
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
