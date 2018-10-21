<?php
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 */

if ( !defined('FW') ) die('Forbidden' );
if ( post_password_required() ) { return; }

$commenter                  = wp_get_current_commenter();
$slabb_settings_options     = fw_get_db_settings_option();
$slabb_name_placeholder     = $slabb_settings_options['blog_name_placeholder'];
$slabb_email_placeholder    = $slabb_settings_options['blog_email_placeholder'];
$slabb_message_placeholder  = $slabb_settings_options['blog_message_placeholder'];
$slabb_button_text          = $slabb_settings_options['blog_button_text'];


?>
<section class="comments blog__item">
    <h2 class="heading_bordered">
        <?php comments_number( esc_html__( 'No Comments', 'slabb' ), esc_html__( '1 Comment', 'slabb' ), esc_html__( '% Comments', 'slabb' ) );?>    
    </h2>
    <ol class="comment-list">
        <?php wp_list_comments( 'style=ul&callback=slabb_theme_comments&max_depth=10&avatar_size=80&short_ping=true' ); ?>
    </ol>
    <?php 
    $args_pagin = array(
        'prev_text' => esc_html__( '<< Prev comments', 'slabb' ),
        'next_text' => esc_html__( 'Next comments >>', 'slabb' ),
        'screen_reader_text' => esc_html__( 'comments navigation', 'slabb' )
    );
    the_comments_navigation( $args_pagin );
    ?>
    <div class="comment__respond">
    <?php         
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'slabb' ); ?></p>
    <?php
    };

    $slabb_name_field = '<div class="comment-form__item form__item form__item_half">';
    $slabb_name_field .= '<input id="author" class="name input required input_placeholder" name="author" type="text" value="';
    $slabb_name_field .= esc_attr( $commenter['comment_author'] );
    $slabb_name_field .= '"/>';
    $slabb_name_field .= '<label class="label_placeholder label_required" for="author">';
    $slabb_name_field .= esc_html( $slabb_name_placeholder );
    $slabb_name_field .= '</label></div>';

    $slabb_email_field = '<div class="comment-form__item form__item form__item_half">';
    $slabb_email_field .= '<input id="email" class="email input required input_placeholder" name="email" type="email" value="';
    $slabb_email_field .= esc_attr( $commenter['comment_author_email'] );
    $slabb_email_field .= '"/>';
    $slabb_email_field .= '<label class="label_placeholder label_required" for="email">';
    $slabb_email_field .= esc_html( $slabb_email_placeholder );
    $slabb_email_field .= '</label></div>';

    $slabb_message_field = '<div class="comment-form__item form__item">';
    $slabb_message_field .= '<textarea id="message" class="message input input_placeholder" name="comment"></textarea>';
    $slabb_message_field .= '<label class="label_placeholder" for="message">';
    $slabb_message_field .= esc_html( $slabb_message_placeholder );
    $slabb_message_field .= '</label></div>';

    $slabb_button_field = '<div class="comment-form__item form__item">';
    $slabb_button_field .= '<button class="btn btn_cta btn_wide" type="submit">';
    $slabb_button_field .= esc_html( $slabb_button_text );
    $slabb_button_field .= '</button></div>';

    $comment_arg = array(
        'fields' => array(
            'name'  => $slabb_name_field,
            'email' => $slabb_email_field
        ),
        'comment_field'         =>  $slabb_message_field,
        'submit_button'         => $slabb_button_field,
        'title_reply'           => esc_html__( 'Add a comment', 'slabb' ),
        'title_reply_before'    => '<h2 class="heading_bordered">',
        'title_reply_after'     => '</h2>',
        'logged_in_as'          => '',
        'class_form'            => 'comment-form form_comment',
        'comment_notes_before'  => '',
    );

    // change fields order in form
    add_filter( 'comment_form_fields', 'slabb_order_comment_fields' );
    function slabb_order_comment_fields( $slabb_fields ){
        $slabb_new_fields = array();
        $slabb_myorder = array( 'name', 'email', 'comment' );
        foreach( $slabb_myorder as $key ){
            $slabb_new_fields[ $key ] = $slabb_fields[ $key ];
            unset( $slabb_fields[ $key ] );
        }
        return $slabb_new_fields;
    };

    comment_form( $comment_arg );
 
    ?>
    </div>
    <!-- END comment form-->

   </section>
    <!-- Comments end -->

<?php
function slabb_theme_comments( $comment, $args, $depth ){
?>
<li id="li-comment-<?php comment_ID() ?>" class="comment">
    <div class="comment__body">
        <header class="comment__header">
             <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 80, '', '', array('class'=>'author-photo photo_circle') ); ?>
            <div class="comment__info">
                <span class="comment__author">
                <?php echo get_comment_author_link() ?>
                </span>
                <span class="comment__reply">
                <?php 
                if( 'comment' == get_comment_type() && comments_open() ) {
                    comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); 
                }; ?>
                </span>
                <div class="comment__date date">
                    <?php
                    echo get_comment_date() . ' @ ' .  get_comment_date('h') . ':' . get_comment_date('i');
                    ?>
                </div>
            </div>
        </header>
        <?php 
        if(  get_comment_type() ) {?>
            <div class="comment__content">
            <?php comment_text() ?>
            </div>
        <?php
        };
        ?>
    </div>
<?php
};
?>

