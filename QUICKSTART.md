# WhiskyTaste Pro - Quick Start Guide

## Current Status

WordPress core files are installed with:
- ✅ WordPress core (latest version)
- ✅ Astra parent theme
- ✅ WhiskyTaste Pro child theme
- ✅ Database setup scripts
- ✅ Plugin download scripts

## How to Run the Application

### Option 1: Using Local by Flywheel (Easiest)

1. **Install Local by Flywheel**
   ```
   Download from: https://localwp.com/
   ```

2. **Create New Site**
   - Open Local
   - Click "Create a new site"
   - Choose "Add existing site" 
   - Point to this directory
   - Follow the setup wizard

3. **Access Your Site**
   - Click "Open Site" to view
   - Click "Admin" for WordPress dashboard

### Option 2: Manual Setup (XAMPP/MAMP/LAMP)

1. **Set Up Database**
   ```bash
   # Run the database setup script
   ./setup-database.sh
   
   # Or manually with SQL
   mysql -u root -p < setup-database.sql
   ```

2. **Configure Web Server**
   - Point document root to this directory
   - Ensure PHP 8.0+ is enabled
   - Start Apache/Nginx and MySQL

3. **Update wp-config.php**
   - Database password is currently: `your_password_here`
   - Update with your actual password

4. **Access WordPress**
   - Navigate to: http://localhost/your-directory-name
   - Complete WordPress installation

## Quick Setup Commands

```bash
# 1. Set up database (interactive)
./setup-database.sh

# 2. Download all free plugins
./download-plugins.sh

# 3. Start your local server and access the site
```

## Next Steps

1. **Complete WordPress Installation**
   - Set site title, admin user, password
   - Choose timezone

2. **Activate Theme**
   - Go to Appearance > Themes
   - Activate "WhiskyTaste Pro Child Theme"

3. **Install Plugins**
   - Go to Plugins > Installed Plugins
   - Activate needed plugins

4. **Follow Activation Checklist**
   - See ACTIVATION-CHECKLIST.md for detailed steps

## File Structure

```
whisky-app-wordpress/
├── wp-admin/           # WordPress admin files
├── wp-content/
│   ├── themes/
│   │   ├── astra/     # Parent theme
│   │   └── whisky-taste-child/  # Child theme
│   └── plugins/       # Plugins directory
├── wp-includes/       # WordPress core files
├── wp-config.php      # Configuration file
├── setup-database.sh  # Database setup script
├── download-plugins.sh # Plugin download script
└── ACTIVATION-CHECKLIST.md  # Setup checklist
```

## Troubleshooting

- **Database connection error**: Check credentials in wp-config.php
- **404 errors**: Re-save permalinks in Settings > Permalinks
- **White screen**: Enable WP_DEBUG in wp-config.php
- **Can't access admin**: Check .htaccess file permissions

## Support

See INSTALL.md for comprehensive installation instructions.