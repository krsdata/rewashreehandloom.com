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
define('DB_NAME', 'rewashre_projectplanit');

/** MySQL database username */
define('DB_USER', 'rewashre_project');

/** MySQL database password */
define('DB_PASSWORD', 'projectplanit@123');

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
define('AUTH_KEY',         '>6t?+e} <mC1-bhZ@x&r[X[ RY&;FigIli{b6]Oy;Kd@aOonV(Amom.p.;E~DYs]');
define('SECURE_AUTH_KEY',  'S)p9;o$?WvDfd|qJK+S_%_02;!Nygk}yJMQ>C7L81iH]BgtGw3-+D#DW`xEEsdnk');
define('LOGGED_IN_KEY',    '1~D)r.=(yH)43:K^UtkfYtTf.Me6AyJQuDB-G=m4`}G5SfV,<Q(GUalBBjF-Ed]j');
define('NONCE_KEY',        'NM~ZbVnj2W(n |Fg&]||<1+;eHYp6@?D(V~u#-wa:T]6$MIKvU`zME*Y4E{HlMI+');
define('AUTH_SALT',        '?k}q&)7f+4bAr+s~qO=;<bZ-M6]u!C4mJRFa[!45Kj0wiB+}$i:a]EyPm!mA,q6]');
define('SECURE_AUTH_SALT', 'I%l><Z.U6<.MMctQL6^/>huT%JG3j<Y%d3I!`->0#KTWq,ejwTZmm/8n, !iSsa-');
define('LOGGED_IN_SALT',   '`z*u2vt6dPd)B/c=*Ub3YyE[N%ma/ HALF<c(eI8L^=K1>v.;=xYne]Ih3Hg)R)k');
define('NONCE_SALT',       '6|C0CMHVjpyl>C7S-!=0oH)6Iks}SES/WJ8{~dnxq.@iFGOq(/+dx.{ERFs@-xkN');

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

define( 'WP_MAX_MEMORY_LIMIT', '512M' );
define( 'WP_MEMORY_LIMIT', '512M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
