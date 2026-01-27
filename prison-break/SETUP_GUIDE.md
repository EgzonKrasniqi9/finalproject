# Prison Break Elite Theme - Complete Setup Guide

## Prerequisites

- WordPress 5.0+ (installed and running)
- PHP 7.2+
- Active WordPress admin account

## Installation Steps

### 1. Upload Theme Files

**Option A: Using FTP**
1. Connect to your server via FTP
2. Navigate to `/wp-content/themes/`
3. Upload the `prison-break` folder

**Option B: Manual Upload via Admin**
1. Log in to WordPress Admin
2. Go to **Appearance → Themes**
3. Click **"Add New"**
4. Click **"Upload Theme"**
5. Select the theme ZIP file
6. Click **"Install Now"**

### 2. Activate Theme

1. Go to **Appearance → Themes**
2. Look for **"Prison Break Elite"**
3. Click **"Activate"**

You should see the theme applied to your site immediately.

## Initial Configuration

### Step 1: Set Site Title & Tagline
1. Go to **Settings → General**
2. Enter your site title (e.g., "Prison Break Fan Site")
3. Enter your tagline (e.g., "The Ultimate Authority")
4. Click **"Save Changes"**

### Step 2: Set Up Navigation Menu

#### Create Primary Menu
1. Go to **Appearance → Menus**
2. Click **"Create a new menu"**
3. Name it "Main Menu"
4. Click **"Create Menu"**

#### Add Menu Items
1. Under "Add items to menu", select items from:
   - **Pages** (recommended: Home, About, Contact)
   - **Posts**
   - **Custom Links**
   
2. Click checkboxes to add items
3. Click **"Add to Menu"**
4. Drag to reorder items
5. Click **"Save Menu"**

#### Assign Menu Location
1. Go to **"Display location"** section
2. Check **"Primary Menu"**
3. Click **"Save Menu"**

### Step 3: Add Custom Logo

1. Go to **Appearance → Customize**
2. Click **"Site Identity"**
3. In "Logo" section, click **"Select Logo"**
4. Upload your logo image (recommended: 300x300px, PNG or SVG)
5. Click **"Publish"**

### Step 4: Set Homepage

#### Create Homepage
1. Go to **Pages → Add New**
2. Title: "Home"
3. Add content (or leave blank for default)
4. Publish

#### Set as Homepage
1. Go to **Settings → Reading**
2. Select **"A static page"** (if not already selected)
3. Set "Homepage" to your newly created page
4. Click **"Save Changes"**

### Step 5: Create Widget Areas

#### Add Widgets to Sidebar
1. Go to **Appearance → Widgets**
2. Expand **"Primary Sidebar"**
3. Add widgets:
   - **Search** (recommended)
   - **Recent Posts**
   - **Categories**
4. Click **"Add Widget"** for each
5. Configure widget settings
6. Click **"Save"**

#### Add Footer Widgets
1. Expand **"Footer Widget 1"**, **"Footer Widget 2"**, **"Footer Widget 3"**
2. Add widgets to each (optional)
3. Examples:
   - Footer 1: Site info, Contact info
   - Footer 2: Quick links, Categories
   - Footer 3: Popular posts, Archive

### Step 6: Configure Permalinks (Recommended)

1. Go to **Settings → Permalinks**
2. Select **"Post name"** (recommended)
3. Click **"Save Changes"**

This makes URLs like `/episodes/my-episode/` instead of `/?p=123`

## Content Creation

### Create Your First Post

1. Go to **Posts → Add New**
2. Fill in:
   - **Title** - Post headline
   - **Content** - Post body
   - **Featured Image** - Thumbnail image
   - **Excerpt** - Short summary (optional)
   - **Categories** - Topic categorization
   - **Tags** - Additional keywords
3. Click **"Publish"**

### Create a Cast Member (Custom Post Type)

1. Go to **Cast Members** (left sidebar)
2. Click **"Add New"**
3. Fill in:
   - **Title** - Actor name
   - **Content** - Biography and character info
   - **Featured Image** - Actor photo
   - **Excerpt** - Short bio
   - **Character Role** - Select from list (Main Character, Supporting, etc.)
4. Click **"Publish"**

The cast member will appear at `/cast/actor-name/`

### Create an Episode

1. Go to **Episodes**
2. Click **"Add New"**
3. Fill in:
   - **Title** - Episode name
   - **Content** - Episode description
   - **Featured Image** - Episode still
   - **Excerpt** - Episode summary
   - **Prison Location** - Select prison (Fox River, Sona, etc.)
   - **Story Arc** - Select story arc
4. Click **"Publish"**

The episode will appear at `/episodes/episode-name/`

### Create a Season

1. Go to **Seasons**
2. Click **"Add New"**
3. Fill in season details
4. Click **"Publish"**

Available at `/seasons/season-name/`

### Create a Quote

1. Go to **Quotes**
2. Click **"Add New"**
3. Fill in:
   - **Title** - Who said it
   - **Content** - The actual quote
   - **Story Arc** - Which story arc
4. Click **"Publish"**

Available at `/quotes/quote-title/`

## Customization

### Change Homepage Layout

The homepage uses the same loop as the blog. To customize:

1. Create a new page
2. Use **"Full Width Page"** template for full-width display
3. Set as homepage in Settings → Reading

### Customize Colors

Edit `prison-break/css/custom.css`:

```css
/* Find this section at the top: */
:root {
    --primary-color: #d32f2f;      /* Change this red */
    --secondary-color: #1a1f3a;    /* Change this dark blue */
    --accent-color: #00d9cc;       /* Change this cyan */
}
```

### Change Font

Edit `prison-break/css/custom.css`, find `body` selector:

```css
body {
    font-family: 'Your Font', sans-serif;
}
```

### Add Custom CSS

Method 1: Edit custom.css file directly
```
prison-break/css/custom.css
```

Method 2: Use WordPress Customizer
1. Go to **Appearance → Customize**
2. Scroll to **"Additional CSS"**
3. Add your custom CSS
4. Click **"Publish"**

### Modify Header/Footer

Edit template files:
- `prison-break/header.php` - Header HTML
- `prison-break/footer.php` - Footer HTML

## Advanced Configuration

### Register New Widget Area

Edit `prison-break/functions.php`, find `prison_break_widgets_init()`:

```php
register_sidebar(array(
    'name' => esc_html__('My New Widget Area', 'prison-break'),
    'id' => 'my-widget-area',
    'description' => esc_html__('Description', 'prison-break'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
));
```

### Add New Menu Location

Edit `prison-break/functions.php`, find `prison_break_menus()`:

```php
register_nav_menus(array(
    'primary-menu' => esc_html__('Primary Menu', 'prison-break'),
    'my-new-menu' => esc_html__('My New Menu', 'prison-break')
));
```

### Add Custom Taxonomy Term

In WordPress admin:
1. Go to **Cast Members → Character Role** (or any taxonomy)
2. Click **"Add New"**
3. Enter name, slug, description
4. Click **"Add New"**

## Performance Tips

### 1. Optimize Images
- Use appropriate image sizes
- Compress before uploading
- Use modern formats (WebP)

### 2. Enable Caching
- Use caching plugin (WP Super Cache, W3 Total Cache)
- Set expires headers on images
- Minify CSS and JavaScript

### 3. Use Excerpts
- Write summaries for posts
- Limit homepage to show excerpts only
- Reduces page size

### 4. Pagination
- Go to **Settings → Reading**
- Set "Posts per page" to 10-15
- Reduces initial page load

### 5. Image Sizes
- Use featured images consistently
- Set featured image size in admin
- Avoid very large file sizes

## Troubleshooting

### Theme Not Activating
- Clear WordPress cache
- Check PHP version (must be 7.2+)
- Check file permissions
- Verify no theme conflicts

### Custom Post Types Not Showing
- Go to Settings → Permalinks
- Click "Save Changes" to reset rewrite rules
- Check post status (must be Published)

### Menu Not Displaying
- Verify menu is created
- Assign to correct menu location
- Check template has `wp_nav_menu()`

### Widgets Not Showing
- Add widgets in Appearance → Widgets
- Ensure widget area is in template
- Check widget visibility settings

### Search Not Working
- Verify search form is in template
- Check WordPress search settings
- Clear permalinks (Settings → Permalinks)

### Images Not Showing
- Verify image uploaded to media library
- Use featured image function
- Check file paths
- Verify image permissions

## Backup & Maintenance

### Regular Backups
- Backup database regularly
- Backup theme files
- Use backup plugin (BackWPup, UpdraftPlus)

### Keep WordPress Updated
- Update WordPress core
- Update plugins
- Update themes

### Monitor Performance
- Use tools like GTmetrix
- Monitor site speed
- Check error logs

## Next Steps

1. **Read Full Documentation** - See [README.md](README.md)
2. **Explore Quick Start** - See [QUICK_START.md](QUICK_START.md)
3. **Create Content** - Add posts and custom post type content
4. **Customize** - Change colors and layouts
5. **Promote** - Share your site!

---

**Your Prison Break Elite Theme is now ready to use!**

For additional help, refer to the [README.md](README.md) file.
