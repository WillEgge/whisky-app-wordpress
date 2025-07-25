# CLAUDE.md

## Standard Workflow

1. First think through the problem, read the codebase for relevant files, and create a plan using Claude Code's TodoWrite tool. Also write the plan to tasks/todo.md.
2. The plan should have a list of todo items that you can check off as you complete them (use `- [ ]` checkbox format)
3. Before you begin working, check in with me and I will verify the plan.
4. Then, begin working on the todo items, marking them as complete as you go.
5. After completing each todo item, provide a brief high-level explanation of what changes you made
6. Make every task and code change you do as simple as possible. We want to avoid making any massive or complex changes. Every change should impact as little code as possible. Everything is about simplicity.
7. Run any relevant tests after implementation (once test commands are established)
8. Finally, add a review section to the [todo.md](tasks/todo.md) file with:
   - Summary of completed tasks
   - Any challenges encountered
   - Suggestions for next steps

## Project Architecture

### WordPress Setup
- **WordPress Version:** Latest stable (6.x)
- **PHP Version:** 8.0+ recommended
- **MySQL Version:** 5.7+ or MariaDB 10.3+
- **Development Environment:** Local by Flywheel or LocalWP recommended

### Theme Structure
```
whisky-taste-pro/
├── wp-content/
│   ├── themes/
│   │   └── whisky-taste-child/
│   │       ├── style.css
│   │       ├── functions.php
│   │       ├── templates/
│   │       └── assets/
│   └── plugins/
│       └── (various plugins)
```

### Essential Plugins

**Core Functionality:**
- Elementor Pro - Page builder
- Amelia or Bookly - Booking system
- WPForms Pro - Form builder
- WooCommerce (if payment processing needed)

**Performance & SEO:**
- WP Rocket or W3 Total Cache
- Yoast SEO or Rank Math
- Smush or ShortPixel - Image optimization
- Perfmatters - Performance optimization

**Security & Maintenance:**
- Wordfence Security
- UpdraftPlus - Backups
- WP Mail SMTP

### Database Schema Considerations

**Custom Tables (if needed):**
- Booking system will create its own tables
- Consider custom post types for:
  - Services
  - Events
  - Testimonials

**Key Meta Fields:**
- Service pricing
- Event dates/times
- Booking availability
- Gallery associations

### Development Guidelines

**Code Standards:**
- Follow WordPress Coding Standards
- Use child theme for customizations
- Namespace custom functions: `wtp_function_name()`
- Enqueue scripts/styles properly

**File Organization:**
```php
// functions.php structure
// 1. Theme setup
// 2. Enqueue scripts/styles
// 3. Custom post types
// 4. Custom functions
// 5. Plugin customizations
```

### API Integrations

**Required APIs:**
- Google Maps (for location display)
- Email service (Mailchimp/SendinBlue)
- Payment gateway (Stripe/PayPal)
- Social media APIs (for feeds)

**Webhook Endpoints:**
- Booking confirmations
- Contact form submissions
- Newsletter signups

### Testing Checklist

**Pre-Launch:**
- [ ] Cross-browser testing (Chrome, Firefox, Safari, Edge)
- [ ] Mobile responsiveness (iPhone, Android)
- [ ] Form submissions
- [ ] Booking flow end-to-end
- [ ] Payment processing
- [ ] Email notifications
- [ ] Page load speed < 3s
- [ ] SEO meta tags
- [ ] SSL certificate
- [ ] 404 page
- [ ] Search functionality

**Performance Benchmarks:**
- GTmetrix Grade A
- PageSpeed Insights > 80
- Core Web Vitals: Pass

### Deployment Process

1. **Staging Environment:**
   - Set up staging subdomain
   - Mirror production environment
   - Test all features

2. **Production Deployment:**
   - Backup existing site (if any)
   - Update DNS records
   - Configure SSL
   - Set up CDN (Cloudflare recommended)
   - Configure caching
   - Set up monitoring

### Maintenance Tasks

**Daily:**
- Monitor uptime
- Check for security alerts

**Weekly:**
- Review analytics
- Update content as needed
- Check for plugin updates

**Monthly:**
- Full site backup
- Performance audit
- Security scan
- Update documentation

### Common Issues & Solutions

**Issue: Slow page load**
- Check image sizes
- Enable caching
- Minimize plugins
- Use CDN

**Issue: Booking conflicts**
- Check timezone settings
- Verify calendar sync
- Clear booking cache

**Issue: Email delivery**
- Configure SMTP
- Check spam filters
- Verify email authentication

### Client Training Topics

1. **Content Management:**
   - Adding/editing pages
   - Blog post creation
   - Media library usage

2. **Booking Management:**
   - Viewing appointments
   - Managing availability
   - Processing cancellations

3. **Basic Maintenance:**
   - Plugin updates
   - Content backups
   - Form submissions review

### Development Commands

```bash
# No specific build commands for standard WordPress
# Use these for version control:
git add .
git commit -m "Description of changes"
git push origin main

# Database export (for backups):
wp db export backup.sql

# Search/replace for domain changes:
wp search-replace 'old-domain.com' 'new-domain.com'
```

### Resources & Documentation

- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [Elementor Developer Docs](https://developers.elementor.com/)
- [WPForms Developer Docs](https://wpforms.com/developers/)
- [Amelia Booking Docs](https://wpamelia.com/documentation/)

### Security Best Practices

1. Change default 'admin' username
2. Use strong passwords
3. Limit login attempts
4. Disable file editing in WordPress admin
5. Keep WordPress, themes, and plugins updated
6. Regular security scans
7. Implement 2FA for admin accounts
8. Secure wp-config.php file
9. Disable XML-RPC if not needed
10. Regular backups to external location
