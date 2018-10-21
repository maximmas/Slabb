<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage SLABB_Theme
 * @since v1.00
 */
?>

<div class="sidebar__item">
    <form action="<?php echo esc_url( home_url('/') ) ?>" method="post">
        <div class="search-field field-group">
            <input type="search"
                   id="search"
                   class="input"
                   name="s"
                   value="<?php echo esc_html( get_search_query() ); ?>" >
            <label class="label_placeholder" for="search"><?php esc_html_e( 'Search...', 'slabb' ); ?></label>
            <button class="search-field__btn field-group__btn" type="submit"></button>
        </div>
    </form>
</div>