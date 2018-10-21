<?php
/**
 * The template for page.
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
  */

get_header();
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/page_header' );

        the_content();
        endwhile;
get_footer();


