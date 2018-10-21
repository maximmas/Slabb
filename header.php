<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php
  	if ( function_exists( 'wp_site_icon' ) ) {
  		wp_site_icon();	
  	};
    wp_head();
  ?>
</head>
<body <?php body_class('body_bordered');?>>
  <div id="page-loader" class="page-loader"></div>
  <div id="page-wrap" class="page-wrap<?php if( is_404() ) echo esc_attr( ' page-wrap_full-height' ); ?>">
      <div id="page-shift" class="page-shift">
        <!-- Header -->
        <?php
        if ( $post === NULL ) {
            $slabb_header_class = ' header_top';
        } else {
            $slabb_header_type = fw_get_db_post_option( $post->ID, 'header_type' );
            $slabb_header_class = ( $slabb_header_type == 'type-1' ) ? ' header_top' : '';
        };
        ?>
        <header class="header<?php echo esc_attr( $slabb_header_class ); ?>">
          <div class="header-wrap">
            <div class="header__item">
              <?php
                if ( function_exists( 'get_custom_logo' ) ) {
                  $slabb_logo = get_custom_logo();
                  $allowed_html = array(
                      'a' => array(
                          'href'  => true,
                          'class' => true,
                          'rel'   => true,
                      ),
                      'img' => array(
                          'width'  => true,
                          'height' => true,
                          'src'    => true,
                          'class'  => true,
                          'alt'    => true,
                          'srcset' => true,
                          'sizes'  => true
                      )
                  );
                  echo wp_kses( $slabb_logo, $allowed_html );
                };
             ?>
            </div>
            <div class="header__item header__menu textright">
              <div class="header__menu-btn">
                <button class="icon icon_circle icon_black">
                  <span></span>
                </button>
              </div>
              <div class="menu-overlay"></div>
              <div class="header__menu-wrap">
                <div class="header__menu-content">
                  <?php 
                    if ( has_nav_menu( 'right-menu') ) {
                          wp_nav_menu( array(
                            'theme_location'  => 'right-menu',
                            'menu_class'      => 'header__menu-nav top-menu',
                            'container'       => false
                        ));
                    }
                    ?>
                  <div class="header__social social">
                      <?php
                       $slabb_links = slabb_get_social_links( 'menu' );
                       foreach ( $slabb_links as $slabb_link ){;?>
                         <a class="<?php echo esc_attr( $slabb_link['link_icon']['icon-class'] );?> icon"
                            href="<?php echo esc_url( $slabb_link['profile_url'] );?>">
                         </a>
                        <?php
                         };
                         ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- Header end -->

      
