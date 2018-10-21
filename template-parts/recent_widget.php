<?php 
/*
 * Display list of categories on blog page
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.0
 * 
 */
    $slabb_title = slabb_get_widget_title( 'posts_sidebar' );
    $slabb_posts = slabb_get_posts( 'post' );
    ?>
    <div class="sidebar__item">
    <h6 class="sidebar__heading heading_marked"><?php echo esc_html( $slabb_title ); ?></h6>
    <div>
      <?php 
      if ( count( $slabb_posts ) ) { 
          $i = 0;
          foreach( $slabb_posts as $slabb_post ){
            if ( $i == 3 ) break;
            $slabb_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $slabb_post->ID ), array( 80, 80 ), false );
        ?>
          <div class="post-preview">
            <img class="post-preview__photo photo_circle" 
                 src="<?php echo esc_url( $slabb_img_url[0] ); ?>">
            <div class="post-preview__info">
              <span class="post-preview__link">
                <a  class="link_underline" 
                    href="<?php echo esc_url( get_permalink( $slabb_post->ID ) );?>">
                  <?php echo esc_html( $slabb_post->post_title ); ?>
                </a></span>
              <div class="date"><?php echo esc_html( get_the_date( '', $slabb_post->ID ) ); ?></div>
            </div>
          </div>
          <?php 
          $i++; };
      };
      ?>
    </div>
  </div>



