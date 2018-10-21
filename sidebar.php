 <?php
/**
 * The Sidebar contains widget arieas
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 */
?>
<aside class="sidebar col-xs-5 col-md-1">
	<div class="sidebar__content">
        <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : dynamic_sidebar( 'blog_sidebar' ); endif; ?>
        <?php if ( is_active_sidebar( 'category_sidebar' ) ) : get_template_part( 'template-parts/category_widget' ); endif; ?>
		<?php if ( is_active_sidebar( 'posts_sidebar' ) ) : get_template_part( 'template-parts/recent_widget' ); endif; ?>
	    <?php if ( is_active_sidebar( 'tags_sidebar' ) ) : get_template_part( 'template-parts/tagslist_widget' ); endif; ?>    
	</div>
</aside>
