<?php
/**
 * Search Form Template
 * 
 * Custom search form for the theme.
 *
 * @package Champions_League_Elite_Hub
 */

$unique_id = esc_attr(uniqid('search-form-'));
$search_string = get_search_query();
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="<?php echo $unique_id; ?>" class="screen-reader-text">
        <?php esc_html_e('Search for:', 'champions-league'); ?>
    </label>
    <div class="input-group">
        <input
            id="<?php echo $unique_id; ?>"
            type="search"
            class="form-control"
            placeholder="<?php esc_attr_e('Search matches, teams, players, posts...', 'champions-league'); ?>"
            value="<?php echo esc_attr($search_string); ?>"
            name="s"
            aria-label="<?php esc_attr_e('Search', 'champions-league'); ?>"
        />
        <button type="submit" class="btn btn-primary" aria-label="<?php esc_attr_e('Search', 'champions-league'); ?>">
            <i class="fas fa-search"></i>
            <span class="d-none d-md-inline ms-2"><?php esc_html_e('Search', 'champions-league'); ?></span>
        </button>
    </div>
</form>