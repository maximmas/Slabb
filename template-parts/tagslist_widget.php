<?php 
/*
 * Display list of tags on blog page
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 * 
 */
    
  $slabb_tags = get_tags();

  if ( $slabb_tags ) { ?>
  <div class="sidebar__item tags">
    <h6 class="sidebar__heading heading_marked"><?php esc_html_e( 'Tags','slabb' ); ?></h6>
      <div>
    <?php
    $html = '';
    $allowed_html = array(
        'a' => array(
            'href'  => true,
            'title' => true
        ),
        'span' => array()
    ); 
    foreach ( $slabb_tags as $slabb_tag ){
      $slabb_tag_link = get_tag_link( $slabb_tag->term_id );
      $html .= '<span>';
      $html .= "<a href='{$slabb_tag_link}' title='{$slabb_tag->name} tag'>";
      $html .= "#{$slabb_tag->name}</a>";
      $html .= '</span>';  
    }
    
    echo wp_kses( $html, $allowed_html );
    ?>
  </div>
</div>
<?php } ?>    
   
    
  