#!/bin/bash

# WhiskyTaste Pro Database Setup Script
# This script helps set up the MySQL database for WordPress

echo "========================================"
echo "WhiskyTaste Pro Database Setup"
echo "========================================"
echo ""

# Check if MySQL is installed
if ! command -v mysql &> /dev/null; then
    echo "Error: MySQL is not installed or not in PATH"
    echo "Please install MySQL or MariaDB first"
    exit 1
fi

# Get MySQL root password
echo -n "Enter MySQL root password: "
read -s MYSQL_ROOT_PASS
echo ""

# Get database password for wtp_user
echo -n "Enter password for WordPress database user (wtp_user): "
read -s WTP_USER_PASS
echo ""
echo -n "Confirm password: "
read -s WTP_USER_PASS_CONFIRM
echo ""

# Check if passwords match
if [ "$WTP_USER_PASS" != "$WTP_USER_PASS_CONFIRM" ]; then
    echo "Error: Passwords do not match!"
    exit 1
fi

# Create SQL commands
SQL_COMMANDS="
-- Create database
CREATE DATABASE IF NOT EXISTS whiskytaste_pro
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Create user
CREATE USER IF NOT EXISTS 'wtp_user'@'localhost' IDENTIFIED BY '$WTP_USER_PASS';

-- Grant privileges
GRANT ALL PRIVILEGES ON whiskytaste_pro.* TO 'wtp_user'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;

-- Show confirmation
SELECT 'Database setup complete!' AS Message;
"

# Execute SQL commands
echo "Setting up database..."
if mysql -u root -p"$MYSQL_ROOT_PASS" -e "$SQL_COMMANDS"; then
    echo ""
    echo "✓ Database 'whiskytaste_pro' created successfully!"
    echo "✓ User 'wtp_user' created with provided password"
    echo ""
    echo "Next steps:"
    echo "1. Update wp-config.php with the database password you just set"
    echo "2. Navigate to your site URL to complete WordPress installation"
    echo ""
    
    # Offer to update wp-config.php
    echo -n "Would you like to update wp-config.php with the password now? (y/n): "
    read UPDATE_CONFIG
    
    if [ "$UPDATE_CONFIG" = "y" ] || [ "$UPDATE_CONFIG" = "Y" ]; then
        # Update wp-config.php
        if [ -f "wp-config.php" ]; then
            # Use sed to replace the password
            sed -i.bak "s/define( 'DB_PASSWORD', 'your_password_here' );/define( 'DB_PASSWORD', '$WTP_USER_PASS' );/" wp-config.php
            echo "✓ wp-config.php updated successfully!"
            echo "  (Backup saved as wp-config.php.bak)"
        else
            echo "Error: wp-config.php not found in current directory"
        fi
    fi
else
    echo ""
    echo "Error: Failed to set up database"
    echo "Please check your MySQL root password and try again"
    exit 1
fi

echo ""
echo "========================================"
echo "Setup complete!"
echo "========================================"