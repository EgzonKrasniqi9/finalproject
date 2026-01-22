# Champions League Elite Hub - WordPress Theme

A complete, fully-featured WordPress theme for Champions League football websites with advanced functionality including custom post types, taxonomies, widgets, and more.

## Features

### 1. Theme Support & Setup
- ✅ Title tag support
- ✅ Post thumbnails
- ✅ Post formats (gallery, link, image, quote, video, audio)
- ✅ HTML5 markup support
- ✅ Custom logo support
- ✅ Automatic feed links
- ✅ Responsive embeds

### 2. Custom Menus
- Primary Menu (main navigation)
- Footer Menu
- Mobile Menu
- Bootstrap-compatible menu walker for dropdown support

### 3. Custom Post Types
- **Matches** - Football matches with featured images and comments
- **Teams** - Team profiles with league information
- **Players** - Player profiles with position information

### 4. Custom Taxonomies
- **Competition** - Tournament/competition classification (hierarchical)
- **Season** - Match season classification
- **League** - Team league classification (hierarchical)
- **Position** - Player position classification (hierarchical)

### 5. Sidebar & Widgets
- Primary Sidebar - Main content area sidebar
- Footer Widget Area - Footer widget zone
- Default widgets included:
  - Recent Posts
  - Categories with post counts
  - Tags cloud
  - Featured Matches
  - Search widget

### 6. Post Loop & WP_Query
- Optimized post queries on home page
- Archive page queries with filters
- Custom taxonomy filtering
- Pagination with Bootstrap styling
- Related posts functionality
- Search results with highlighting

### 7. Page Templates
- **template-home.php** - Custom home page with featured sections:
  - Hero section
  - Featured matches grid
  - Top teams showcase
  - Star players grid
  - Latest news section
  - Call-to-action section

### 8. Search & Search Form
- Custom search form in header
- Search results page with filtering by post type
- Search query highlighting in results
- Fallback suggestions for empty results

### 9. Body Classes
- `.has-sidebar` / `.no-sidebar` - Sidebar availability
- `.single-match`, `.single-team`, `.single-player` - Post type indicators
- `.page-{ID}` - Specific page identifier
- `.is-archive`, `.is-search` - Page type indicators
- `.is-mobile` - Mobile device detection

### 10. Edit Links
- Edit post links for authorized users
- Nonce verification for security
- Bootstrap button styling

### 11. Pagination
- Custom pagination function with Bootstrap styling
- Previous/Next links with icons
- Current page highlighting
- Responsive design

### 12. Tags & Categories
- Display post tags with badges
- Category display in archives
- Tag cloud in sidebar
- Tag filtering on search

### 13. Comments
- Custom comment display callback
- Comment form with Bootstrap styling
- Reply functionality
- Threaded comments support
- Comment moderation indicators

### 14. Blog Info
- Site title and description display
- Author information
- Publication date and time
- Comment counts

### 15. Custom Archive Page
- Dynamic archive titles
- Post type archives (Matches, Teams, Players)
- Taxonomy archive pages
- Author archive pages
- Date-based archives
- Filter controls for custom post types

### 16. 404 Page
- Custom 404 error template
- Recent articles suggestions
- Main site navigation links
- Search functionality
- Responsive design

### 17. Assets (CSS & JS)
- **style.css** - Main theme stylesheet with:
  - CSS variables for theming
  - Responsive design
  - Component styling
  - Print styles
  - Bootstrap 5 integration
  
- **js/main.js** - JavaScript functionality:
  - Mobile menu toggle
  - Smooth scrolling
  - Lazy image loading
  - Enhanced search
  - Form validation
  - Accessibility improvements

## Theme Structure

```
Champions League Elite Hub/
├── functions.php         # Theme functionality and setup
├── header.php            # Header template with navigation
├── index.php             # Main post loop template
├── footer.php            # Footer with widgets
├── sidebar.php           # Sidebar with widgets
├── search.php            # Search results template
├── archive.php           # Archive pages template
├── single.php            # Single post template
├── 404.php               # 404 error page
├── searchform.php        # Search form template
├── comments.php          # Comments template
├── template-home.php     # Custom home page template
├── style.css             # Main stylesheet
└── js/
    └── main.js           # Main JavaScript file
```

## Installation

1. Upload the theme folder to `wp-content/themes/`
2. Activate the theme in WordPress admin
3. Configure theme settings:
   - Set custom menus (Appearance > Menus)
   - Configure widgets (Appearance > Widgets)
   - Create post types and taxonomies (functions.php auto-setup)

## Usage

### Creating Custom Post Types

```php
// In WordPress admin:
1. Go to Champions League Elite Hub theme settings
2. Create new Matches, Teams, or Players
3. Assign taxonomies (Competition, Season, League, Position)
```

### Using Custom Menus

```php
// In WordPress admin:
1. Create menu (Appearance > Menus)
2. Assign to location (Primary Menu, Footer Menu, or Mobile Menu)
```

### Adding Widgets

```php
// In WordPress admin:
1. Go to Appearance > Widgets
2. Add widgets to "Primary Sidebar" or "Footer Widget Area"
```

### Custom Home Page

```php
// Assign the "Champions Home" template to your home page
// The template displays:
// - Featured matches
// - Top teams
// - Star players
// - Latest news
```

## Hooks & Filters

### Custom Hooks Available

- `after_setup_theme` - Theme setup (included)
- `wp_enqueue_scripts` - Asset loading (included)
- `pre_get_posts` - Query modification (included)

### Available Functions

```php
// Get theme option
champions_league_get_option($option, $default)

// Display pagination
champions_league_pagination()

// Display post meta
champions_league_post_meta()

// Get edit link for posts
champions_league_get_edit_link($post_id)

// Get blog info
champions_league_blog_info($show)

// Search form display (automatic via filter)
```

## Customization

### Modifying Colors

Edit `:root` variables in `style.css`:

```css
:root {
    --primary-color: #dc2626;       /* Main color */
    --secondary-color: #1e40af;     /* Secondary color */
    --accent-color: #f59e0b;        /* Accent color */
    --dark-bg: #111827;             /* Dark background */
    --light-bg: #f9fafb;            /* Light background */
}
```

### Adding Custom Widgets

Add to `functions.php`:

```php
register_sidebar(array(
    'name' => 'Custom Widget Area',
    'id' => 'custom-widget-area',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
));
```

### Creating Custom Post Types

The theme includes three custom post types. To add more:

```php
// In functions.php, use register_post_type()
register_post_type('custom_type', array(
    'labels' => array('name' => 'Custom Type'),
    'public' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
));
```

## Requirements

- PHP 7.4 or higher
- WordPress 5.9 or higher
- MySQL 5.7 or higher

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- IE 11+ (with fallbacks)

## Performance Optimization

The theme includes:
- Lazy loading for images
- Optimized CSS/JS loading
- Minified assets (recommended)
- Cache-friendly structure
- Mobile-first responsive design

## Accessibility

Features include:
- WCAG 2.1 AA compliance
- Semantic HTML structure
- Keyboard navigation support
- Screen reader optimization
- Skip links
- Proper heading hierarchy

## Security

Implements:
- Proper escaping (esc_html, esc_attr, etc.)
- Nonce verification
- Capability checks
- Sanitization of inputs
- Proper use of WordPress APIs

## Support & Resources

- WordPress Codex: https://developer.wordpress.org/
- Bootstrap 5: https://getbootstrap.com/
- Font Awesome: https://fontawesome.com/

## License

This theme is licensed under the GPL-2.0-or-later license. See LICENSE file for details.

## Changelog

### Version 1.0.0 (Initial Release)
- Complete WordPress theme with all requested features
- Bootstrap 5 integration
- Font Awesome icons
- Responsive design
- Custom post types and taxonomies
- Advanced widget system
- Comprehensive styling

## Author

WordPress Theme Development Team

---

**Built with WordPress ❤️**