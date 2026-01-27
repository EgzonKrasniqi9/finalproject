# Prison Break Elite Theme

A unique, dark, and dramatic WordPress theme designed specifically for TV series content, fan sites, and entertainment platforms. Built with all 20 advanced WordPress features for complete functionality.

## Overview

Prison Break Elite is a completely new and unique WordPress theme created from scratch, featuring a dark and professional aesthetic tailored for TV series content. Unlike typical blog themes, it includes specialized custom post types for Cast Members, Episodes, Seasons, and Quotes, along with powerful taxonomies for organizing content.

## Key Features

### ✅ All 20 WordPress Features Implemented

1. **CSS & JavaScript** - Custom stylesheets and interactive functionality
2. **Custom Menus** - 3 registered menu locations (Primary, Secondary, Footer)
3. **Post Loop** - Dynamic post retrieval with WP_Query
4. **Body Class** - Dynamic body classes for context-aware styling
5. **Page Templates** - Full-width page template with template naming
6. **Post Formats** - Support for video, audio, gallery, quote, and link formats
7. **Sidebar & Widgets** - 4 dynamic widget areas with full functionality
8. **WP_Query** - Custom query function for flexible post retrieval
9. **PHP Template Files** - 13 complete template files (header, footer, single, archive, etc.)
10. **Tags & Categories** - Full tag and category support with archives
11. **Edit Links** - Edit post links for administrators
12. **Search Form** - Custom styled search form with AJAX suggestions
13. **Search Results** - Dedicated search results page
14. **Pagination** - WP_Query pagination with helper function
15. **Blog Info** - Dynamic site information display
16. **Custom Archives** - Custom archive pages for all post types
17. **404 Error Page** - Custom error page with suggestions
18. **Custom Post Types** - 4 custom post types (Cast, Episodes, Seasons, Quotes)
19. **Custom Taxonomies** - 3 custom taxonomies (Character Role, Prison Location, Story Arc)
20. **Theme Support** - Full theme support declaration with post formats

### 🎨 Unique Design Features

- **Dark Theme**: Professional dark color scheme (dark blues, blacks, reds)
- **Prison Break Aesthetics**: Dramatic styling suitable for TV series content
- **Responsive Design**: Mobile-first approach with full tablet and desktop support
- **Smooth Animations**: Fade-in effects, hover states, and transitions
- **Typography**: Professional font hierarchy with excellent readability
- **Color Scheme**:
  - Primary: Dark backgrounds (#0a0e27, #1a1f3a)
  - Accent: Prison red (#d32f2f)
  - Text: Light gray (#e0e0e0)
  - Highlights: Cyan accents (#00d9cc)

### 📱 Responsive Breakpoints

- **Desktop**: Full multi-column layout (1200px+)
- **Tablet**: Adjusted sidebar (768px - 1024px)
- **Mobile**: Single column, hamburger menu (< 768px)

## File Structure

```
prison-break/
├── style.css              # Main theme stylesheet
├── functions.php          # Theme setup and functions (600+ lines)
├── header.php            # Header template
├── footer.php            # Footer template
├── index.php             # Main blog/posts template
├── single.php            # Single post template
├── archive.php           # Archive template
├── search.php            # Search results template
├── 404.php               # Error page
├── comments.php          # Comments template
├── sidebar.php           # Widget sidebar template
├── searchform.php        # Search form template
├── template-home.php     # Full-width page template
├── css/
│   └── custom.css        # Additional styles (400+ lines)
├── js/
│   └── main.js           # JavaScript functionality
└── README.md             # This file
```

## Installation & Setup

### 1. Upload Theme Files

```bash
# Extract theme files to:
wp-content/themes/prison-break/
```

### 2. Activate Theme

1. Go to WordPress Admin → Appearance → Themes
2. Find "Prison Break Elite"
3. Click "Activate"

### 3. Configure Theme Settings

#### Set Up Menus
1. Go to Appearance → Menus
2. Create new menu (e.g., "Main Menu")
3. Add pages and posts to menu
4. Assign to "Primary Menu" location

#### Configure Widgets
1. Go to Appearance → Widgets
2. Add widgets to:
   - Primary Sidebar
   - Footer Widget Areas (1, 2, 3)

#### Set Custom Logo
1. Go to Appearance → Customize
2. Click Site Identity
3. Upload logo (recommended size: 300x300px)

#### Configure Homepage
1. Go to Settings → Reading
2. Set static homepage (create a page first)
3. Select page as homepage

## Custom Post Types

### Cast Members
- **Purpose**: Showcase TV series cast and characters
- **Supports**: Title, Editor, Thumbnail, Excerpt
- **URL Slug**: `/cast/`
- **Taxonomy**: Character Role (Main, Supporting, Antagonist, Guest)

### Episodes
- **Purpose**: Document individual episodes
- **Supports**: Title, Editor, Thumbnail, Excerpt
- **URL Slug**: `/episodes/`
- **Taxonomy**: Prison Location, Story Arc

### Seasons
- **Purpose**: Organize episodes by season
- **Supports**: Title, Editor, Thumbnail, Excerpt
- **URL Slug**: `/seasons/`

### Quotes
- **Purpose**: Share memorable quotes from the series
- **Supports**: Title, Editor, Excerpt
- **URL Slug**: `/quotes/`
- **Taxonomy**: Story Arc

## Custom Taxonomies

### Character Role (Hierarchical)
- Main Character
- Supporting Character
- Antagonist
- Guest Star

### Prison Location (Hierarchical)
- Fox River
- Sona
- Gate
- Ogygia

### Story Arc (Hierarchical)
- Escape Planning
- Prison Life
- On the Run
- Final Redemption

## JavaScript Features

### Mobile Menu Toggle
- Hamburger menu on mobile/tablet
- Click to open/close
- Click outside to close
- ESC key to close

### Lazy Loading
- Deferred image loading for performance
- Intersection Observer API
- Fallback for older browsers

### Smooth Scrolling
- Anchor link smoothing
- Custom easing animation
- Offset for sticky header

### AJAX Search
- Real-time search suggestions
- Keyboard navigation
- Smooth appearance/disappearance

### Form Validation
- Required field checking
- Visual error indicators
- Real-time validation

### Back to Top Button
- Appears after scrolling 300px
- Smooth scroll to top
- Gradient styling

## CSS Classes

### Layout
- `.container` - Main content container (max 1200px)
- `.content-area` - Two-column layout wrapper
- `.primary-sidebar` - Sidebar area
- `.post-grid` - Grid layout for posts

### Posts
- `.post-card` - Individual post card
- `.post-image` - Featured image container
- `.post-content` - Post text content
- `.post-title` - Post title
- `.post-meta` - Date, author, category info
- `.post-excerpt` - Post excerpt
- `.read-more` - Read more button

### Navigation
- `.main-navigation` - Primary navigation
- `.menu-toggle` - Mobile menu button
- `.breadcrumb-section` - Breadcrumb navigation
- `.breadcrumb-container` - Breadcrumb wrapper

### Other
- `.widget` - Widget box
- `.site-footer` - Footer area
- `.error-404` - 404 error layout
- `.search-form` - Search form styling

## Template Tags Used

### Core WordPress Functions
- `wp_head()` - Head section scripts/styles
- `wp_body_open()` - Body opening tag
- `wp_footer()` - Footer scripts
- `get_header()` - Include header
- `get_footer()` - Include footer
- `get_sidebar()` - Include sidebar
- `have_posts()` - Loop check
- `the_post()` - Set up post data
- `the_title()` - Display post title
- `the_content()` - Display post content
- `the_permalink()` - Display post URL
- `the_excerpt()` - Display post excerpt
- `get_the_date()` - Display post date
- `the_author_posts_link()` - Display author link
- `the_post_thumbnail()` - Display featured image
- `the_tags()` - Display post tags
- `the_category()` - Display categories
- `edit_post_link()` - Display edit link
- `get_search_form()` - Display search form
- `get_search_query()` - Display search query
- `wp_list_categories()` - Display category list
- `comments_template()` - Include comments
- `get_comments_number()` - Display comment count
- `wp_link_pages()` - Display page links
- `previous_post_link()` - Previous post link
- `next_post_link()` - Next post link
- `body_class()` - Add body classes
- `post_class()` - Add post classes
- `dynamic_sidebar()` - Display widget area
- `is_active_sidebar()` - Check if widget area has widgets
- `wp_nav_menu()` - Display navigation menu
- `has_custom_logo()` - Check for custom logo
- `the_custom_logo()` - Display custom logo
- `is_home()` - Check if homepage
- `is_front_page()` - Check if front page
- `is_singular()` - Check if single post/page
- `is_archive()` - Check if archive page
- `is_search()` - Check if search page
- `is_404()` - Check if 404 page
- `is_category()` - Check if category page
- `is_tag()` - Check if tag page
- `is_post_type_archive()` - Check if post type archive
- `get_post_type()` - Get current post type
- `get_post_type_object()` - Get post type object
- `wp_insert_term()` - Create taxonomy term
- `term_exists()` - Check if term exists

## Customization Guide

### Change Color Scheme

Edit `css/custom.css`:

```css
:root {
    --primary-color: #d32f2f;      /* Change red */
    --secondary-color: #1a1f3a;    /* Change dark blue */
    --accent-color: #00d9cc;       /* Change cyan */
}
```

### Add New Custom Post Type

In `functions.php`, add:

```php
register_post_type('custom_type', array(
    'label' => 'Custom Type',
    'public' => true,
    'supports' => array('title', 'editor', 'thumbnail')
));
```

### Modify Widget Areas

In `functions.php` `prison_break_widgets_init()` function, register new sidebar:

```php
register_sidebar(array(
    'name' => 'My Widget Area',
    'id' => 'my-widget-area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
));
```

## Performance Tips

1. **Use Lazy Loading**: Enable lazy loading for images
2. **Optimize Images**: Use optimized image sizes
3. **Cache Content**: Use WordPress caching plugins
4. **Minify CSS/JS**: Minify custom CSS and JavaScript
5. **Use Featured Images**: Always add featured images
6. **Limit Excerpts**: Keep excerpts reasonable length
7. **Pagination**: Use pagination to limit posts per page

## Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Security Features

- ✅ Nonce verification for AJAX
- ✅ Sanitized output with esc_* functions
- ✅ Proper WordPress escaping
- ✅ SQL-safe queries with WP_Query
- ✅ User capability checks

## Accessibility

- ✅ WCAG 2.1 Level AA compliant
- ✅ Semantic HTML structure
- ✅ Keyboard navigation support
- ✅ Screen reader friendly
- ✅ Color contrast compliance
- ✅ Focus indicators on interactive elements

## Troubleshooting

### Posts Not Showing
- Check if theme is activated
- Verify custom post type is registered
- Check post publish status

### Menu Not Displaying
- Go to Appearance → Menus
- Create/assign menu to location
- Verify menu items are added

### Widgets Not Showing
- Check Appearance → Widgets
- Add widgets to correct sidebar
- Verify sidebar is displayed in template

### Images Not Showing
- Verify images are uploaded
- Check image file paths
- Use featured images

## Support & Documentation

For issues or questions:
1. Check WordPress documentation
2. Review theme code comments
3. Verify all settings are configured
4. Test in default WordPress theme first

## License

GPL v2 or later. See LICENSE file for details.

## Version History

### v1.0.0 (Initial Release)
- Complete theme with all 20 features
- Custom post types and taxonomies
- Responsive design
- Dark professional aesthetic
- Complete documentation

---

**Prison Break Elite Theme** - Professional WordPress Theme for TV Series Content
