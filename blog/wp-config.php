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
define('DB_NAME', 'protestwit');

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
define('AUTH_KEY',         '| 5p&!ss=|9_YZbxfAGi?LJr8Hqa(>]Ay_+<bmFxg#U3#kCA{.$gTqI$W@YeX11d');
define('SECURE_AUTH_KEY',  '<-Oq*,FNmJW=KJ@7>kI/lKet^Q<IvA7mplSsCa~IgBZ(TrC/ir_`Q.Tns34^_#+`');
define('LOGGED_IN_KEY',    'OF_P/WP&i$KbWl*_) :dz1%dnv/a0wvIPCRSf6W4/72}S(W3+>qNpfUM]x0OY1v]');
define('NONCE_KEY',        'FTlie7:eA2`pyiL7/xj?iH|FQ-C]?rx0}a5 ,#:D 7 Oz30h0m4sLYm7cAP;O`+=');
define('AUTH_SALT',        'C,`pGJAW:fB|+pSnek?s$v@;X%*udG+@u3a2/?zS-f]H8w`~k6Jf)>ITrz<F1G8Z');
define('SECURE_AUTH_SALT', '!K?0xv]a:1r?)8T/Y_Ml6q7Lav^wC#`D.V7-SxG=?@nA#J%m1Ht0we/Z.2BaKJx$');
define('LOGGED_IN_SALT',   'A>rJ;>/+HC<rJpMFD6]=;s>0c;eH|p+-9f? 43sNW8,]8Cx59H3](LR#^EPo&hot');
define('NONCE_SALT',       'S<A/C+UkeD&_nb).5Q]zAMXTc1.#9|D@vc|AnxyEj6p[^@lVIo/sP%^QySqg)u{%');

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
