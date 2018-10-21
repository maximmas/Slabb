<?php if (!defined('FW')) die('Forbidden');


$slabb_is_plugin = ( defined( 'SLABB_PLUGIN_VERSION' ) ) ? true : false;

$slabb_settings_options     = fw_get_db_settings_option();
$slabb_contact_titles       = $atts['contact_title'];
$slabb_contact_subtitle     = $atts['contact_subtitle'];
$slabb_email                = $slabb_settings_options['person_email'];
$slabb_links                = slabb_get_social_links('contact');
$slabb_name_placeholder     = $slabb_settings_options['contact_form']['name_placeholder'];
$slabb_email_placeholder    = $slabb_settings_options['contact_form']['email_placeholder'];
$slabb_message_placeholder  = $slabb_settings_options['contact_form']['message_placeholder'];
$slabb_button_text          = $slabb_settings_options['contact_form']['button_text'];

?>

<section class="contacts">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-5 col-md-2 pull-right">
                <div class="contacts__title heading_compact horizontal-line">
                    <h2 class="horizontal-line__text responsive-text">
                        <?php
                        foreach ( $slabb_contact_titles as $slabb_contact_title ) {
                            ; ?>
                            <span><?php echo esc_html( $slabb_contact_title[ 'title_string' ] ); ?></span>
                        <?php }; ?>
                    </h2>
                </div>
            </div>
            <div class="col-xs-5 col-sm-3 col-lg-2 col-lg-offset-1">
                <div class="contacts__form os-animation" data-os-animation="fadeInUp">
                    <?php
                    if( $slabb_is_plugin ){
                        if ( slabb_show_contactform() )  {
                             $slabb_contact = sprintf( slabb_show_contactform(),
                                                       esc_html( $slabb_name_placeholder ),
                                                       esc_html( $slabb_email_placeholder ),
                                                       esc_html( $slabb_message_placeholder ),
                                                       esc_html( $slabb_button_text )
                             );
                             $slabb_string = wp_unslash( $slabb_contact );
                            // echo wp_kses( $slabb_string, SLABB_ALLOWED_TAGS );
                            echo wp_kses( $slabb_string, Slabb_Theme_Constants::get_allowed_tags() );
                        };
                    };  ?>
                </div>
            </div>
            <div class="col-xs-5 col-sm-2">
                <p><?php echo esc_html( $slabb_contact_subtitle ); ?></p>
                <ul class="contacts__list">
                    <li><?php esc_html_e( 'E-mail:', 'slabb' ); ?>
                        <a class="link_underline" href="mailto:<?php echo esc_attr( $slabb_email ); ?>">
                            <?php echo esc_html( $slabb_email ); ?>
                        </a>
                    </li>
                    <?php
                    foreach ( $slabb_links as $slabb_link ) {; ?>
                        <li>
                            <?php echo esc_html( $slabb_link[ 'link_title' ] ) . ':'; ?>
                            <a class="link_underline" href="<?php echo esc_url( $slabb_link['profile_url'] ); ?>">
                                <?php echo esc_html( $slabb_link[ 'profile_title' ] );
                                ?>
                            </a>
                        </li>
                    <?php }; ?>
                </ul>
            </div>
        </div>
    </div>
</section>