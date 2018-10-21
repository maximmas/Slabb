<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since v1.00
 */

$slabb_is_plugin = ( defined( 'SLABB_PLUGIN_VERSION' ) ) ? true : false;

$slabb_settings_options	 = fw_get_db_settings_option();
$slabb_copyright		 = $slabb_settings_options['copyright_text'];
$slabb_popup_title		 = $slabb_settings_options['popup_title'];
$slabb_popup_name		 = $slabb_settings_options['popup_name'];
$slabb_popup_email       = $slabb_settings_options['popup_email'];
$slabb_popup_subject	 = $slabb_settings_options['popup_subject'];
$slabb_popup_message	 = $slabb_settings_options['popup_message'];
$slabb_popup_button		 = $slabb_settings_options['popup_button'];
$slabb_popup_s_title	 = $slabb_settings_options['popup_success_title'];
$slabb_popup_s_text		 = $slabb_settings_options['popup_success_text'];
$slabb_popup_e_title	 = $slabb_settings_options['popup_error_title'];
$slabb_popup_e_text		 = $slabb_settings_options['popup_error_text'];

?>

<!-- Footer -->
		<footer id="footer" class="footer">
			<div class="container-fluid">
				<p class="copyright"><?php echo esc_html( $slabb_copyright ); ?></p>
			</div>
		</footer>
<!-- Footer end -->
<!-- Popups -->
      <div id="popup-message" class="popup mfp-with-anim mfp-hide">
	      <div class="popup__title h1 popup-container"><?php echo esc_html( $slabb_popup_title ); ?></div>
	      <div class="popup-container">
					<?php
                    if( $slabb_is_plugin ){
                        if ( slabb_show_popupform() )  {
                            $slabb_popup = sprintf( slabb_show_popupform(),
                                esc_html( $slabb_popup_name ),
                                esc_html( $slabb_popup_email ),
                                esc_html( $slabb_popup_subject ),
                                esc_html( $slabb_popup_message ),
                                esc_html( $slabb_popup_button )
                            );
                            $slabb_p_string = wp_unslash( $slabb_popup );
                            // echo wp_kses( $slabb_p_string, SLABB_ALLOWED_TAGS );
                            echo wp_kses( $slabb_p_string, Slabb_Theme_Constants::get_allowed_tags() );
                        };
                    };  ?>
	      </div>
      </div>
      <div id="popup-success" class="popup mfp-with-anim mfp-hide">
      	<div class="popup__title h1 popup-container"><?php echo esc_html( $slabb_popup_s_title ); ?></div>
      	<div class="popup-container">
      		<p class="text-center popup-msg"><?php echo esc_html( $slabb_popup_s_text ); ?></p>	
      	</div>
      </div>
      <div id="popup-error" class="popup mfp-with-anim mfp-hide">
      	<div class="popup__title h1 popup-container"><?php echo esc_html( $slabb_popup_e_title ); ?></div>
      	<div class="popup-container">
      		<p class="text-center popup-msg"><?php echo esc_html( $slabb_popup_e_text ); ?></p>	
      	</div>
      </div>
      <!-- Popups end -->
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>