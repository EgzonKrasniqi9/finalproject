# Prison Break Elite Theme - Quick Start Guide

## 🚀 Get Started in 5 Minutes

### Step 1: Activate the Theme
1. Log in to WordPress Admin
2. Go to **Appearance → Themes**
3. Find **"Prison Break Elite"**
4. Click **"Activate"**

### Step 2: Create a Menu
1. Go to **Appearance → Menus**
2. Click **"Create a new menu"**
3. Name it "Main Menu"
4. Add your pages/posts to the menu
5. Set it to display in **Primary Menu** location
6. Click **"Save Menu"**

### Step 3: Add a Logo (Optional)
1. Go to **Appearance → Customize**
2. Click **"Site Identity"**
3. Upload your logo (300x300px recommended)
4. Click **"Publish"**

### Step 4: Configure Homepage
1. Go to **Settings → Reading**
2. Select **"A static page"**
3. Create a new page first if needed
4. Set it as your **"Homepage"**
5. Click **"Save Changes"**

### Step 5: Start Adding Content

#### Add a Cast Member
1. Go to **Cast Members** (new menu item)
2. Click **"Add New Cast Member"**
3. Fill in:
   - Title (actor name)
   - Content (biography)
   - Featured Image
   - Character Role (taxonomy)
4. Click **"Publish"**

#### Add an Episode
1. Go to **Episodes**
2. Click **"Add New Episode"**
3. Fill in:
   - Title (episode name)
   - Content (episode description)
   - Featured Image
   - Prison Location (taxonomy)
   - Story Arc (taxonomy)
4. Click **"Publish"**

#### Add a Season
1. Go to **Seasons**
2. Click **"Add New Season"**
3. Fill in season information
4. Click **"Publish"**

#### Add a Quote
1. Go to **Quotes**
2. Click **"Add New Quote"**
3. Fill in:
   - Title (who said it)
   - Content (the quote)
   - Story Arc (taxonomy)
4. Click **"Publish"**

## 📋 What Each Post Type Does

| Type | Purpose | Archive URL |
|------|---------|------------|
| Cast | Actors and characters | /cast/ |
| Episodes | Individual episodes | /episodes/ |
| Seasons | Season collections | /seasons/ |
| Quotes | Memorable quotes | /quotes/ |
| Posts | Blog articles | /blog/ |

## 🎨 Theme Features

✅ **Responsive Design** - Works on all devices  
✅ **Dark Theme** - Professional dark aesthetics  
✅ **4 Custom Post Types** - Specialized content  
✅ **3 Custom Taxonomies** - Organized categories  
✅ **Mobile Menu** - Hamburger menu on mobile  
✅ **Search** - Built-in search functionality  
✅ **Comments** - Reader discussion  
✅ **Widgets** - Customizable sidebars  
✅ **AJAX Features** - Fast search suggestions  

## 🎯 Common Tasks

### Add a Widget
1. Go to **Appearance → Widgets**
2. Drag widget to desired sidebar
3. Configure widget settings
4. Click **"Save"**

### Change Colors
Edit `css/custom.css` and update these colors:
```css
--primary-color: #d32f2f;      /* Red */
--secondary-color: #1a1f3a;    /* Dark blue */
--accent-color: #00d9cc;       /* Cyan */
```

### Create a Full-Width Page
1. Create a new page
2. Select **"Full Width Page"** template
3. Add your content
4. Publish

### Add Featured Image
1. While editing post/page
2. Click **"Set featured image"**
3. Upload or select image
4. Click **"Set featured image"** button

### Add to Navigation Menu
1. Go to **Appearance → Menus**
2. Click on your menu name
3. Add new items:
   - **Pages** - Add WordPress pages
   - **Posts** - Add blog posts
   - **Custom Links** - Add external links
   - **Categories** - Add category archives
4. Click **"Save Menu"**

## 🔧 Customization

### Change Theme Colors
Edit `prison-break/css/custom.css` line 1-5:
```css
:root {
    --primary-color: #YOUR_RED;
    --secondary-color: #YOUR_DARK;
    --accent-color: #YOUR_ACCENT;
}
```

### Modify Post Grid
In `css/custom.css`, find `.post-grid`:
```css
.post-grid {
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
}
```
Change `300px` to wider/narrower for different sizes.

### Add Custom Taxonomy Terms
In `functions.php`, in `prison_break_create_default_categories()`:
```php
$my_terms = array(
    'slug' => 'Display Name',
    'slug2' => 'Another Name'
);
```

## 📱 Mobile Responsive

The theme automatically adjusts for:
- **Desktop** (1200px+) - Full 2-column layout
- **Tablet** (768px-1024px) - Adjusted columns
- **Mobile** (<768px) - Single column, hamburger menu

## ⌨️ Keyboard Navigation

- **Tab** - Navigate between elements
- **Enter** - Activate links/buttons
- **Esc** - Close mobile menu

## 🔍 Built-in Search

- Use the search form in sidebar or header
- Search results show matching posts
- AJAX suggestions as you type (if enabled)

## 📞 Need Help?

### Check Documentation
- [Full README](README.md)
- [WordPress Docs](https://developer.wordpress.org/)

### Common Issues

**Theme not showing?**
- Make sure theme is Activated
- Refresh WordPress (Settings → General)

**Posts not displaying?**
- Check post is published (not draft)
- Verify post type is enabled
- Check category/tag assignment

**Menu not showing?**
- Create menu in Appearance → Menus
- Assign to correct menu location
- Add items to menu

**Images not displaying?**
- Check image upload to media library
- Use set featured image button
- Verify image dimensions

---

## 📊 Theme Statistics

- **13 Template Files** - Complete page layouts
- **4 Custom Post Types** - Flexible content
- **3 Custom Taxonomies** - Smart organization
- **4 Widget Areas** - Dynamic sidebars
- **3 Navigation Menus** - Multiple menus
- **400+ Lines of CSS** - Professional styling
- **300+ Lines of JavaScript** - Interactive features
- **600+ Lines of PHP** - Full functionality

---

**Now you're ready to go!** Create your first piece of content and see the theme in action.

For detailed documentation, see [README.md](README.md)
