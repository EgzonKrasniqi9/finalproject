# Extreme Sports Elite WordPress Theme

## Overview

**Extreme Sports Elite** is a professional, feature-rich WordPress theme designed specifically for extreme sports websites, blogs, and communities. It includes advanced functionality like custom post types, taxonomies, multiple widgets, and a modern responsive design.

## Features

### ✅ Core Features Included

- **CSS & JavaScript** - Complete styling with responsive design and interactive functionality
- **Custom Menus** - Support for primary, secondary, and footer menus
- **Post Loop** - Grid-based post display with featured images and metadata
- **Body Class** - Dynamic body classes for conditional styling
- **Page Templates** - Full-width page template with customization
- **Theme Support** - Title tags, post thumbnails, post formats, custom logo
- **Post Formats** - Support for video, audio, gallery, quote, and link formats
- **Sidebar & Widgets** - Primary sidebar + 3 footer widget areas
- **WP_Query** - Helper functions for custom post queries
- **Tags** - Full tag support with display and filtering
- **Edit Links** - Post edit functionality for authorized users
- **Search Form** - Customizable search form template
- **Search Results** - Beautiful search results template
- **Pagination** - Native WordPress pagination with custom styling
- **Blog Info** - Site information display in footer
- **Custom Archive Pages** - Styled archive pages for all content types
- **404 Page** - Custom 404 error page with helpful navigation
- **Custom Post Types** - Athletes, Events, Gear, Videos
- **Custom Taxonomies** - Sport Categories, Athlete Levels, Event Types, Gear Types

## File Structure

```
extreme-sport/
├── style.css                 # Main theme stylesheet
├── functions.php             # Theme functions and configuration
├── header.php                # Header template
├── footer.php                # Footer template
├── index.php                 # Main index/posts template
├── single.php                # Single post template
├── archive.php               # Archive pages template
├── search.php                # Search results template
├── 404.php                   # 404 error page
├── comments.php              # Comments template
├── searchform.php            # Search form template
├── sidebar.php               # Sidebar template
├── template-home.php         # Full-width page template
├── css/
│   └── custom.css            # Additional custom styles
└── js/
    └── main.js               # Main JavaScript file
```

## Installation & Setup

1. **Upload the theme** to `/wp-content/themes/extreme-sport/`
2. **Activate** the theme in WordPress Admin → Appearance → Themes
3. **Configure menus** in Admin → Appearance → Menus
4. **Set up widgets** in Admin → Appearance → Widgets
5. **Customize** in Admin → Appearance → Customize

## WordPress Features Used

### Theme Support (`add_theme_support`)
- `title-tag` - Automatic page/post titles
- `post-thumbnails` - Featured images
- `custom-logo` - Custom site logo
- `html5` - HTML5 markup
- `post-formats` - Video, audio, gallery, quote, link

### Custom Post Types
- **Athletes** - Profile posts for athletes
- **Events** - Event announcements and coverage
- **Gear** - Equipment reviews and guides
- **Videos** - Video content with custom archive

### Custom Taxonomies
- **Sport Categories** - Hierarchical categories (post, athletes, events)
- **Athlete Level** - Beginner, Intermediate, Professional
- **Event Type** - Competition, Training, Exhibition
- **Gear Type** - Clothing, Equipment, Safety Gear

### Menus
- **Primary Menu** - Main navigation
- **Secondary Menu** - Additional navigation
- **Footer Menu** - Footer links

### Sidebars/Widgets
- **Primary Sidebar** - Blog sidebar
- **Footer Widget 1-3** - Three footer widget areas

## Functions & Hooks

### Custom Functions in functions.php

```php
extreme_sports_assets()           // Enqueue CSS and JS
extreme_sports_theme_support()    // Register theme support
extreme_sports_menus()            // Register custom menus
extreme_sports_widgets_init()     // Register sidebars
extreme_sports_custom_post_types()// Register CPTs
extreme_sports_custom_taxonomies()// Register taxonomies
extreme_sports_body_class()       // Add custom body classes
extreme_sports_pagination()       // Display pagination
extreme_sports_get_posts()        // Query posts with WP_Query
extreme_sports_search_form()      // Customize search form
extreme_sports_site_info()        // Display site info
extreme_sports_get_posts_by_category() // Get posts by taxonomy
```

### Hooks Used

```php
wp_enqueue_scripts              // Load assets
after_setup_theme               // Register theme support
init                            // Register menus, CPTs, taxonomies
widgets_init                    // Register sidebars
body_class                      // Add body classes
get_search_form                 // Customize search form
```

## CSS Structure

### Color Variables
- `--primary-color: #ff6b35` (Orange)
- `--secondary-color: #004e89` (Dark Blue)
- `--accent-color: #f7931e` (Golden)
- `--dark-bg: #1a1a1a` (Dark)
- `--light-text: #ffffff` (White)

### Responsive Breakpoints
- Mobile: < 768px
- Desktop: ≥ 768px

### CSS Components
- Header & Navigation
- Post Cards & Grid
- Sidebar & Widgets
- Single Post Layout
- Comments Section
- Search Form
- Pagination
- Footer
- 404 Page
- Accessibility

## JavaScript Features

### main.js Functionality
- Mobile menu toggle
- Smooth scroll navigation
- Lazy image loading
- Search form validation
- Comment reply handling
- Post navigation
- AJAX load more posts

## Customization Guide

### Change Primary Color
Edit `style.css` and update the CSS variable:
```css
:root {
    --primary-color: #your-color;
}
```

### Add Custom Widget
Register in `functions.php`:
```php
register_sidebar(array(
    'name' => 'My Widget Area',
    'id' => 'my-sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
));
```

### Create Custom Page Template
Create a file like `template-custom.php` with this header:
```php
<?php
/**
 * Template Name: My Custom Template
 */
```

### Query Custom Post Type
Use the helper function:
```php
$athletes = extreme_sports_get_posts('athletes', 10, 1);

while ($athletes->have_posts()) {
    $athletes->the_post();
    // Display athlete content
}
wp_reset_postdata();
```

## SEO Features

- Proper heading hierarchy
- Semantic HTML5 markup
- Meta tags in header
- Breadcrumb navigation
- Structured data ready
- Fast image loading

## Performance

- Minified CSS in style.css
- Optimized JavaScript loading
- Lazy loading support
- Responsive image sizes
- Efficient database queries

## Accessibility

- WCAG 2.1 compliant
- Skip to content link
- Proper ARIA labels
- Keyboard navigation support
- Focus visible states
- Semantic HTML

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## FAQ

**Q: How do I add a new custom post type?**
A: Edit `functions.php` and use `register_post_type()` in the `extreme_sports_custom_post_types()` function.

**Q: How do I change the posts per page?**
A: Go to Admin → Settings → Reading and adjust "Posts per page".

**Q: Can I use this with WooCommerce?**
A: Yes! The theme includes WooCommerce-compatible CSS classes.

**Q: How do I add custom CSS?**
A: Add CSS to `css/custom.css` or use Admin → Customize → Additional CSS.

## Support & Documentation

For detailed WordPress documentation, visit:
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [WordPress Plugin API](https://developer.wordpress.org/plugins/)

## License

This theme is provided as-is for educational and development purposes.

## Version

Version: 1.0.0
Last Updated: January 2026

## Credits

Developed for extreme sports content creation and management.
