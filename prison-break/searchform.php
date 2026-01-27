<?php
/**
 * Prison Break Elite - Search Form
 * 
 * @package Prison_Break_Elite
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="s">
        <?php esc_attr_e('Search for:', 'prison-break'); ?>
    </label>
    <input type="search" id="s" class="search-input" placeholder="<?php esc_attr_e('Search Prison Break...', 'prison-break'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-button">
        <span class="screen-reader-text"><?php esc_attr_e('Search', 'prison-break'); ?></span>
        <i class="icon-search"></i>
    </button>
</form>
