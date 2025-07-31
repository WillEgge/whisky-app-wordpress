<?php
/**
 * The base configuration for WordPress
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 * * Custom settings for WhiskyTaste Pro
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database_name_here' );

/** MySQL database username */
define( 'DB_USER', 'username_here' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password_here' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wtp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

/* ==========================================================================
   WhiskyTaste Pro Custom Configuration
   ========================================================================== */

/**
 * Environment Settings
 * Change to 'production' when deploying to live server
 */
define( 'WTP_ENVIRONMENT', 'development' );

/**
 * Memory Limits
 * Increase memory for media-heavy site
 */
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/**
 * Security Settings
 */
// Disable file editing in WordPress admin
define( 'DISALLOW_FILE_EDIT', true );

// Limit post revisions
define( 'WP_POST_REVISIONS', 5 );

// Auto-save interval (in seconds)
define( 'AUTOSAVE_INTERVAL', 120 );

// Empty trash automatically after 7 days
define( 'EMPTY_TRASH_DAYS', 7 );

/**
 * Performance Settings
 */
// Enable cache
define( 'WP_CACHE', true );

// Compression
define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );
define( 'CONCATENATE_SCRIPTS', false );
define( 'ENFORCE_GZIP', true );

/**
 * SSL/HTTPS Settings
 * Uncomment these lines if using SSL
 */
// define( 'FORCE_SSL_ADMIN', true );
// define( 'FORCE_SSL_LOGIN', true );

/**
 * Multisite Settings
 * Uncomment if converting to multisite
 */
// define( 'WP_ALLOW_MULTISITE', true );

/**
 * Update Settings
 */
// Disable automatic updates (manage via staging/deployment)
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );

/**
 * Custom Content Directory
 * Uncomment to use custom content directory
 */
// define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/custom-content' );
// define( 'WP_CONTENT_URL', 'https://yourdomain.com/custom-content' );

/**
 * Custom Uploads Directory
 * Uncomment to use custom uploads directory
 */
// define( 'UPLOADS', 'custom-uploads' );

/**
 * API Keys and External Services
 * Add your API keys here
 */
define( 'WTP_GOOGLE_MAPS_API_KEY', '' );
define( 'WTP_MAILCHIMP_API_KEY', '' );
define( 'WTP_STRIPE_PUBLIC_KEY', '' );
define( 'WTP_STRIPE_SECRET_KEY', '' );

/**
 * Email Configuration
 * SMTP settings for reliable email delivery
 */
define( 'WTP_SMTP_HOST', 'smtp.gmail.com' );
define( 'WTP_SMTP_PORT', 587 );
define( 'WTP_SMTP_USERNAME', '' );
define( 'WTP_SMTP_PASSWORD', '' );
define( 'WTP_SMTP_ENCRYPTION', 'tls' );
define( 'WTP_SMTP_FROM_EMAIL', 'noreply@yourdomain.com' );
define( 'WTP_SMTP_FROM_NAME', 'WhiskyTaste Pro' );

/**
 * Booking System Configuration
 */
define( 'WTP_BOOKING_ADVANCE_DAYS', 90 ); // How far in advance bookings can be made
define( 'WTP_BOOKING_MIN_NOTICE_HOURS', 24 ); // Minimum notice for bookings
define( 'WTP_BOOKING_CANCELLATION_HOURS', 12 ); // Cancellation deadline

/**
 * Development/Staging Settings
 * Comment out or change for production
 */
if ( WTP_ENVIRONMENT === 'development' ) {
    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', true );
    define( 'SCRIPT_DEBUG', true );
    define( 'SAVEQUERIES', true );
}

/**
 * Production Settings
 * Uncomment for production environment
 */
if ( WTP_ENVIRONMENT === 'production' ) {
    // Hide errors
    ini_set( 'display_errors', 0 );
    define( 'WP_DEBUG_DISPLAY', false );
    
    // Security headers
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-XSS-Protection: 1; mode=block' );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';