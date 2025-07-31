# WhiskyTaste Pro - Activation Checklist

Use this checklist to ensure all components are properly activated and configured after installation.

## Pre-Activation Requirements

- [ ] MySQL/MariaDB is running
- [ ] Database `whiskytaste_pro` exists
- [ ] Database user `wtp_user` has proper permissions
- [ ] Web server (Apache/Nginx) is running
- [ ] PHP 8.0+ is installed and configured

## WordPress Installation

- [ ] Access site URL (e.g., http://localhost/whiskytaste-pro)
- [ ] Complete WordPress installation wizard
- [ ] Set admin username (avoid 'admin')
- [ ] Use strong password
- [ ] Set correct timezone

## Theme Activation

1. **Activate Parent Theme**
   - [ ] Log into WordPress Admin
   - [ ] Go to Appearance > Themes
   - [ ] Verify Astra theme is installed
   - [ ] DO NOT activate Astra (we'll use the child theme)

2. **Activate Child Theme**
   - [ ] Find "WhiskyTaste Pro Child Theme"
   - [ ] Click "Activate"
   - [ ] Verify activation successful
   - [ ] Check site frontend displays correctly

## Essential Plugin Installation

### Free Plugins (via Plugins > Add New)

- [ ] **Elementor** - Page builder
  - Search and install
  - Activate plugin
  - Skip setup wizard for now

- [ ] **WPForms Lite** - Contact forms
  - Search and install
  - Activate plugin
  - Complete setup wizard

- [ ] **Yoast SEO** - Search optimization
  - Search and install
  - Activate plugin
  - Run configuration wizard

- [ ] **Wordfence Security** - Security
  - Search and install
  - Activate plugin
  - Complete security scan

- [ ] **UpdraftPlus** - Backup
  - Search and install
  - Activate plugin
  - Configure backup settings

- [ ] **WP Mail SMTP** - Email delivery
  - Search and install
  - Activate plugin
  - Configure SMTP settings

### Premium Plugins (Purchase Required)

- [ ] **Elementor Pro**
  - Purchase license from elementor.com
  - Upload and activate
  - Enter license key

- [ ] **Amelia** or **Bookly**
  - Purchase booking plugin
  - Upload and activate
  - Enter license key
  - Configure booking settings

## Initial Configuration

### General Settings (Settings > General)
- [ ] Site Title: WhiskyTaste Pro
- [ ] Tagline: Premium Whisky Tasting Experiences
- [ ] WordPress Address matches Site Address
- [ ] Admin email is correct
- [ ] Timezone is correct

### Permalinks (Settings > Permalinks)
- [ ] Select "Post name" structure
- [ ] Save changes

### Reading Settings (Settings > Reading)
- [ ] Set homepage display to "A static page"
- [ ] Create and select Homepage
- [ ] Create and select Posts page

## Theme Customization

### Customize Theme (Appearance > Customize)
- [ ] **Site Identity**
  - [ ] Upload logo
  - [ ] Upload favicon

- [ ] **Colors**
  - [ ] Set primary color: #8B4513
  - [ ] Set secondary color: #D2691E
  - [ ] Set accent color: #FFD700

- [ ] **Typography**
  - [ ] Set heading font
  - [ ] Set body font

- [ ] **Header**
  - [ ] Configure header layout
  - [ ] Set up contact information

- [ ] **Footer**
  - [ ] Configure footer widgets
  - [ ] Add copyright information

## Create Essential Pages

- [ ] **Homepage** - Use Elementor
- [ ] **Services** - Use services template
- [ ] **Booking** - Add booking shortcode
- [ ] **Gallery** - Use gallery template
- [ ] **About** - Company information
- [ ] **Blog** - Set as posts page
- [ ] **Contact** - Add contact form

## Menu Setup

- [ ] Create Primary Menu
- [ ] Add all main pages
- [ ] Assign to Primary location
- [ ] Test navigation

## Security Hardening

- [ ] Change default admin username
- [ ] Remove unused themes
- [ ] Remove unused plugins
- [ ] Configure Wordfence firewall
- [ ] Set up regular backups
- [ ] Test backup restoration

## Performance Optimization

- [ ] Install caching plugin (W3 Total Cache or WP Rocket)
- [ ] Configure caching settings
- [ ] Optimize images with Smush
- [ ] Test page load speed
- [ ] Enable Gzip compression

## Final Checks

- [ ] All pages load correctly
- [ ] Forms submit properly
- [ ] Booking system works
- [ ] Emails are delivered
- [ ] Mobile responsive
- [ ] No PHP errors
- [ ] SSL certificate (if applicable)

## Post-Activation Tasks

1. **Content Creation**
   - [ ] Add service descriptions
   - [ ] Upload gallery images
   - [ ] Write initial blog posts
   - [ ] Add testimonials

2. **SEO Setup**
   - [ ] Configure Yoast settings
   - [ ] Add meta descriptions
   - [ ] Submit sitemap
   - [ ] Set up Google Analytics

3. **Testing**
   - [ ] Test booking flow
   - [ ] Test contact forms
   - [ ] Test on mobile devices
   - [ ] Cross-browser testing

## Notes

- Keep this checklist for future reference
- Update as you add new features
- Document any custom configurations
- Save all license keys securely

---

**Activation Date:** _______________  
**Completed By:** _________________