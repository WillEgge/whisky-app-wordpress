# WhiskyTaste Pro - WordPress Business Website

A professional WordPress-based website for a whisky tasting service business, designed to showcase services, facilitate bookings, and provide educational content about whisky.

## 🥃 Overview

WhiskyTaste Pro is a comprehensive web solution for whisky tasting professionals to establish their online presence, manage bookings, and connect with enthusiasts. Built on WordPress for easy content management by non-technical users.

### Key Features

- **Online Booking System** - Integrated calendar with real-time availability
- **Service Showcase** - Detailed presentations of all tasting services
- **Event Calendar** - Public events and private booking management
- **Educational Blog** - Share whisky knowledge and expertise
- **Gallery** - Showcase past events with high-quality imagery
- **Mobile Responsive** - Optimized for all devices
- **SEO Optimized** - Built-in search engine optimization

## 🛠 Tech Stack

- **CMS:** WordPress (Latest Stable Version)
- **PHP:** 8.0+ 
- **Database:** MySQL 5.7+ or MariaDB 10.3+
- **Page Builder:** Elementor Pro
- **Theme:** Astra or GeneratePress (parent) + Custom Child Theme
- **Booking System:** Amelia or Bookly
- **Form Builder:** WPForms Pro

## 📋 Prerequisites

Before you begin, ensure you have:

- Local development environment (Local by Flywheel, XAMPP, or similar)
- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Node.js and npm (for build tools)
- Git for version control
- Text editor or IDE (VS Code recommended)

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/WillEgge/whisky-app-wordpress.git
cd whisky-app-wordpress
```

### 2. Set Up Local WordPress Environment

1. **Install Local by Flywheel** (Recommended)
   - Download from [localwp.com](https://localwp.com/)
   - Create a new WordPress site
   - Set PHP to 8.0+
   - Choose preferred web server (nginx/Apache)

2. **Configure WordPress**
   - Site name: WhiskyTaste Pro (or your business name)
   - Admin username: Create secure admin account
   - Admin email: Your email address

### 3. Install Theme and Plugins

1. **Parent Theme**
   ```
   - Install Astra or GeneratePress from WordPress repository
   - Activate the theme
   ```

2. **Essential Plugins** (Install from WordPress Admin)
   - Elementor Pro (Page Builder)
   - Amelia or Bookly (Booking System)
   - WPForms Pro (Forms)
   - Yoast SEO (Search Optimization)
   - Wordfence (Security)
   - UpdraftPlus (Backups)
   - WP Rocket (Performance)

3. **Child Theme** (Now Available!)
   ```bash
   # Copy child theme to WordPress themes directory
   cp -r wp-content/themes/whisky-taste-child /path/to/wordpress/wp-content/themes/
   # Activate from WordPress admin > Appearance > Themes
   ```

For detailed installation instructions, see [INSTALL.md](INSTALL.md).

## 📁 Project Structure

```
whisky-app-wordpress/
├── README.md              # This file
├── _PRD.md               # Product Requirements Document
├── CLAUDE.md             # Technical implementation guide
├── devHistory.md         # Development history tracking
├── INSTALL.md            # Detailed installation guide
├── .htaccess-sample      # Apache configuration template
├── wp-config-sample.php  # WordPress configuration template
├── tasks/
│   └── todo.md          # Task tracking
├── tests/               # Test files (when implemented)
└── wp-content/          # WordPress content
    └── themes/
        └── whisky-taste-child/    # Custom child theme
            ├── style.css          # Theme styles with proper headers
            ├── functions.php      # Theme functionality
            ├── assets/           # Theme assets
            │   ├── css/         # Custom CSS files
            │   │   ├── custom.css
            │   │   └── booking.css
            │   ├── js/          # JavaScript files
            │   │   └── custom.js
            │   └── images/      # Theme images
            ├── templates/        # Page templates
            │   ├── page-services.php
            │   ├── page-booking.php
            │   └── page-gallery.php
            ├── includes/         # Additional PHP files
            └── partials/         # Template parts
```

## 💻 Development Workflow

### Making Changes

1. **Create a feature branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Make your changes**
   - Follow WordPress coding standards
   - Use child theme for customizations
   - Test on multiple devices/browsers

3. **Commit changes**
   ```bash
   git add .
   git commit -m "Descriptive commit message"
   ```

4. **Push to repository**
   ```bash
   git push origin feature/your-feature-name
   ```

### Code Standards

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Use proper function prefixes: `wtp_function_name()`
- Comment your code appropriately
- Ensure mobile responsiveness

## ✨ Features

### Implemented
- ✅ Project documentation and planning
- ✅ Git repository setup  
- ✅ Development tracking system
- ✅ Custom child theme structure
- ✅ Theme templates (Services, Booking, Gallery)
- ✅ CSS and JavaScript framework
- ✅ Configuration templates (.htaccess, wp-config)
- ✅ Comprehensive installation guide

### In Development
- 🔄 WordPress core installation
- 🔄 Plugin installation and configuration
- 🔄 Content creation and import

### Planned Features
- 📋 Service pages with detailed descriptions
- 📋 Integrated booking calendar
- 📋 Payment processing
- 📋 Email automation
- 📋 Social media integration
- 📋 Newsletter system
- 📋 Client testimonials
- 📋 Multi-language support (future)

## 🚢 Deployment

### Staging Deployment

1. Set up staging environment
2. Export local database
3. Upload files via FTP/SSH
4. Import database
5. Update wp-config.php
6. Test all functionality

### Production Deployment

1. Backup existing site (if applicable)
2. Follow staging process
3. Configure SSL certificate
4. Set up CDN (Cloudflare recommended)
5. Enable caching
6. Configure monitoring

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📚 Documentation

- [Product Requirements Document](_PRD.md) - Detailed product specifications
- [Technical Guide](CLAUDE.md) - Implementation details and standards
- [Development History](devHistory.md) - Project timeline and progress
- [Task Tracking](tasks/todo.md) - Current and completed tasks

## 🛡 Security

- Regular security scans with Wordfence
- Keep WordPress, themes, and plugins updated
- Use strong passwords
- Implement 2FA for admin accounts
- Regular backups to external location

## 📞 Support & Maintenance

### Common Issues

**Slow page load:**
- Check image optimization
- Verify caching is enabled
- Review plugin performance

**Booking conflicts:**
- Check timezone settings
- Clear booking cache
- Verify calendar sync

### Getting Help

- Check documentation first
- Review common issues above
- Contact development team

## 📄 License

This project is proprietary and confidential. All rights reserved.

---

**Current Status:** Phase 1 (Documentation) Complete | Phase 2 (WordPress Development) In Progress - Child theme created with templates, styles, and functionality ready for WordPress installation.

*Last Updated: July 30, 2025*