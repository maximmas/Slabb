<?php
/**
 * Slabb Customizer functionality
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since Slabb 1.0
 */


function slabb_register_theme_customizer( $wp_customize ){

    /* Panel and sections */

    $wp_customize->add_panel( 'slabb_panel', array(
        'title'         => esc_html__( 'Theme color settings ', 'slabb' ),
        'description'   => esc_html__( 'Slabb theme color settings', 'slabb' ),
    ) );

    $wp_customize->add_section( 'background_section', array(
        'title' => esc_html__( 'Background color', 'slabb' ),
        'panel' => 'slabb_panel',
    ) );

    $wp_customize->add_section( 'buttons_section', array(
        'title' => esc_html__( 'Buttons color', 'slabb' ),
        'panel' => 'slabb_panel',
    ) );
    $wp_customize->add_section( 'fonts_section', array(
        'title' => esc_html__( 'Fonts color', 'slabb' ),
        'panel' => 'slabb_panel',
    ) );
    $wp_customize->add_section( 'elements_section', array(
        'title' => esc_html__( 'Elements color', 'slabb' ),
        'panel' => 'slabb_panel',
    ) );

    $wp_customize->add_section( 'form_section', array(
        'title' => esc_html__( 'Form color', 'slabb' ),
        'panel' => 'slabb_panel',
    ) );

    /* Background color section */

	$wp_customize->add_setting( 'main_color', array(
		'default'             => '#ffea00',
		'transport'           => 'postMessage',
        'sanitize_callback'   => 'esc_attr',
		)
	);
    $wp_customize->add_setting( 'secondary_color', array(
        'default'           => '#19d0ff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_setting( 'background_m_color', array(
            'default'           => '#fff',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_setting( 'background_sp_color', array(
            'default'               => '#fafafa',
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'esc_attr',
        )
    );

    $wp_customize->add_setting( 'background_p_color', array(
            'default'           => '#000',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'background-page-color', 
         array(
                'label'       => esc_html__( 'Page background color', 'slabb' ),
                'section'     => 'background_section',
                'settings'    => 'background_p_color',
                'description' => 'Notice: some elements are not available for live preview'
            )
        )
    );    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'background-theme-color', 
         array(
                'label'      => esc_html__( 'Content background color', 'slabb' ),
                'section'    => 'background_section',
                'settings'   => 'background_m_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'background-sp-color', 
         array(
                'label'         => esc_html__( 'Sections background color', 'slabb' ),
                'section'       => 'background_section',
                'settings'      => 'background_sp_color',
                'description'   => 'Background color for Services and Testimonials sections',
            )
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
        $wp_customize,
		'main_theme_color', 
		 array(
				'label'         => esc_html__( 'Theme main color', 'slabb' ),
                'section'       => 'background_section',
                'settings'      => 'main_color',
                'description'   => "Notice: some elements are not available for live preview"
			)
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_theme_color',
            array(
                'label'         => esc_html__( 'Theme secondary color', 'slabb' ),
                'section'       => 'background_section',
                'settings'      => 'secondary_color',
                'description'   => "Notice: some elements are not available for live preview"
            )
        )
    );

    /* Form section */

    $wp_customize->add_setting( 'form_bg_color', array(
       'default'            => '#fafafa',
       'transport'          => 'postMessage',
       'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'form_in_color', array(
       'default'            => '#eef2f7',
       'transport'          => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'form-bg-color', 
         array(
                'label'      => esc_html__( 'Form background color', 'slabb' ),
                'section'    => 'form_section',
                'settings'   => 'form_bg_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'form-inp-color', 
         array(
                'label'      => esc_html__( 'Form inputs color', 'slabb' ),
                'section'    => 'form_section',
                'settings'   => 'form_in_color',
            )
        )
    );


    /* Buttons section */

    $wp_customize->add_setting( 'btn_bg_color', array(
            'default'           => '#888888',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'btn_bd_color', array(
            'default'           => '#555555',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'btn_hv_color', array(
            'default'           => '#a2a2a2',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'btn-bg-color',
            array(
                'label'      => esc_html__( 'Buttons color', 'slabb' ),
                'section'    => 'buttons_section',
                'settings'   => 'btn_bg_color',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'btn-bd-color',
            array(
                'label'         => esc_html__( 'Buttons border color', 'slabb' ),
                'section'       => 'buttons_section',
                'settings'      => 'btn_bd_color',
                'description'   => 'Notice: this option is not available for live preview'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'btn-hv-color',
            array(
                'label'      => esc_html__( 'Buttons hover color', 'slabb' ),
                'section'    => 'buttons_section',
                'settings'   => 'btn_hv_color',
                'description' => 'Notice: this option is not available for live preview'
            )
        )
    );

    $wp_customize->add_setting( 'cta_bg_color', array(
       'default' => '#19d0ff',
       'transport'   => 'postMessage',
       'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'cta_bd_color', array(
       'default' => '#22add1',
       'transport'   => 'postMessage',
       'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'cta_hv_color', array(
       'default' => '#4cdaff',
       'transport'   => 'postMessage',
       'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'cta-bg-color', 
         array(
                'label'       => esc_html__( 'CTA buttons color', 'slabb' ),
                'section'     => 'buttons_section',
                'settings'    => 'cta_bg_color',
                'description' => 'Buttons with popup forms'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'cta-bd-color', 
         array(
                'label'      => esc_html__( 'CTA buttons border color', 'slabb' ),
                'section'    => 'buttons_section',
                'settings'   => 'cta_bd_color',
                'description' => 'Notice: this option is not available for live preview'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'cta-hv-color', 
         array(
                'label'      => esc_html__( 'CTA buttons hover color', 'slabb' ),
                'section'    => 'buttons_section',
                'settings'   => 'cta_hv_color',
                'description' => 'Notice: this option is not available for live preview'
            )
        )
    );

    /* Elements section */

    $wp_customize->add_setting( 'el_p12_color', array(
            'default' => '#f0f0f0',
            'transport'   => 'postMessage',
            'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-p12-color',
            array(
                'label'         => esc_html__( 'Projects types #1 and #2 color', 'slabb' ),
                'section'       => 'elements_section',
                'settings'      => 'el_p12_color',
                'description'   => 'Notice: this option is not available for live preview'
            )
        )
    );

    $wp_customize->add_setting( 'el_p5_color', array(
            'default' => '#000',
            'transport'   => 'postMessage',
            'sanitize_callback'  => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-p5-color',
            array(
                'label'      => esc_html__( 'Project type #5 color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_p5_color',
            )
        )
    );

    $wp_customize->add_setting( 'el_desc_color', array(
            'default'           => '#000000',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-desc-color',
            array(
                'label'      => esc_html__( 'Project type #6 description color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_desc_color',
            )
        )
    );

    $wp_customize->add_setting( 'el_quote_color', array(
            'default'           => '#f0f0f0',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-quote-color',
            array(
                'label'      => esc_html__( 'Quote background color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_quote_color',
            )
        )
    );

    $wp_customize->add_setting( 'el_pack_bg_color', array(
            'default'           => '#111',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-pack-bg-color',
            array(
                'label'      => esc_html__( 'Standard package background color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_pack_bg_color',
            )
        )
    );
    $wp_customize->add_setting( 'el_pack_hd_color', array(
            'default'           => '#000',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-pack-hd-color',
            array(
                'label'      => esc_html__( 'Standard package header color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_pack_hd_color',
            )
        )
    );
    $wp_customize->add_setting( 'el_pack_sale_color', array(
            'default'           => '#ebd800',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-pack-sale-color',
            array(
                'label'      => esc_html__( 'Sale package background color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_pack_sale_color',
            )
        )
    );

    $wp_customize->add_setting( 'el_pack_sale_hd_color', array(
            'default'           => '#ffea00',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'el-pack-sale-hd-color',
            array(
                'label'      => esc_html__( 'Sale package header color', 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'el_pack_sale_hd_color',
            )
        )
    );

    $wp_customize->add_setting( 'background_a_color', array(
            'default'           => '#f0f0f0',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'background-a-color',
            array(
                'label'      => esc_html__( "'About' image background color", 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'background_a_color',
                'description' => 'Notice: this option is not available for live preview'
            )
        )
    );

    $wp_customize->add_setting( 'background_quote_color', array(
            'default'           => '#ffea00',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'background-quote-color',
            array(
                'label'      => esc_html__( "Quote symbol color", 'slabb' ),
                'section'    => 'elements_section',
                'settings'   => 'background_quote_color',
                'description' => 'Notice: this option is not available for live preview'
            )
        )
    );
   

    /* fonts */

    $wp_customize->add_setting( 'black_font', array(
            'default'           => '#000',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'white_font', array(
            'default'           => '#fff',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'gray_font', array(
            'default'           => '#888',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'dhead_font', array(
            'default'           => '#f9f9f9',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'vhead_font', array(
            'default'           => '#dedede',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'btn_font', array(
            'default'           => '#fff',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_setting( 'cta_btn_font', array(
            'default'           => '#fff',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'black-font',
            array(
                'label'      => esc_html__( "Main font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'black_font',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'white-font',
            array(
                'label'      => esc_html__( "Subheaders font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'white_font',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'gray-font',
            array(
                'label'      => esc_html__( "Text font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'gray_font',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'dhead-font',
            array(
                'label'      => esc_html__( "Double heading font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'dhead_font',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'vhead-font',
            array(
                'label'      => esc_html__( "Vertical heading font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'vhead_font',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'btn-font',
            array(
                'label'      => esc_html__( "Buttons text font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'btn_font',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cta-btn-font',
            array(
                'label'      => esc_html__( "CTA buttons text font color", 'slabb' ),
                'section'    => 'fonts_section',
                'settings'   => 'cta_btn_font',
            )
        )
    );
};

add_action( 'customize_register', 'slabb_register_theme_customizer' );


function slabb_customizer_css() {

    ?>
    <style>
        
        /* page background color */            
        @media screen and (min-width: 768px) {
            .body_bordered::before,
            .body_bordered::after {
                background-color: <?php echo get_theme_mod( 'background_p_color', '#000' ); ?>;
              }
            .body_bordered .page-wrap::before,
            .body_bordered .page-wrap::after {
                background-color: <?php echo get_theme_mod( 'background_p_color', '#000' ); ?>;
             }
        }
        .footer{
            background-color: <?php echo get_theme_mod( 'background_p_color', '#000' ); ?>;
        }

        /* background color */
        body,
        section,
        #page-wrap,
        .section,
        .preview .border span
        { background-color: <?php echo get_theme_mod( 'background_m_color', '#fff' ); ?>; }

        /* svg image border */
        .section-border-top_::before {
            background-image: url('data:image/svg+xml;utf-8,<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 170.3 5.8" style="enable-background:new 0 0 170.3 5.8;" xml:space="preserve"><path fill="<?php echo get_theme_mod( 'background_m_color', '#fff' ); ?>" d="M0.7,5.6c0.9,0,3-0.5,3.1-1C4.5,4.7,6.6,3.8,8.3,3c3.5,1.3,10,1.3,12,0.1c0.7,0.6,1.3,1.1,1.6,1.4 C23.4,4.3,24.6,4,25.8,4c2.3,0.1,4.2-0.4,6.1-1.6c1.3-0.8,3-1,4.4-1.4c1.5,2.9,2.9,3.3,5.8,2.2c1.6-0.6,3.4-0.8,5.2-1.2 c1.5-0.4,3-1.4,4.7-1c1.6,0.3,4.8,1.6,4.8,1.6s2.9-1.4,4.4-1.5c1.7-0.2,3.5,0,5.4,0C66.8,1.7,67,2.3,67.2,3c0.4,0,0.7,0.1,1,0.1 c4.2-0.3,8.3,1.5,12.6,0.8c0.3,0,0.7,0.1,0.9,0.3C82.5,5.1,83.1,5,84,4.3c0.6-0.5,1.4-0.8,2.1-1.1c0.4-0.2,1.1-0.3,1.4-0.1 c1.9,1.2,3.7,1.1,5.6,0c0.6-0.3,1.8-0.3,2.4,0.2c2.4,1.8,4.4,0.6,7,0.8c0.3,0,1.2-1.1,1.7-1.1c0.8,0.4-0.1,1.5,3,0.7 c3.2-0.9,3.9,2.2,8.7-1.3c1-0.8,2.4-1,3.7-1.4c0.3-0.1,0.9,0.3,1.2,0.5c1.2,0.8,2.4,1.6,3.5,2.4c2.3-0.8,4.3-1.9,6.6-2.2 c1.5-0.2,3.1-0.8,4.7-0.8c0.9,0.1,1.8,0.5,2.8,0.6c2.7,0.3,2.1,1,3.6,0.1c2.5-1.5,5-0.4,7.5-0.8c0.2,0.7,0.3,1.3,0.5,1.8 c0.3,0.2,0.8,0.5,1.1,0.5c1.2,0,2.2-0.3,3.4-0.2c1.4,0,2.7,0.4,4,0.7c4.9,1.2,4.9,0.4,7.1-0.2c2.4-0.6,3.3-0.6,4.3,1.7 c0.1,0.2,0.2,0.4,0.4,0.7V0H0v5.8C0,5.8,0.5,5.4,0.7,5.6z"/> </svg>'); 
        }    

       .section-border-top_outer::before
        {
            background-image: url('data:image/svg+xml;utf-8,<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 170.3 5.8" style="enable-background:new 0 0 170.3 5.8;" xml:space="preserve"><path fill="<?php echo get_theme_mod( 'background_m_color', '#fff' ); ?>" d="M169.6,0.2c-0.9,0-3,0.5-3.1,1c-0.7-0.1-2.8,0.8-4.5,1.6c-3.5-1.3-10-1.3-12-0.1c-0.7-0.6-1.3-1.1-1.6-1.4 c-1.5,0.2-2.7,0.5-3.9,0.5c-2.3-0.1-4.2,0.4-6.1,1.6c-1.3,0.8-3,1-4.4,1.4c-1.5-2.9-2.9-3.3-5.8-2.2c-1.6,0.6-3.4,0.8-5.2,1.2 c-1.5,0.4-3,1.4-4.7,1c-1.6-0.3-4.8-1.6-4.8-1.6s-2.9,1.4-4.4,1.5c-1.7,0.2-3.5,0-5.4,0c-0.2-0.6-0.4-1.2-0.6-1.9 c-0.4,0-0.7-0.1-1-0.1C97.9,3,93.8,1.2,89.5,1.9c-0.3,0-0.7-0.1-0.9-0.3c-0.8-0.9-1.4-0.8-2.3-0.1c-0.6,0.5-1.4,0.8-2.1,1.1 c-0.4,0.2-1.1,0.3-1.4,0.1c-1.9-1.2-3.7-1.1-5.6,0C76.6,3,75.4,3,74.8,2.5c-2.4-1.8-4.4-0.6-7-0.8c-0.3,0-1.2,1.1-1.7,1.1 c-0.8-0.4,0.1-1.5-3-0.7c-3.2,0.9-3.9-2.2-8.7,1.3c-1,0.8-2.4,1-3.7,1.4c-0.3,0.1-0.9-0.3-1.2-0.5c-1.2-0.8-2.4-1.6-3.5-2.4 c-2.3,0.8-4.3,1.9-6.6,2.2c-1.5,0.2-3.1,0.8-4.7,0.8c-0.9-0.1-1.8-0.5-2.8-0.6c-2.7-0.3-2.1-1-3.6-0.1c-2.5,1.5-5,0.4-7.5,0.8 c-0.2-0.7-0.3-1.3-0.5-1.8C20,3,19.5,2.7,19.2,2.7C18,2.7,17,3,15.8,2.9c-1.4,0-2.7-0.4-4-0.7C6.9,1,6.9,1.8,4.7,2.4 C2.3,3,1.4,3,0.4,0.7C0.3,0.5,0.2,0.3,0,0v5.8h170.3V0C170.3,0,169.8,0.4,169.6,0.2z"/> </svg>');
        }
        .section-border-bottom_::after
        {
            background-image: url('data:image/svg+xml;utf-8,<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 170.3 5.8" style="enable-background:new 0 0 170.3 5.8;" xml:space="preserve"><path fill="<?php echo get_theme_mod( 'background_m_color', '#fff' ); ?>" d="M169.6,0.2c-0.9,0-3,0.5-3.1,1c-0.7-0.1-2.8,0.8-4.5,1.6c-3.5-1.3-10-1.3-12-0.1c-0.7-0.6-1.3-1.1-1.6-1.4 c-1.5,0.2-2.7,0.5-3.9,0.5c-2.3-0.1-4.2,0.4-6.1,1.6c-1.3,0.8-3,1-4.4,1.4c-1.5-2.9-2.9-3.3-5.8-2.2c-1.6,0.6-3.4,0.8-5.2,1.2 c-1.5,0.4-3,1.4-4.7,1c-1.6-0.3-4.8-1.6-4.8-1.6s-2.9,1.4-4.4,1.5c-1.7,0.2-3.5,0-5.4,0c-0.2-0.6-0.4-1.2-0.6-1.9 c-0.4,0-0.7-0.1-1-0.1C97.9,3,93.8,1.2,89.5,1.9c-0.3,0-0.7-0.1-0.9-0.3c-0.8-0.9-1.4-0.8-2.3-0.1c-0.6,0.5-1.4,0.8-2.1,1.1 c-0.4,0.2-1.1,0.3-1.4,0.1c-1.9-1.2-3.7-1.1-5.6,0C76.6,3,75.4,3,74.8,2.5c-2.4-1.8-4.4-0.6-7-0.8c-0.3,0-1.2,1.1-1.7,1.1 c-0.8-0.4,0.1-1.5-3-0.7c-3.2,0.9-3.9-2.2-8.7,1.3c-1,0.8-2.4,1-3.7,1.4c-0.3,0.1-0.9-0.3-1.2-0.5c-1.2-0.8-2.4-1.6-3.5-2.4 c-2.3,0.8-4.3,1.9-6.6,2.2c-1.5,0.2-3.1,0.8-4.7,0.8c-0.9-0.1-1.8-0.5-2.8-0.6c-2.7-0.3-2.1-1-3.6-0.1c-2.5,1.5-5,0.4-7.5,0.8 c-0.2-0.7-0.3-1.3-0.5-1.8C20,3,19.5,2.7,19.2,2.7C18,2.7,17,3,15.8,2.9c-1.4,0-2.7-0.4-4-0.7C6.9,1,6.9,1.8,4.7,2.4 C2.3,3,1.4,3,0.4,0.7C0.3,0.5,0.2,0.3,0,0v5.8h170.3V0C170.3,0,169.8,0.4,169.6,0.2z"/> </svg>');
        }
        .section-border-bottom_outer::after
        {
            background-image: url('data:image/svg+xml;utf-8,<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 170.3 5.8" style="enable-background:new 0 0 170.3 5.8;" xml:space="preserve"><path fill="<?php echo get_theme_mod( 'background_m_color', '#fff' ); ?>" class="st0" d="M0.7,5.6c0.9,0,3-0.5,3.1-1C4.5,4.7,6.6,3.8,8.3,3c3.5,1.3,10,1.3,12,0.1c0.7,0.6,1.3,1.1,1.6,1.4 C23.4,4.3,24.6,4,25.8,4c2.3,0.1,4.2-0.4,6.1-1.6c1.3-0.8,3-1,4.4-1.4c1.5,2.9,2.9,3.3,5.8,2.2c1.6-0.6,3.4-0.8,5.2-1.2 c1.5-0.4,3-1.4,4.7-1c1.6,0.3,4.8,1.6,4.8,1.6s2.9-1.4,4.4-1.5c1.7-0.2,3.5,0,5.4,0C66.8,1.7,67,2.3,67.2,3c0.4,0,0.7,0.1,1,0.1 c4.2-0.3,8.3,1.5,12.6,0.8c0.3,0,0.7,0.1,0.9,0.3C82.5,5.1,83.1,5,84,4.3c0.6-0.5,1.4-0.8,2.1-1.1c0.4-0.2,1.1-0.3,1.4-0.1 c1.9,1.2,3.7,1.1,5.6,0c0.6-0.3,1.8-0.3,2.4,0.2c2.4,1.8,4.4,0.6,7,0.8c0.3,0,1.2-1.1,1.7-1.1c0.8,0.4-0.1,1.5,3,0.7 c3.2-0.9,3.9,2.2,8.7-1.3c1-0.8,2.4-1,3.7-1.4c0.3-0.1,0.9,0.3,1.2,0.5c1.2,0.8,2.4,1.6,3.5,2.4c2.3-0.8,4.3-1.9,6.6-2.2 c1.5-0.2,3.1-0.8,4.7-0.8c0.9,0.1,1.8,0.5,2.8,0.6c2.7,0.3,2.1,1,3.6,0.1c2.5-1.5,5-0.4,7.5-0.8c0.2,0.7,0.3,1.3,0.5,1.8 c0.3,0.2,0.8,0.5,1.1,0.5c1.2,0,2.2-0.3,3.4-0.2c1.4,0,2.7,0.4,4,0.7c4.9,1.2,4.9,0.4,7.1-0.2c2.4-0.6,3.3-0.6,4.3,1.7 c0.1,0.2,0.2,0.4,0.4,0.7V0H0v5.8C0,5.8,0.5,5.4,0.7,5.6z"/> </svg>');
        }
        

        /* background sections color */
        .section-bg,
        .testimonials__heading-text
        { background-color: <?php echo get_theme_mod( 'background_sp_color', '#fafafa' ); ?>; }

        /* main color */
        .cta,
		.bg_yellow,
		.heading_marked-outside,
		.heading_marked,
		.heading_marked-part::after,
		.popup__title,
		.header__menu-wrap,
		.intro_main,
		.fact__text::before,
		.cta__heading-wrap,
		.intro__bg,
		.blog__date,
		.list_yellow li::before,
		.mark
        { background-color: <?php echo get_theme_mod( 'main_color', '#ffea00' ); ?>; }

		.label_required::after,
		.text_yellow,
		.project-details__title
		{ color: <?php echo get_theme_mod( 'main_color', '#ffea00' ); ?>; }

		.services__item-img_bordered
		{ border-color: <?php echo get_theme_mod( 'main_color', '#ffea00' ); ?> }

        /* secondary color */
        .filter__item::after,
        .filter__toggle.opened,
        .blog-post_text,
        ul li::before,
        .bg_blue
        { background-color: <?php echo get_theme_mod( 'secondary_color', '#19d0ff' ); ?>; }

        .filter__item.opened,
        .filter__item:hover,
        .index-pages__item-title,
        .comment__reply::before,
        .contacts__list a
        { color: <?php echo get_theme_mod( 'secondary_color', '#19d0ff' ); ?>; }

        .video
        { border-color: <?php echo get_theme_mod( 'secondary_color', '#19d0ff' ); ?>; }

        div.sidebar__item a,
        .link_underline
        { box-shadow: 0 1px 0 0 <?php echo get_theme_mod( 'secondary_color', '#19d0ff' ); ?>}

        /* forms color */
        .contacts__form,
        .popup
        { background-color: <?php echo get_theme_mod( 'form_bg_color', '#fafafa' ); ?> }
        .input
        { background-color: <?php echo get_theme_mod( 'form_in_color', '#eef2f7' ); ?>; }

        /* Action buttons color */
        .btn
        { background-color: <?php echo get_theme_mod( 'btn_bg_color', '#888888' ); ?>; }
        .btn::after
        { background-color: <?php echo get_theme_mod( 'btn_bg_color', '#555555' ); ?>; }
        .btn:hover
        { background-color: <?php echo get_theme_mod( 'btn_hv_color', '#a2a2a2' ); ?>; }

        /* CTA buttons color */
        .btn.btn_cta
        { background-color: <?php echo get_theme_mod( 'cta_bg_color', '#19d0ff' ); ?>; }
        .btn.btn_cta::after
        { background-color: <?php echo get_theme_mod( 'cta_bd_color', '#22add1' ); ?>; }
        .btn.btn_cta:hover
        { background-color: <?php echo get_theme_mod( 'cta_hv_color', '#4cdaff' ); ?>; }

        /* Project section elements */
        .project_type-1 .project__content::after,
        .project_type-2 .project__content::after
        { background-color: <?php echo get_theme_mod( 'el_p12_color', '#f0f0f0' ); ?>; }

        .project_type-5 .project__content
        { background-color: <?php echo get_theme_mod( 'el_p5_color', '#000' ); ?>; }

        .project_type-6 .project__desc
        { background-color: <?php echo esc_html( slabb_convert_color( get_theme_mod( 'el_desc_color', '#000' ) ) ); ?>; }

        /* Quote and testimonials */
        .blockquote
        { background-color: <?php echo get_theme_mod( 'el_quote_color', '#f0f0f0' ); ?>; }

        .blockquote::before {
            background-image: url('data:image/svg+xml;utf-8,<svg version="1.0" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 449.739 449.739" style="enable-background:new 0 0 449.739 449.739;" xml:space="preserve" fill="<?php echo get_theme_mod( 'background_quote_color', '#ffea00' ); ?>"><g><path d="M141.515,27.664C79.523-0.473-13.821,52.658,1.718,126.616c8.724,41.515,46.695,71.556,87.257,79.021,c35.104,6.465,67.405-8.922,91.041-33.169c-4.888,34.652-19.355,69.388-33.5,98.018c-23.704,47.977-57.701,98.97-102.893,129.184,c-16.889,11.283-1.051,38.734,15.983,27.35C158.975,360.604,305.617,102.146,141.515,27.664z M174.143,128.183,c-19.972,34.38-53.052,54.624-92.93,43.084c-34.075-9.859-59.28-47.286-43.617-80.895c29.722-63.784,115.187-40.944,136.75,15.574,c0.437,7.046,0.556,14.102,0.594,21.17C174.679,127.484,174.384,127.771,174.143,128.183z"/><path d="M375.912,27.664c-61.992-28.137-155.333,24.994-139.797,98.952c8.719,41.515,46.697,71.556,87.26,79.021,c35.104,6.465,67.405-8.922,91.038-33.169c-4.89,34.652-19.347,69.388-33.499,98.018c-23.704,47.977-57.696,98.97-102.896,129.184,c-16.889,11.283-1.046,38.734,15.985,27.35C393.375,360.604,540.022,102.146,375.912,27.664z M408.547,128.183,c-19.972,34.38-53.055,54.624-92.932,43.084c-34.073-9.859-59.28-47.286-43.615-80.895c28.406-60.966,107.699-42.767,133.49,8.3,c2.493,9.453,3.331,19.037,3.448,28.99C408.812,127.848,408.66,127.979,408.547,128.183z"/></g></svg>'); 
        }    

        /* Packages */
        .pricing-table
        { background-color: <?php echo get_theme_mod( 'el_pack_bg_color', '#111' ); ?>; }

        .pricing-table tr:first-child
        { background-color: <?php echo get_theme_mod( 'el_pack_hd_color', '#000' ); ?>; }

        .pricing-table_yellow
        { background-color: <?php echo get_theme_mod( 'el_pack_sale_color', '#ebd800' ); ?>; }

        .pricing-table_yellow tr:first-child
        { background-color: <?php echo get_theme_mod( 'el_pack_sale_hd_color', '#ffea00' ); ?>; }

        .img_underlayer::after
        { background-color: <?php echo get_theme_mod( 'background_a_color', '#f0f0f0' ); ?>; }

        /* Fonts */
        body,
        .pricing-table_yellow,
        .pricing-table_yellow .pricing-table__price,
        .blockquote__author
        {
            color: <?php echo get_theme_mod( 'black_font', '#000' ); ?>;
        }

        .text_white,
        .project_type-6 .project__desc,
        .pricing-table:not(.pricing-table_yellow),
        .cta__heading-icon,
        .copyright
        {
            color: <?php echo get_theme_mod( 'white_font', '#fff' ); ?>;
        }

        blockquote,
        .text_gray,
        .category-text,
        .project_type-5 .project__content,
        .label_placeholder
        {
            color: <?php echo get_theme_mod( 'gray_font', '#888' ); ?>;
        }
        
        .heading_double__duplicate{
            color: <?php echo get_theme_mod( 'dhead_font', '#f9f9f9' ); ?>;
        }

        .heading_rotated{
            color: <?php echo get_theme_mod( 'vhead_font', '#dedede' ); ?>;
        }

        .btn:not(.btn_cta){
            color: <?php echo get_theme_mod( 'btn_font', '#fff' ); ?>;
        }
        .btn.btn_cta {
            color: <?php echo get_theme_mod( 'cta_btn_font', '#fff' ); ?>;
        }

    </style>
    <?php
};
add_action( 'wp_head', 'slabb_customizer_css' );

function slabb_customizer_live_preview() {
    wp_enqueue_script( 'slabb-theme-customizer', get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ), true );
};
add_action( 'customize_preview_init', 'slabb_customizer_live_preview' );

function slabb_convert_color( $hex_code ){
    $string = trim($hex_code, '#');
    $r = hexdec(substr($string, 0, 2));
    $g = hexdec(substr($string, 2, 2));
    $b = hexdec(substr($string, 4, 2));
    return 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . 0.6 . ')';
};
