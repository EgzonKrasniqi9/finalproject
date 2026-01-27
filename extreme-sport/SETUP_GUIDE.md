# Extreme Sports Elite Theme - Setup Guide

## Quick Start

### Step 1: Activate the Theme
1. Go to WordPress Admin Dashboard
2. Navigate to **Appearance → Themes**
3. Find **Extreme Sports Elite** theme
4. Click **Activate**

### Step 2: Configure Site Settings
1. Go to **Settings → General**
2. Set your **Site Title** and **Tagline**
3. Set **Site URL** and **WordPress URL**

### Step 3: Create Menus
1. Go to **Appearance → Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add pages and links to the menu
4. Under **Display location**, check **Primary Menu**
5. Create another menu for **Footer Menu** (optional)
6. Click **Create Menu**

### Step 4: Set Up Widgets
1. Go to **Appearance → Widgets**
2. Add widgets to **Primary Sidebar** (appears on blog pages)
3. Add widgets to footer areas:
   - **Footer Widget 1**
   - **Footer Widget 2**
   - **Footer Widget 3**

### Step 5: Configure Homepage
1. Create a page called "Home"
2. Go to **Settings → Reading**
3. Under "Front page displays", select **A static page**
4. Set **Front page** to your "Home" page
5. Set **Posts page** to a "Blog" page (create if needed)

### Step 6: Create Content

#### Create Regular Posts
1. Go to **Posts → Add New**
2. Fill in title, content, featured image
3. Assign category and tags
4. Click **Publish**

#### Create Athletes
1. Go to **Athletes → Add New**
2. Fill in athlete information
3. Upload featured image
4. Assign to **Level** taxonomy (Beginner, Intermediate, Professional)
5. Assign to **Sport Categories**
6. Click **Publish**

#### Create Events
1. Go to **Events → Add New**
2. Fill in event details
3. Upload event image
4. Assign to **Event Type** (Competition, Training, Exhibition)
5. Click **Publish**

#### Create Gear/Equipment
1. Go to **Gear → Add New**
2. Add gear description and specifications
3. Upload gear images
4. Assign to **Gear Type**
5. Click **Publish**

#### Create Videos
1. Go to **Videos → Add New**
2. Add video title and description
3. Upload or embed video
4. Click **Publish**

### Step 7: Customize Theme

#### Change Theme Colors
1. Go to **Appearance → Customize**
2. Look for color options (if available)
3. Or edit `css/custom.css` manually

#### Add Custom Logo
1. Go to **Appearance → Customize**
2. Click **Site Identity**
3. Upload your logo
4. Click **Publish**

#### Customize Homepage Banner
Edit `header.php` and modify the hero section colors and text.

## WordPress Features Configuration

### Post Formats
Posts support these formats:
- Video
- Audio
- Gallery
- Quote
- Link
- Standard (default)

To set a post format:
1. Edit a post
2. In right panel, find **Format**
3. Select desired format
4. Update post

### Categories & Tags
- **Categories** - Hierarchical organization
- **Tags** - Non-hierarchical keywords

Use these on regular posts to organize content.

### Custom Taxonomies
- **Sport Categories** - Organize by sport type
- **Athlete Level** - Organize athletes by skill
- **Event Type** - Organize events by type
- **Gear Type** - Organize gear by equipment type

### Post Meta Display
Each post displays:
- Publication date
- Author name
- Categories
- Tags
- Reading time estimate

## Navigation Structure

### Primary Navigation
Shows in header with links to:
- Home
- Athletes
- Events
- Gear
- Videos
- Blog (optional)

### Footer Navigation
Shows in footer with additional useful links

### Breadcrumbs
Shows on all pages except homepage for navigation context

## Search & Filtering

### Using Search
1. Use search form in header or sidebar
2. Enter search terms
3. View results with matching posts

### Using Categories
1. Click on category link
2. View all posts in that category
3. Use sidebar widgets to browse categories

### Using Tags
1. Click on tag link
2. View all posts with that tag
3. Cloud widget shows popular tags

## Comments Management

### Enable/Disable Comments
1. Edit post/page
2. Scroll down to **Discussion**
3. Check/uncheck **Allow comments**

### Moderate Comments
1. Go to **Comments**
2. Review pending comments
3. Approve, spam, or delete as needed

## Performance Tips

1. **Use Featured Images** - Improves appearance and SEO
2. **Optimize Images** - Use image compression plugins
3. **Use Excerpts** - Manually write excerpts for better UX
4. **Enable Caching** - Use caching plugins for faster load times
5. **Clean Database** - Remove spam comments and unused content

## Security Best Practices

1. **Keep WordPress Updated** - Always update to latest version
2. **Use Strong Passwords** - Create strong admin passwords
3. **Limit Login Attempts** - Install security plugins
4. **Regular Backups** - Backup your site regularly
5. **Use HTTPS** - Ensure your site uses SSL/HTTPS

## Troubleshooting

### Posts Not Showing
- Check if published and set to public
- Verify category/tag assignments
- Check reading settings (posts per page)

### Theme Not Activated
- Ensure all theme files uploaded correctly
- Check file permissions (755 for folders, 644 for files)
- Try re-uploading theme

### Widgets Not Showing
- Ensure sidebar is registered in active theme
- Check if widget area is empty or has display issues
- Try deactivating plugins to test

### Images Not Uploading
- Check WordPress media folder permissions
- Verify PHP upload size limits
- Check server disk space

## Custom Code Examples

### Query All Athletes
```php
<?php
$athletes = extreme_sports_get_posts('athletes', 10);

if ($athletes->have_posts()) {
    while ($athletes->have_posts()) {
        $athletes->the_post();
        echo '<h3>' . get_the_title() . '</h3>';
        the_excerpt();
    }
}
wp_reset_postdata();
?>
```

### Display Recent Events
```php
<?php
$events = new WP_Query(array(
    'post_type' => 'events',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
));

while ($events->have_posts()) {
    $events->the_post();
    the_title();
    the_excerpt();
}
wp_reset_postdata();
?>
```

### Get Posts by Sport Category
```php
<?php
$extreme_posts = extreme_sports_get_posts_by_category('skateboarding', 10);

if ($extreme_posts->have_posts()) {
    while ($extreme_posts->have_posts()) {
        $extreme_posts->the_post();
        // Display post
    }
}
wp_reset_postdata();
?>
```

## Next Steps

1. Create your first post or custom post type entry
2. Set up navigation menus
3. Add sidebar widgets
4. Customize colors and styles
5. Start building your extreme sports community!

## Support Resources

- [WordPress.org Theme Support](https://wordpress.org/support/forums/)
- [WordPress Theme Development Handbook](https://developer.wordpress.org/themes/)
- [WordPress Codex](https://codex.wordpress.org/)

## Theme Information

- **Theme Name:** Extreme Sports Elite
- **Version:** 1.0.0
- **Author:** Theme Developer
- **License:** GPL v2 or later

---

Happy building! Enjoy creating your extreme sports content with this theme! 🏄‍♂️⛷️🚴‍♂️🪂
