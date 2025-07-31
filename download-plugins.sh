#!/bin/bash

# WhiskyTaste Pro - Essential Plugins Download Script
# This script downloads all essential free plugins from WordPress.org

echo "========================================"
echo "WhiskyTaste Pro - Plugin Downloader"
echo "========================================"
echo ""

# Create plugins directory if it doesn't exist
PLUGIN_DIR="wp-content/plugins"
if [ ! -d "$PLUGIN_DIR" ]; then
    mkdir -p "$PLUGIN_DIR"
fi

# Function to download and extract plugin
download_plugin() {
    local plugin_slug=$1
    local plugin_name=$2
    
    echo "Downloading $plugin_name..."
    
    # Download plugin
    if wget -q "https://downloads.wordpress.org/plugin/${plugin_slug}.latest-stable.zip" -O "${plugin_slug}.zip"; then
        # Extract to plugins directory
        if python3 -c "import zipfile; zipfile.ZipFile('${plugin_slug}.zip').extractall('${PLUGIN_DIR}/')" 2>/dev/null; then
            rm "${plugin_slug}.zip"
            echo "✓ $plugin_name installed successfully"
        else
            echo "✗ Failed to extract $plugin_name"
            rm -f "${plugin_slug}.zip"
        fi
    else
        echo "✗ Failed to download $plugin_name"
    fi
    
    echo ""
}

# Essential free plugins to download
echo "Downloading essential free plugins..."
echo "===================================="
echo ""

# Page Builder
download_plugin "elementor" "Elementor (Page Builder)"

# Forms
download_plugin "wpforms-lite" "WPForms Lite (Contact Forms)"

# SEO
download_plugin "wordpress-seo" "Yoast SEO"

# Security
download_plugin "wordfence" "Wordfence Security"

# Backup
download_plugin "updraftplus" "UpdraftPlus (Backup)"

# Email
download_plugin "wp-mail-smtp" "WP Mail SMTP"

# Image Optimization
download_plugin "wp-smushit" "Smush (Image Optimization)"

# Caching
download_plugin "w3-total-cache" "W3 Total Cache"

# Additional Useful Plugins
echo "Downloading additional useful plugins..."
echo "======================================"
echo ""

# Maintenance Mode
download_plugin "maintenance" "Maintenance Mode"

# Duplicate Post
download_plugin "duplicate-post" "Duplicate Post"

# Regenerate Thumbnails
download_plugin "regenerate-thumbnails" "Regenerate Thumbnails"

# Classic Editor (in case needed)
download_plugin "classic-editor" "Classic Editor"

echo "========================================"
echo "Plugin Download Summary"
echo "========================================"
echo ""
echo "Plugins have been downloaded to: $PLUGIN_DIR"
echo ""
echo "Next steps:"
echo "1. Log into WordPress Admin"
echo "2. Go to Plugins > Installed Plugins"
echo "3. Activate the plugins you need"
echo "4. Configure each plugin according to your needs"
echo ""
echo "Premium plugins that need to be purchased separately:"
echo "- Elementor Pro (enhanced page building features)"
echo "- Amelia or Bookly (booking system)"
echo "- WPForms Pro (advanced form features)"
echo ""
echo "========================================"