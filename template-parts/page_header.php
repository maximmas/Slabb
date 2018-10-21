<?php
/**
 * The template for page header.
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
 */

$slabb_header_type = fw_get_db_post_option( $post->ID, 'header_type' );
$slabb_is_h = ( $slabb_header_type == 'type-2' ) ? true : false;
$slabb_is_hb = ( $slabb_header_type == 'type-3' ) ? true : false;


    if ( $slabb_is_h || $slabb_is_hb ) { ?>
        <section class="intro intro_inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="intro-wrap col-xs-5 col-sm-4 col-sm-offset-1">
                        <h1 class="intro__heading heading_marked-outside"><?php the_title(); ?></h1>
                        <?php if ( function_exists('fw_ext_breadcrumbs') && $slabb_is_hb ) {
                            fw_ext_breadcrumbs();
                        };
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    };
?>
