<?php 
/*
 * Display list of social share buttons
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.0
 * 
 */
    
  $slabb_fb_endpoint      = 'https://facebook.com/sharer.php?u=' . get_permalink();

  $slabb_twi_endpoint     = 'https://twitter.com/share?url=' . get_permalink();
  $slabb_twi_endpoint     .= '&text=' . get_the_title();

  $slabb_gplus_endpoint   = 'https://plus.google.com/share?url=' . get_permalink();
  
  $slabb_settings_options = fw_get_db_settings_option();
  
?>

<?php 
  if ( $slabb_settings_options['is_blog_facebook'] === 'yes' ){?>
    <a class="fa fa-facebook icon icon_circle icon_black" href="<?php echo esc_url( $slabb_fb_endpoint ); ?>" target="_blank"></a>
  <?php 
};
 if ( $slabb_settings_options['is_blog_twitter'] === 'yes' ){?>
  <a  class="fa fa-twitter icon icon_circle icon_black" href="<?php echo esc_url( $slabb_twi_endpoint );?>" target="_blank"></a>
  <?php 
};
 if ( $slabb_settings_options['is_blog_gplus'] === 'yes' ){?>
  <a class="fa fa-google icon icon_circle icon_black" href="<?php echo esc_url( $slabb_gplus_endpoint );?>" target="_blank"></a>
<?php 
};
