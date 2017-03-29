<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rewashre_fcc');

/** MySQL database username */
define('DB_USER', 'rewashre_fcc');

/** MySQL database password */
define('DB_PASSWORD', 'fcc@123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '@.}w7^z&NK(wDQu;Cp2 [AQb2H!_C2#}-F>w/R}#=o+Fj$?|0O/f@ufplu~kPvp8');
define('SECURE_AUTH_KEY',  '-,)6#&Q.H%,`yK-yI_XSXd+qilH@$i4?r#52~~+t<01O]0K]<(V&pzrNj*0;EH1V');
define('LOGGED_IN_KEY',    'BCYXG@j;~|O%/FWQ[P1qiDAx{Z^P0u1%>.aD0MU9;u2l/qnIWIM@0c`y2g~BuVjh');
define('NONCE_KEY',        'zGnXN?=,G8vj_z--B2eFN{^Wp Cj7 d2O#1f2wOj{/Wug0i~HS>uQU_;mE`_> pc');
define('AUTH_SALT',        '&+,(rxk9ORwQ*qkajRKB|8oeIfV/p|mTtv[,6>`Pj^P6#+v@#oHGsRO!v!aKjQP{');
define('SECURE_AUTH_SALT', 'oQ|[$?Db,}3LVzb<0e#^y5xB6Ex[M?:6OXtVOKyu/UDi7Ur!#0hW??A:[!iVdCYg');
define('LOGGED_IN_SALT',   '!Z [HelDmPAW8$w),}Wv9o=?s@]@@9~a<0)kw?p5|*HN0U_)4e/X(et<Jv>5qhW7');
define('NONCE_SALT',       'TPk6}&_vlK[U_<5e(5kppR![qOuMI2Ln3 I$@py:nGGrI|zB1M&Vrb# <c/fiLV;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
