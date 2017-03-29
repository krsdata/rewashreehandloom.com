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
define('DB_NAME', 'rewashre_rewashreehandloom');

/** MySQL database username */
define('DB_USER', 'rewashre_rewa');

/** MySQL database password */
define('DB_PASSWORD', 'rewashreehandloom@123');

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
define('AUTH_KEY',         'BYVb|HgUqMZB_]O-+EKyd1>uD}<@vAD=)]NG0eFoxgG12}^x@s.L!xWga~.q%k5=');
define('SECURE_AUTH_KEY',  'YF3<0)AL?Wbn2IbmY|Bu,T7FU;M9B0j;|6OY 3`y>!_?Kt|@zr+{keIj~V6f9#P+');
define('LOGGED_IN_KEY',    'FaE/l%pVPKrDk;gw}FHT6?=yj,=lEX7%$``0Gj&3d]&Y=$ O1&::qt].XYY~YClr');
define('NONCE_KEY',        'wC|{TZRPhBt#)4--FzVe+[n+3;hqS_x&RXi9g^w5Ct0|4!JB,<)P{]io}E4FL& ;');
define('AUTH_SALT',        '%]Lb(p>.`d8+d%/ufr5]PiwBq1$|).`td_cTCySV*^?RCfD%Y?0]TUH/jI|Cx39w');
define('SECURE_AUTH_SALT', '5r96(;oEu+:EPV:ih?(k=NBv )BpRt[5}r4Yf4qI*Iv-pKMX+u#Quy>+9<fn.4+8');
define('LOGGED_IN_SALT',   '4dKdpcQJ#|)H+dEzs==TT`rC1-$Shn=7?S1Y$z<yYmc4BMe|LV[]$AiwRv=l fY7');
define('NONCE_SALT',       'WFD2f;|l$tdJ, B@7JIy,:OP$NDr/nrykFxb&{B$L}|i`kJDt#X5V,vT&P,73]%B');

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

define('WP_MAX_MEMORY_LIMIT', '256M');
ini_set('memory_limit','256M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
