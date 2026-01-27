# 🏄‍♂️ Extreme Sports Elite - Quick Reference Guide

## Installation (2 minutes)

1. Activate theme: **Admin → Appearance → Themes → Activate**
2. Configure: **Admin → Appearance → Customize**
3. Add menus: **Admin → Appearance → Menus**
4. Add widgets: **Admin → Appearance → Widgets**
5. Create content: **Admin → Posts/Athletes/Events** etc.

---

## Theme Files

### Templates (PHP)
- `header.php` - Site header & nav
- `footer.php` - Site footer
- `index.php` - Blog posts
- `single.php` - Single post
- `archive.php` - Archives
- `search.php` - Search results
- `404.php` - Error page
- `comments.php` - Comments
- `searchform.php` - Search form
- `sidebar.php` - Sidebar
- `template-home.php` - Full-width page

### Styles (CSS)
- `style.css` - Main stylesheet
- `css/custom.css` - Custom styles

### Scripts (JavaScript)
- `js/main.js` - Functionality

### Configuration (PHP)
- `functions.php` - Theme setup

---

## Custom Post Types

### Athletes
- Path: **Posts → Athletes**
- Archive: `/athletes/`
- Taxonomy: Level (Beginner, Intermediate, Pro)

### Events
- Path: **Posts → Events**
- Archive: `/events/`
- Taxonomy: Event Type (Competition, Training, Exhibition)

### Gear
- Path: **Posts → Gear**
- Archive: `/gear/`
- Taxonomy: Gear Type (Clothing, Equipment, Safety)

### Videos
- Path: **Posts → Videos**
- Archive: `/videos/`
- Taxonomy: Available

---

## Menus

### Primary Menu
**Admin → Appearance → Menus**
1. Create menu
2. Add pages/links
3. Assign to **Primary Menu** location

### Footer Menu
1. Create separate menu
2. Assign to **Footer Menu** location

---

## Widgets

### Primary Sidebar
- Used on: Blog, archive, search pages
- Add: **Admin → Appearance → Widgets**

### Footer Widgets
- **Footer Widget 1** - Left footer
- **Footer Widget 2** - Center footer
- **Footer Widget 3** - Right footer

---

## Customization

### Change Colors
**File:** `style.css` Lines 1-10
```css
:root {
    --primary-color: #ff6b35;      /* Change this */
    --secondary-color: #004e89;    /* Change this */
    --accent-color: #f7931e;       /* Change this */
}
```

### Add Custom CSS
**File:** `css/custom.css`
Add your CSS at the end of the file

### Customize Functions
**File:** `functions.php`
Modify theme functions as needed

---

## WordPress Features

### Theme Support
✅ Title tags  
✅ Post thumbnails  
✅ Custom logo  
✅ HTML5 markup  
✅ Post formats  

### Menus (3)
✅ Primary  
✅ Secondary  
✅ Footer  

### Post Formats (6)
✅ Video  
✅ Audio  
✅ Gallery  
✅ Quote  
✅ Link  
✅ Standard  

### Widget Areas (4)
✅ Primary Sidebar  
✅ Footer 1  
✅ Footer 2  
✅ Footer 3  

---

## Content Creation

### Create a Post
1. **Posts → Add New**
2. Title + Content
3. Featured image
4. Category + Tags
5. Publish

### Create an Athlete
1. **Athletes → Add New**
2. Athlete info
3. Featured image
4. Level taxonomy
5. Publish

### Create an Event
1. **Events → Add New**
2. Event details
3. Featured image
4. Event type
5. Publish

### Create Gear
1. **Gear → Add New**
2. Gear description
3. Featured image
4. Gear type
5. Publish

### Create Video
1. **Videos → Add New**
2. Video title + description
3. Upload/embed video
4. Featured image
5. Publish

---

## Page Templates

### Full Width Page Template
1. Create page
2. Right sidebar: **Template → Full Width Page**
3. Save/publish

---

## JavaScript Features

### Mobile Menu
- Click menu button to toggle
- Auto-closes on link click
- Responsive behavior

### Smooth Scroll
- Click anchor links
- Smooth animation
- Offset for header

### Lazy Loading
- Images load on scroll
- Performance improvement
- Automatic

### Search Validation
- Prevents empty search
- Visual feedback
- Helpful messages

### AJAX Load More
- Dynamic post loading
- Pagination support
- Error handling

---

## CSS Components

### Colors
```css
Primary: #ff6b35 (Orange)
Secondary: #004e89 (Dark Blue)
Accent: #f7931e (Golden)
Dark: #1a1a1a
Light: #ffffff
```

### Breakpoints
```css
Mobile: < 768px
Desktop: ≥ 768px
```

### Components
- Header & Navigation
- Post Cards
- Sidebar
- Comments
- Forms
- Buttons
- Pagination
- Footer

---

## Tips & Tricks

### SEO
- Use featured images
- Write good excerpts
- Use categories/tags
- Add meta descriptions

### Performance
- Optimize images
- Use excerpts
- Enable caching
- Minimize plugins

### Content
- Update regularly
- Use post formats
- Link internally
- Engage comments

### Design
- Use featured images consistently
- Create a visual style
- Organize with categories
- Use tags for filtering

---

## Troubleshooting

### Menu Not Showing
- Create menu in **Appearance → Menus**
- Assign to menu location
- Check primary menu location

### Widgets Not Visible
- Add widgets in **Appearance → Widgets**
- Select correct sidebar
- Ensure sidebar has display area

### Posts Not Showing
- Check post status (published)
- Verify date/visibility
- Check reading settings

### Colors Not Changing
- Edit `style.css` CSS variables
- Or use `css/custom.css` for overrides
- Clear browser cache

### Mobile Menu Not Working
- Check JavaScript enabled
- Verify `js/main.js` loaded
- Check console for errors

---

## File Locations

```
extreme-sport/
├── style.css                 ← Main CSS
├── functions.php             ← Theme config
├── header.php                ← Header
├── footer.php                ← Footer
├── index.php                 ← Posts
├── single.php                ← Single post
├── archive.php               ← Archives
├── search.php                ← Search
├── 404.php                   ← Error
├── comments.php              ← Comments
├── searchform.php            ← Search form
├── sidebar.php               ← Sidebar
├── template-home.php         ← Page template
├── css/custom.css            ← Custom CSS
├── js/main.js                ← JavaScript
└── [docs files]              ← Documentation
```

---

## Documentation

- **README.md** - Complete documentation
- **SETUP_GUIDE.md** - Setup instructions
- **FEATURES.md** - Feature details
- **INDEX.md** - Project index
- **COMPLETION_REPORT.md** - Completion report

---

## Support Resources

- [WordPress.org](https://wordpress.org)
- [WordPress Codex](https://codex.wordpress.org)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Plugin API](https://developer.wordpress.org/plugins/)

---

## Quick Commands

### WordPress Admin URLs
```
Dashboard: /wp-admin/
Posts: /wp-admin/edit.php
Pages: /wp-admin/edit.php?post_type=page
Athletes: /wp-admin/edit.php?post_type=athletes
Events: /wp-admin/edit.php?post_type=events
Gear: /wp-admin/edit.php?post_type=gear
Videos: /wp-admin/edit.php?post_type=videos
Menus: /wp-admin/nav-menus.php
Widgets: /wp-admin/widgets.php
Customize: /wp-admin/customize.php
```

---

## Keyboard Shortcuts

### WordPress
- **Alt + Shift + N** - New post
- **Alt + Shift + E** - Edit
- **Alt + Shift + P** - Publish

### Browser
- **Ctrl + Shift + I** - DevTools
- **Ctrl + Shift + C** - Element inspector
- **F12** - Developer tools

---

## Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Theme not showing | Activate in Themes |
| Menu missing | Create in Menus |
| Widgets not visible | Add in Widgets |
| Images broken | Check permissions |
| Search not working | Check rewrite rules |
| Mobile menu failing | Check JavaScript |
| Colors not changing | Clear cache |
| Posts not showing | Check status |

---

## Best Practices

✅ Regular backups  
✅ Keep WordPress updated  
✅ Use strong passwords  
✅ Optimize images  
✅ Enable HTTPS  
✅ Monitor performance  
✅ Update content regularly  
✅ Engage with comments  
✅ Use proper categories  
✅ Tag consistently  

---

## What's Next?

1. ✅ Activate theme
2. ✅ Configure basic settings
3. ✅ Create menus
4. ✅ Add widgets
5. ✅ Create content
6. ✅ Customize design
7. ✅ Optimize performance
8. ✅ Launch site!

---

## Theme Info

**Name:** Extreme Sports Elite  
**Version:** 1.0.0  
**Type:** WordPress Theme  
**License:** GPL v2 or later  
**Requires:** WordPress 5.0+, PHP 7.4+  
**Status:** ✅ Production Ready  

---

## Support

For detailed documentation, see:
- README.md - Full documentation
- SETUP_GUIDE.md - Setup instructions
- FEATURES.md - Complete features

---

**🏄‍♂️ Happy Extreme Sports Blogging! ⛷️🚴‍♂️🪂**

---

*Last Updated: January 27, 2026*
*Quick Reference Guide v1.0*
