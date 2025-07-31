# WhiskyTaste Pro Installation Guide

This guide will walk you through setting up the WhiskyTaste Pro WordPress website from scratch.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Local Development Setup](#local-development-setup)
3. [WordPress Installation](#wordpress-installation)
4. [Theme Installation](#theme-installation)
5. [Plugin Installation](#plugin-installation)
6. [Initial Configuration](#initial-configuration)
7. [Content Setup](#content-setup)
8. [Testing](#testing)
9. [Deployment](#deployment)
10. [Troubleshooting](#troubleshooting)

## Prerequisites

### System Requirements

- **PHP:** 8.0 or higher
- **MySQL:** 5.7+ or MariaDB 10.3+
- **Web Server:** Apache or Nginx
- **Memory:** At least 256MB RAM
- **Disk Space:** Minimum 1GB free space

### Development Tools

- **Local by Flywheel** (recommended) or **LocalWP**
- **Git** for version control
- **Code editor** (VS Code, PHPStorm, etc.)
- **FTP client** (for deployment)

## Local Development Setup

### Option 1: Using Local by Flywheel (Recommended)

1. **Download and Install Local**
   - Visit https://localwp.com/
   - Download for your operating system
   - Install and launch the application

2. **Create New Site**
   - Click "Create a new site"
   - Choose "Create a new site"
   - Site name: `whiskytaste-pro`
   - Choose "Preferred" environment:
     - PHP 8.0+
     - Web Server: nginx
     - Database: MySQL 8.0
   - Set WordPress username and password
   - Click "Add Site"

3. **Access Your Site**
   - Click "Open Site" to view frontend
   - Click "Admin" to access WordPress dashboard

### Option 2: Manual Setup (XAMPP/MAMP)

1. **Install XAMPP/MAMP**
   - Download from respective websites
   - Install and start Apache and MySQL services

2. **Create Database**
   ```sql
   CREATE DATABASE whiskytaste_pro;
   CREATE USER 'wtp_user'@'localhost' IDENTIFIED BY 'your_password';
   GRANT ALL PRIVILEGES ON whiskytaste_pro.* TO 'wtp_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

## WordPress Installation

### 1. Download WordPress

If not using Local by Flywheel:
```bash
cd /path/to/your/webroot
wget https://wordpress.org/latest.zip
unzip latest.zip
mv wordpress whiskytaste-pro
```

### 2. Configure WordPress

1. **Copy configuration file**
   ```bash
   cp wp-config-sample.php wp-config.php
   ```

2. **Update database credentials in wp-config.php**
   ```php
   define( 'DB_NAME', 'whiskytaste_pro' );
   define( 'DB_USER', 'wtp_user' );
   define( 'DB_PASSWORD', 'your_password' );
   define( 'DB_HOST', 'localhost' );
   ```

3. **Generate security keys**
   - Visit https://api.wordpress.org/secret-key/1.1/salt/
   - Replace the placeholder keys in wp-config.php

4. **Set table prefix**
   ```php
   $table_prefix = 'wtp_';
   ```

### 3. Run WordPress Installation

1. Navigate to http://localhost/whiskytaste-pro
2. Select language
3. Enter site information:
   - Site Title: WhiskyTaste Pro
   - Username: admin (change this!)
   - Password: (use strong password)
   - Email: your-email@example.com
4. Click "Install WordPress"

## Theme Installation

### 1. Install Parent Theme

1. Login to WordPress Admin
2. Go to **Appearance > Themes > Add New**
3. Search for "Astra" or "GeneratePress"
4. Click **Install** then **Activate**

### 2. Install Child Theme

1. **Via WordPress Admin:**
   - Go to **Appearance > Themes > Add New > Upload Theme**
   - Upload the `whisky-taste-child` folder as a zip file
   - Click **Install** then **Activate**

2. **Via FTP/File System:**
   ```bash
   cd /path/to/wordpress/wp-content/themes/
   cp -r /path/to/repo/wp-content/themes/whisky-taste-child .
   ```

3. **Activate Child Theme**
   - Go to **Appearance > Themes**
   - Activate "WhiskyTaste Pro Child Theme"

## Plugin Installation

### Essential Plugins (Free)

Install via **Plugins > Add New**:

1. **Elementor** - Page builder
2. **WPForms Lite** - Contact forms
3. **Yoast SEO** - Search optimization
4. **Wordfence Security** - Security
5. **UpdraftPlus** - Backup
6. **WP Mail SMTP** - Email delivery
7. **Smush** - Image optimization
8. **W3 Total Cache** - Performance

### Premium Plugins (Required Purchase)

1. **Elementor Pro**
   - Purchase from https://elementor.com/
   - Upload and activate license

2. **Amelia** or **Bookly**
   - Purchase booking plugin
   - Upload and activate
   - Enter license key

3. **WPForms Pro** (optional)
   - For advanced form features

## Initial Configuration

### 1. General Settings

Go to **Settings > General**:
- Site Title: WhiskyTaste Pro
- Tagline: Premium Whisky Tasting Experiences
- WordPress Address (URL): http://localhost/whiskytaste-pro
- Site Address (URL): http://localhost/whiskytaste-pro
- Admin Email: your-email@example.com
- Timezone: Your local timezone

### 2. Permalink Settings

Go to **Settings > Permalinks**:
- Select "Post name"
- Click "Save Changes"

### 3. Theme Customization

Go to **Appearance > Customize**:

1. **Site Identity**
   - Upload logo
   - Set site icon (favicon)

2. **Colors**
   - Primary: #8B4513 (Saddle Brown)
   - Secondary: #D2691E (Chocolate)
   - Accent: #FFD700 (Gold)

3. **Typography**
   - Headings: Playfair Display
   - Body: System fonts

4. **Contact Information**
   - Add phone number
   - Add email address
   - Add business hours

### 4. Plugin Configuration

#### Elementor Setup
1. Go to **Elementor > Settings**
2. Post Types: Enable for Pages, Posts, Services
3. Disable default colors and fonts

#### Booking System (Amelia)
1. Go to **Amelia > Settings**
2. Company Settings:
   - Company name
   - Address
   - Phone/Email
3. Working Hours:
   - Set business hours
   - Set days off
4. Services:
   - Add whisky tasting services
   - Set prices and duration
5. Employees:
   - Add staff members
   - Assign to services

#### SEO Configuration (Yoast)
1. Run configuration wizard
2. Set up:
   - Organization info
   - Social profiles
   - Sitemap settings

#### Security (Wordfence)
1. Run setup wizard
2. Enable:
   - Firewall
   - Malware scanning
   - Login security

## Content Setup

### 1. Create Pages

Create the following pages:

1. **Homepage**
   - Template: Elementor Full Width
   - Add hero section
   - Services overview
   - Testimonials
   - CTA sections

2. **Services**
   - Template: Services Page
   - Will auto-populate with services

3. **Booking**
   - Template: Booking Page
   - Add [ameliabooking] shortcode

4. **Gallery**
   - Template: Gallery Page
   - Upload images

5. **About**
   - Standard page
   - Company story

6. **Blog**
   - Set as Posts page in Settings > Reading

7. **Contact**
   - Add contact form
   - Include map

### 2. Create Services

1. Go to **Services > Add New**
2. Create services:
   - Whisky Tasting Session
   - Private Events
   - Corporate Tastings
   - Whisky Education
   - Distillery Tours

### 3. Configure Menus

1. Go to **Appearance > Menus**
2. Create "Primary Menu":
   - Home
   - Services
   - Booking
   - Gallery
   - About
   - Blog
   - Contact
3. Assign to "Primary Menu" location

### 4. Add Content

1. **Import demo content** (if available)
2. **Add testimonials**
3. **Upload gallery images**
4. **Write initial blog posts**

## Testing

### 1. Functionality Testing

- [ ] All pages load correctly
- [ ] Navigation works
- [ ] Contact forms submit
- [ ] Booking system works
- [ ] Gallery displays properly
- [ ] Blog pagination works
- [ ] Search functionality

### 2. Responsive Testing

Test on:
- [ ] Desktop (1920x1080)
- [ ] Laptop (1366x768)
- [ ] Tablet (768x1024)
- [ ] Mobile (375x667)

### 3. Cross-browser Testing

Test on:
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

### 4. Performance Testing

Use tools:
- Google PageSpeed Insights
- GTmetrix
- Pingdom

Target metrics:
- Load time < 3 seconds
- PageSpeed score > 80
- GTmetrix Grade A

## Deployment

### 1. Pre-deployment Checklist

- [ ] Remove debug mode
- [ ] Update wp-config.php for production
- [ ] Optimize database
- [ ] Clear unnecessary data
- [ ] Set up backups
- [ ] Configure SSL certificate

### 2. Deployment Methods

#### Option 1: Manual FTP
1. Export database from local
2. Upload files via FTP
3. Import database on server
4. Update wp-config.php
5. Search-replace URLs

#### Option 2: Migration Plugin
1. Install "All-in-One WP Migration"
2. Export site
3. Install WordPress on server
4. Import backup

### 3. Post-deployment

1. **Update URLs**
   ```sql
   UPDATE wp_options SET option_value = 'https://yourdomain.com' WHERE option_name IN ('siteurl', 'home');
   ```

2. **Set up SSL**
   - Install SSL certificate
   - Force HTTPS in .htaccess

3. **Configure CDN** (optional)
   - Set up Cloudflare
   - Configure caching rules

4. **Set up monitoring**
   - Uptime monitoring
   - Security monitoring
   - Performance monitoring

## Troubleshooting

### Common Issues

#### White Screen of Death
- Check PHP error logs
- Increase memory limit
- Disable plugins via FTP

#### 404 Errors on Pages
- Re-save permalinks
- Check .htaccess file
- Verify mod_rewrite is enabled

#### Email Not Sending
- Configure SMTP plugin
- Check server mail configuration
- Verify email credentials

#### Slow Performance
- Enable caching
- Optimize images
- Check hosting resources
- Review installed plugins

#### Booking System Issues
- Check timezone settings
- Verify service configuration
- Clear booking cache
- Check payment gateway

### Getting Help

1. **WordPress Support**
   - https://wordpress.org/support/
   - https://wordpress.stackexchange.com/

2. **Theme Support**
   - Astra: https://wpastra.com/docs/
   - GeneratePress: https://docs.generatepress.com/

3. **Plugin Support**
   - Check plugin documentation
   - Submit support tickets

## Maintenance

### Regular Tasks

**Daily:**
- Monitor uptime
- Check for security alerts

**Weekly:**
- Review analytics
- Update content
- Check for plugin updates

**Monthly:**
- Full backup
- Performance review
- Security scan
- Database optimization

**Quarterly:**
- Review and update plugins
- Check for theme updates
- Review user accounts
- Update documentation

---

For additional help or custom development needs, please refer to the project documentation or contact the development team.