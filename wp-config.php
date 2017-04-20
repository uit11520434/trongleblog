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
define('DB_NAME', 'trongleblog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '~e$Ti!W4f9YL@|FkknfW$:KeW:vObRRbnWl}#Y)4=.X:LYj,7JzT,*t}%$pU#7p(');
define('SECURE_AUTH_KEY',  '>7#-(n-*TAN$[Nhg]xJSTTfy@sPj/cd5+LbN|m?t8<yjrFO5b:r+Q!qA)pBecBTc');
define('LOGGED_IN_KEY',    'BA6{J}Cot)T<.@Js;-}cUVffn-*p}$Tiv>ly(>EpL%G0!!OOo0:QVHwmK)PQRf_M');
define('NONCE_KEY',        'SyL4Ia_LpbBm!91orEd4~NPv-!o;yzd6x>kw?PncrP1-(w.lQ }~!Ip.,RwmXfg!');
define('AUTH_SALT',        '6[CBceE[rZENHhsjMF.:7JMF%e1dj]N/pZnAYrMHhC|~]RhkTh2RFapC= 8R(a3J');
define('SECURE_AUTH_SALT', '5g!Qip24WmI}7:|j|JXY3h^MSn1h-7lk&,/Mp]A/i|^8;rG-n>`pLd4QDd`>Nh`#');
define('LOGGED_IN_SALT',   'KfHr_t>vZ&1aypUfmm:II=6u^_2iP!9A(R4^SwV&hk$U&G<9po7Z5=>T mxiQ*Y7');
define('NONCE_SALT',       'XZpm]/JVphJ)+Ro1$:z{^`$J$kc$NS@yUOs{BP_Y&YSY[+xuV{g]IKblUX8eYB93');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
