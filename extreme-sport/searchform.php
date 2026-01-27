<?php
/**
 * Search Form Template
 * 
 * @package Extreme_Sports_Elite
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input 
        type="search" 
        class="search-form__input" 
        placeholder="<?php esc_attr_e('Search...', 'extreme-sports'); ?>" 
        value="<?php echo esc_attr(get_search_query()); ?>" 
        name="s" 
    />
    <button type="submit" class="search-form__button">
        <?php esc_html_e('Search', 'extreme-sports'); ?>
    </button>
</form>
