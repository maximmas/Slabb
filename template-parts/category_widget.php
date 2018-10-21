<?php 
/*
 * Display list of categories on the blog page
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 * 
 */
    $slabb_title = slabb_get_widget_title( 'category_sidebar' );
    
    $slabb_cats = wp_list_categories( 'echo=0&orderby=name&show_count=1&title_li=' ); 
    $slabb_cats = str_replace( array('(',')'), array( '&nbsp;<span class="category__qty">' , '</span>' ), $slabb_cats );
    ?>
    <div class="sidebar__item">
      <h6 class="sidebar__heading heading_marked"><?php echo esc_html( $slabb_title ); ?></h6>
      <div>
        <ul>
           <?php
            // echo wp_kses( $slabb_cats, SLABB_ALLOWED_TAGS );
            echo wp_kses( $slabb_cats, Slabb_Theme_Constants::get_allowed_tags() );
            ?>
        </ul>
      </div>
    </div>



