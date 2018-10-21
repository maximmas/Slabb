<?php
/**
 * Slabb Theme actions and filters
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since Slabb 1.0
 */



function slabb_tagcloud_wrapping( $return, $tags, $args ){
    return '<div class="sidebar__item">' . $return . '</div>';
};
add_filter( 'wp_generate_tag_cloud', 'slabb_tagcloud_wrapping', 10, 3 );


function slabb_add_blogpage( $items ) {
    $blogpage   = array();
    $bp_element = array();
    if ( is_single() || is_archive() || is_search() ){
        $fpage_id = get_option( 'page_on_front' );
        if ( $fpage_id ){
            $page_for_posts_id      = get_option( 'page_for_posts' );    
            $blogpage['id']         = $page_for_posts_id;
            $page_for_posts         = get_post( $page_for_posts_id );
            $blogpage['name']       = $page_for_posts->post_title;
            $blogpage['type']       = 'post';
            $blogpage['url']        = get_permalink( $page_for_posts_id );
            $blogpage['post_type']  = 'page';
            $b[] = $blogpage;
            array_splice ( $items, 1, 0, $b );
        }
    };
    return $items;
};
add_filter( 'fw_ext_breadcrumbs_build', 'slabb_add_blogpage' );


function slabb_tag_cloud_font( $args ) {
    $args = array('smallest'    => 16, 'default' => 18, 'largest'    => 25, 'unit' => 'px');
    return $args;
};
add_filter( 'widget_tag_cloud_args', 'slabb_tag_cloud_font' );


// allow video header on all pages
function slabb_header_video_active( $show_video ){
    if( is_page() )
        $show_video = true;
    else
        $show_video = false;
    return $show_video;
};
add_filter( 'is_header_video_active', 'slabb_header_video_active' );


function slabb_custom_packs_list( $current_packs ){
    return array( 'font-awesome', 'unycon' );
};
add_filter( 'fw:option_type:icon-v2:filter_packs', 'slabb_custom_packs_list' );


function slabb_blog_template( $slabb_template ){
    if (is_home()) {
        if ( $slabb_new_template = locate_template( array( 'index.php' ) ) )
            $slabb_template = $slabb_new_template;
    }
    return $slabb_template;
};
add_filter( 'template_include', 'slabb_blog_template', 99 );


function slabb_excerpt_more( $more ){
    return '';
};
add_filter('excerpt_more', 'slabb_excerpt_more');


function slabb_enqueue_comments_reply(){
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
};
add_action( 'comment_form_before', 'slabb_enqueue_comments_reply' );


function slabb_add_editor_styles() {
    add_editor_style( 'editor-styles.css' );
};
add_action( 'current_screen', 'slabb_add_editor_styles' );


//add SVG to allowed file uploads
function spa_add_file_types_to_uploads( $file_types ){

    $new_filetypes          = array();
    $new_filetypes['svg']   = 'image/svg+xml';
    $file_types             = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action( 'upload_mimes', 'spa_add_file_types_to_uploads' );


/**
 * @param FW_Ext_Backups_Demo[] $demos
 * @return FW_Ext_Backups_Demo[]
 */
function slabb_filter_theme_fw_ext_backups_demos( $demos ) {
    $demos_array = array(
        'slabb-demo' => array(
            'title' => __( 'Slabb Demo', 'slabb' ),
            'screenshot' => 'http://free.slabb-wp.themes.grawix.com/demo/screenshot.png',
            'preview_link' => 'http://free.slabb-wp.themes.grawix.com',
        ),
        // ...
    );

    $download_url = 'http://free.slabb-wp.themes.grawix.com/demo/';

    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', 'slabb_filter_theme_fw_ext_backups_demos' );