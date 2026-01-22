# 🚀 Champions League Elite Hub - Quick Setup Guide

## ⚡ Quick Start (5 minutes)

### Step 1: Activate Theme
1. Go to WordPress Admin Dashboard
2. Navigate to **Appearance > Themes**
3. Find "Champions League Elite Hub"
4. Click **Activate**

### Step 2: Create Navigation Menu
1. Go to **Appearance > Menus**
2. Click **Create a new menu**
3. Name it "Main Menu"
4. Add pages/posts to the menu
5. Assign it to **Primary Menu** location
6. Click **Save Menu**

### Step 3: Create Home Page Template
1. Go to **Pages > Add New**
2. Title: "Home"
3. On the right sidebar, select **Template: Champions Home**
4. Click **Publish**

### Step 4: Set Home Page
1. Go to **Settings > Reading**
2. Select "A static page"
3. Set **Homepage** to the page you created
4. Click **Save Changes**

### Step 5: Create Custom Post Types Content
1. Go to **Matches > Add New Match**
   - Add title, content, featured image
   - Assign Competition and Season taxonomies
   - Publish

2. Go to **Teams > Add New Team**
   - Add team information
   - Assign League taxonomy
   - Publish

3. Go to **Players > Add New Player**
   - Add player information
   - Assign Position taxonomy
   - Publish

---

## 🎨 Customization Tips

### Change Theme Colors
Edit `style.css`:
```css
:root {
    --primary-color: #dc2626;       /* Change to your brand color */
    --secondary-color: #1e40af;     /* Change secondary color */
    --accent-color: #f59e0b;        /* Change accent color */
}
```

### Add Custom Widgets
1. Go to **Appearance > Widgets**
2. Select widget area (Primary Sidebar or Footer)
3. Add desired widgets
4. Configure widget settings
5. Save

### Create Custom Page Template
1. Copy `template-home.php`
2. Rename to `template-about.php`
3. Change `Template Name:` comment at top
4. Customize HTML
5. Upload to theme folder
6. Use in Pages > Page Attributes > Template

---

## 📝 Creating Content

### Blog Post
1. Go to **Posts > Add New**
2. Add title, content, featured image
3. Add categories and tags
4. Publish

### Match (Custom Post Type)
1. Go to **Matches > Add New Match**
2. Details:
   - Title: Team A vs Team B
   - Description: Match details
   - Featured Image: Match photo
   - Competition: Select from dropdown
   - Season: Select from dropdown
3. Publish

### Team (Custom Post Type)
1. Go to **Teams > Add New Team**
2. Details:
   - Title: Team Name
   - Description: Team info
   - Featured Image: Team logo
   - League: Select from dropdown
3. Publish

### Player (Custom Post Type)
1. Go to **Players > Add New Player**
2. Details:
   - Title: Player Name
   - Description: Bio
   - Featured Image: Player photo
   - Position: Select from dropdown
3. Publish

---

## 🔧 Advanced Configuration

### Add Custom Post Type Support
Edit `functions.php` and add:
```php
register_post_type('custom_type', array(
    'labels' => array('name' => 'Custom Type'),
    'public' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'custom'),
));
```

### Add Custom Sidebar
Edit `functions.php` and add:
```php
register_sidebar(array(
    'name' => 'Custom Sidebar',
    'id' => 'custom-sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));
```

### Custom Archive Filtering
Edit the filter form in `archive.php`:
```html
<!-- Add custom filter options -->
<select name="your_filter">
    <option>Filter Option</option>
</select>
```

---

## 🐛 Troubleshooting

### Menus Not Showing
- ✅ Check menu is assigned to theme location
- ✅ Verify menu has items added
- ✅ Clear browser cache

### Sidebar Not Displaying
- ✅ Add widgets to primary sidebar
- ✅ Check sidebar.php is called in template
- ✅ Verify is_active_sidebar() condition

### Custom Post Types Not Appearing
- ✅ Go to Settings > Permalinks
- ✅ Click "Save Changes" to flush rewrite rules
- ✅ Check post type is registered in functions.php

### Images Not Showing
- ✅ Set featured image on posts/pages
- ✅ Check image files exist in media library
- ✅ Verify has_post_thumbnail() in template

### Styles Not Loading
- ✅ Clear browser cache (Ctrl+Shift+Delete)
- ✅ Check style.css exists in theme folder
- ✅ Verify WordPress is enqueuing styles

---

## 📱 Responsive Testing

Test on different devices:
- Desktop (1200px+)
- Tablet (768px - 1200px)
- Mobile (< 768px)

Use Chrome DevTools:
1. Press F12
2. Click device toggle (mobile icon)
3. Select device type

---

## 🔐 Security Checklist

- ✅ Theme uses proper escaping functions
- ✅ Nonce verification implemented
- ✅ Capability checks in place
- ✅ Sanitization of inputs
- ✅ wp_kses for markup filtering

---

## 📊 Theme Features Checklist

- ✅ Custom Post Types (Match, Team, Player)
- ✅ Custom Taxonomies (Competition, Season, League, Position)
- ✅ Custom Menus (Primary, Footer, Mobile)
- ✅ Widgets & Sidebar
- ✅ Post Loop & Pagination
- ✅ Search & Search Results
- ✅ Archive Pages
- ✅ 404 Error Page
- ✅ Comments & Comment Form
- ✅ Page Templates
- ✅ Responsive Design
- ✅ Bootstrap 5 Integration
- ✅ Font Awesome Icons

---

## 📚 Documentation Files

- **README.md** - Complete feature documentation
- **PROJECT_SUMMARY.md** - Project overview and statistics
- **SETUP_GUIDE.md** - This file

---

## 🆘 Need Help?

1. Check README.md for detailed documentation
2. Review functions.php comments
3. Check WordPress Codex: https://developer.wordpress.org/
4. Bootstrap 5 Docs: https://getbootstrap.com/
5. Font Awesome: https://fontawesome.com/

---

## 🎉 You're All Set!

Your Champions League Elite Hub theme is ready to use. Start creating amazing football content!

**Happy Blogging! ⚽**