<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

// define('DISALLOW_FILE_EDIT', TRUE); 
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'perenoel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{SAX$uqrU*WoxgIUm0sFTJXG+7+&LBL$n>P~tKWJ kRC+t,!:).tOR|]G|*]X8:9');
define('SECURE_AUTH_KEY',  'a0lk|fnyR^oD/o-f!49Dxd.)5{{G:<s3CZ&k(X!oG<yeRQm9=A;r-ncg9|?8DcOE');
define('LOGGED_IN_KEY',    '=9`|@M|lHDk-6R`4M(?E^o#|5|GYMW@ {t2urXd)Sl6j`38@B&*~-UE1h}dPEpg3');
define('NONCE_KEY',        'dBFy#S@WArO9L9j?h4N# #tpaH sHRoC;r/%c(&_e;6%-j-k!w0!o}xrE.cs+lnQ');
define('AUTH_SALT',        'q&.,zEJ8ks3r?R#WQ5?+qinR[q@<7}e ^5vniZCoi]2Q-fq_i1>69-gItn(X#C?N');
define('SECURE_AUTH_SALT', 'lv^-%+S`T%7G}JhcZc+iO|.:T<U-7|-%.Q8nRn`4yS0!0.U-%c|Dd1-EmmeEuc/d');
define('LOGGED_IN_SALT',   't11(V~y@8rX|Cp3#/8:JHZo{T1Q>$V=aGjNA;fo<(jt]TnD^/}ryq(R<<b4PhMA-');
define('NONCE_SALT',       ']6r<N^.5@ql172=!hS,^W@9+@KiO -|d@sSDd_WXrAH,+x+LL`Ka|bCz8329m=R5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pr_';

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
define('WP_DEBUG', false);
define('FS_METHOD','direct');
define('ALLOW_UNFILTERED_UPLOADS', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
