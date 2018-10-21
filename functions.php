<?php
/**
 * Slabb Theme functions and definitions
 *
 * @package WordPress
 * @subpackage Slabb_Theme
 * @since Slabb v1.00
 */

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once get_template_directory() . '/classes/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/classes/class-slabb-theme-constants.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/hooks.php';

define( 'SLABB_THEME_DIR', get_template_directory_uri() );

// Enqueue styles, fonts and scripts 
add_action( 'wp_enqueue_scripts', 'slabb_styles_scripts' );
function slabb_styles_scripts()
{
 
    $style_libs = array('bootstrap', 'font-awesome','magnificpopup','animate', 'slabb_fonts' );

    wp_enqueue_style( 'slabb_style', get_stylesheet_uri(), $style_libs );
    wp_enqueue_style( 'bootstrap', SLABB_THEME_DIR . '/libs/bootstrap.min.css', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'font-awesome', SLABB_THEME_DIR . '/libs/font-awesome.min.css' );
    wp_enqueue_style( 'magnificpopup', SLABB_THEME_DIR . '/libs/magnific-popup.css' );
    wp_enqueue_style( 'animate', SLABB_THEME_DIR . '/libs/animate.min.css' );
    wp_enqueue_style( 'slabb_fonts', slabb_fonts_url(), array(), null );

    slabb_add_services_icons();
    slabb_add_thumb_image_size();

    $script_libs = array( 'jquery', 'smoothscroll', 'imagesloaded', 'magnific-popup', 'waypoints', 'bigtext', 'masonry', 'validate', 'jarallax', 'isotope' );
    wp_enqueue_script( 'slabb_script', SLABB_THEME_DIR . '/js/common.js', $script_libs, false, true);
    wp_enqueue_script( 'smoothscroll', SLABB_THEME_DIR . '/libs/smoothscroll.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'imagesloaded', SLABB_THEME_DIR . '/libs/imagesloaded.pkgd.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'magnific-popup', SLABB_THEME_DIR . '/libs/jquery.magnific-popup.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'waypoints', SLABB_THEME_DIR . '/libs/jquery.waypoints.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'bigtext', SLABB_THEME_DIR . '/libs/bigtext.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'masonry', SLABB_THEME_DIR . '/libs/masonry.pkgd.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'validate', SLABB_THEME_DIR . '/libs/jquery.validate.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'jarallax', SLABB_THEME_DIR . '/libs/jarallax.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'isotope', SLABB_THEME_DIR . '/libs/isotope.pkgd.min.js', array('jquery'), false, true );
      
    wp_localize_script( 'slabb_script', 'AjaxHandler', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

};


// WP new features support
add_action('after_setup_theme', 'slabb_setup');
function slabb_setup()
{
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
     add_theme_support( 'custom-header', array(
         'video'        => true,
         'width'        => 2000,
         'height'       => 1200,
         'flex-height'  => true,
     ));
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ));
    load_theme_textdomain( 'slabb', SLABB_THEME_DIR . '/languages' );

    register_nav_menu( 'right-menu', esc_html__('Right panel menu', 'slabb' ));
    
    set_post_thumbnail_size( 450, 9999 );
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'small-thumb', 450, 9999, true ); // crop
        add_image_size( 'big-thumb', 1050, 9999, true ); // crop
    };

};


// Set the content width based on the theme's design and stylesheet. 
if (!isset($content_width))
    $content_width = 900;


// DB query function, uses on the index page
function slabb_get_posts($post_type)
{
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => -1,
        'order'             => 'DESC',
        'orderby'           => 'date',
        'ignore_sticky_posts' => 1
    );
    $query = new WP_Query;
    $posts = $query->query( $args );
    return $posts;
};


// function of posts pagination on blog page
function slabb_pagination($query = null)
{
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999;
    $paginate = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'type' => 'array',
            'total' => $query->max_num_pages,
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var( 'paged' ) ),
            'prev_next' => true,
            'prev_text' => '<p class="pagination-arrow pagination-arrow_prev arrow-prev"></p>',
            'next_text' => '<p class="pagination-arrow pagination-arrow_next arrow-next"></p>'

        )
    );
    if ( $query->max_num_pages > 1 ) :
        ?>
            <div class="pagination">
                <div class="pages">
                <?php
                foreach ( $paginate as $page ) { echo '<span>' . $page . '</span>'; }
                ?>
                </div>
            </div>
        <?php
    endif;
};


// right sidebar's widgets registration 
add_action('widgets_init', 'slabb_register_widgets');
function slabb_register_widgets()
{

    register_sidebar(array(
        'id' => 'blog_sidebar',
        'name'              => esc_html__( 'Right sidebar', 'slabb' ),
        'description'       => esc_html__( 'Area for widgets in right sidebar. Drag-and-drop widgets here from &#8216;Available Widgets&#8216; section. Tags will be displayed as cloud.', 'slabb' ),
        'before_widget'     => '<div class="sidebar__item">',
        'after_widget'      => '</div>',
        'before_title'      => '<h6 class="sidebar__heading heading_marked widget-title">',
        'after_title'       => '</h6>',
    ));

    register_sidebar(array(
        'id' => 'category_sidebar',
        'name'              => esc_html__( 'Category sidebar', 'slabb' ),
        'description'       => esc_html__( 'Area for styled category widget in right sidebar. Drag-and-drop &#8216;Tags&#8216; widget here from &#8216;Available Widgets&#8216; section. Tags will be displayed as cloud.', 'slabb' ),
        'before_widget'     => '',
        'after_widget'      => '',
        'before_title'      => '',
        'after_title'       => '',
    ));
    
    register_sidebar(array(
        'id' => 'posts_sidebar',
        'name'              => esc_html__( 'Recent posts sidebar', 'slabb' ),
        'description'       => esc_html__( 'Area for styled recent posts widget in right sidebar. Drag-and-drop &#8216;Recent posts&#8216; widget here from &#8216;Available Widgets&#8216; section. Tags will be displayed as cloud.', 'slabb' ),
        'before_widget'     => '',
        'after_widget'      => '',
        'before_title'      => '',
        'after_title'       => '',
    ));

    register_sidebar(array(
        'id' => 'tags_sidebar',
        'name' => esc_html__('Tags sidebar', 'slabb'),
        'description' => esc_html__('Area for styled tags widget in right sidebar. Drag-and-drop here &#8216;Tags&#8216; widget from &#8216;Available Widgets&#8216; section. Tags will be displayed as list.', 'slabb'),
        'before_widget' => '<div class="sidebar__item">',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        'after_widget' => '</div>'
    ));
};



add_action( 'tgmpa_register', 'slabb_register_required_plugins' );
function slabb_register_required_plugins()
{
    $plugins = array(
        array(
            'name'                  => esc_html__( 'Slabb Plugin', 'slabb' ),
            'slug'                  => 'slabb-plugin',
            'source'                => esc_url( 'https://bitbucket.org/grawixthemes9/slabb-wp-plugin/get/8fa887544672.zip' ),
            'required'              => true,
            'version'               => '',
            'force_activation'      => true,
            'force_deactivation'    => true,
            'external_url'          => esc_url( 'https://github.com/maximmas/slabb-plugin' ),
            'is_callable'           => '',
        ),
        array(
            'name'                  => esc_html__( 'Unyson', 'slabb' ),
            'slug'                  => 'unyson',
            'source'                => esc_url( 'https://github.com/ThemeFuse/Unyson/archive/master.zip' ),
            'required'              => true,
            'version'               => '',
            'force_activation'      => true,
            'force_deactivation'    => false,
            'external_url'          => esc_url( 'https://github.com/ThemeFuse/' ),
            'is_callable'           => '',
        )
    );
    $config = array(
        'id'                        => 'slabb',
        'default_path'              => esc_url( SLABB_THEME_DIR . '/libs/plugins/' ),
        'menu'                      => 'slabb-install-required-plugins',
        'has_notices'               => true,
        'dismissable'               => true,
        'is_automatic'              => true,
        
    );

    tgmpa( $plugins, $config );
};

function slabb_fonts_url(){
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $pt_sans = _x('on', 'Open Sans font: on or off', 'slabb');

    if ('off' !== $pt_sans) {
        $font_family = 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7COswald:200,300,400,500,600,700';
    };

    $query_args = array(
        'family' => htmlentities($font_family),
        'subset' => urlencode('cyrillic')
    );
    $fonts_url = add_query_arg($query_args, esc_url('https://fonts.googleapis.com/css'));
    return esc_url_raw($fonts_url);
}


function slabb_show_category(){
    foreach (get_the_category() as $slabb_category) {
        $slabb_cats_array[] = $slabb_category->cat_name;
    };
    if (isset($slabb_cats_array)) {
        $slabb_string = implode(", ", $slabb_cats_array);
    } else {
        $slabb_string = "uncategorized";
    }
    return $slabb_string;
}


function slabb_video_id($url){
    parse_str(parse_url($url, PHP_URL_QUERY), $slabb_array_of_vars);
    return $slabb_array_of_vars['v'];
};


// display excerpt and more link
function slabb_display_excerpt()
{
    global $post;
    $slabb_excerpt = get_the_excerpt();
    if ($slabb_excerpt != '') {
        echo esc_html($slabb_excerpt);
        echo '<div class = "more_link"><a href="' . esc_url(get_permalink($post->ID)) . '">' .
            esc_html__( ' Read more', 'slabb' ) . '...</a></div>';
    } else {
        $slabb_excerpt = " ";
        echo esc_html($slabb_excerpt);
    };
};


// check if feature image is vertical or horizontal
function slabb_is_image_vertical(){
    $slabb_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
    $slabb_is_vertical = ( $slabb_img_url[1] > $slabb_img_url[2]) ? false : true;
    return $slabb_is_vertical;
};


// add header image
function slabb_add_header_image(){
    $slabb_custom_header = get_custom_header();
    if (!empty($slabb_custom_header->attachment_id)) {
        $slabb_image = wp_get_attachment_image_url($slabb_custom_header->attachment_id, 'full');
        $slabb_header_css = '.section-intro {';
        $slabb_header_css .= 'background: url(' . $slabb_image . ');';
        $slabb_header_css .= 'background-repeat: no-repeat;';
        $slabb_header_css .= 'background-size: contain;';
        $slabb_header_css .= 'background-position: right;';
        $slabb_header_css .= '}';

        /* add media query to header image */
        $slabb_header_css .= '@media only screen and (max-width: 480px) { 
								.section-intro { 
								   background-size: cover;
	   							   background-position: left center;
	   							}
							}';

        wp_add_inline_style( 'slabb_style', $slabb_header_css );
    };
};


function slabb_add_services_icons(){
    
    $slabb_posts = get_posts( 'post_type=slabb_service&numberposts=-1' );
    foreach ( $slabb_posts as $slabb_post ) {
            $slabb_thumb = get_the_post_thumbnail_url($slabb_post->ID, 'thumbnail');
            $slabb_icon_css = '#services-item-icon-' . $slabb_post->ID . ' {';
            if ( !empty( $slabb_thumb ) ) {
                $slabb_icon_css .= 'background: url(' . $slabb_thumb . ');';
            };
            $slabb_icon_css .= 'background-repeat: no-repeat;';
            $slabb_icon_css .= 'background-position: center;';
            $slabb_icon_css .= 'background-size: 50% auto;';
            $slabb_icon_css .= '}';
            wp_add_inline_style( 'slabb_style', $slabb_icon_css );
        };
};

function slabb_get_social_links( $loc ){
    $slabb_links            = array();
    $location = ($loc == 'menu' ) ? 'is_menu_display' : 'is_contact_display';

    $slabb_settings_options = fw_get_db_settings_option();
    $slabb_all_links        = $slabb_settings_options['social_links'];

    foreach ( $slabb_all_links as $slabb_all_link ){
        if ( $slabb_all_link[ $location ] == 'yes' ) $slabb_links[] = $slabb_all_link;
    };
    return $slabb_links;
};

// get title of custom widget
function slabb_get_widget_title ( $name ){
    $slabb_widgets    = wp_get_sidebars_widgets();
    $slabb_widget_id  = $slabb_widgets[ $name ][0];
    $slabb_id         = _get_widget_id_base( $slabb_widget_id );   
    $slabb_instance   = get_option( 'widget_' . $slabb_id );
    $slabb_i          = str_replace( $slabb_id . '-', '', $slabb_widget_id );
    return $slabb_instance[ $slabb_i ]['title'];
  };


function slabb_add_thumb_image_size(){
    $slabb_w     = get_option( 'thumbnail_size_w' );
    $slabb_h    = get_option( 'thumbnail_size_h' );
    $slabb_thumb_size = '.size-thumbnail{';
    $slabb_thumb_size .= 'height:' . $slabb_h. 'px !important;';
    $slabb_thumb_size .= 'width:' . $slabb_w . 'px !important};';

    wp_add_inline_style( 'slabb_style', $slabb_thumb_size );
};


function slabb_get_hash(){
    $chars = '12345abcdefghijklmnoprstuvwxyz67890';
    $hash= '';
    for ($ichars = 0; $ichars < 4; ++$ichars) {
        $random = str_shuffle($chars);
        $hash .= $random[0];
    }
    return $hash;
};

?>
