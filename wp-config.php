<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pagedevc_wp_kxqv3' );

/** Database username */
define( 'DB_USER', 'pagedevc_wp_bceud' );

/** Database password */
define( 'DB_PASSWORD', 'mLM1r7^h*FiG8EQX' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3Og71_P]1elJ#/80|F+%yXT6QwZ7gCfT1iE9;:3zF3E160T6:Jk[U7_c8im|-0lS');
define('SECURE_AUTH_KEY', '#[#&i844Zc4y29KU_3Q#Qt9P8R#it_17Zc60&25)~1lbk6hn|]8+uQ/8U#2&8B!S');
define('LOGGED_IN_KEY', 'd%wGoFQ[t*L1WAF69xfd0f9oi3VFprc1;vh*@Mp)lIw7Cz[8[19;|9@W2CZH/WT8');
define('NONCE_KEY', 'a0Z~KfBa8!6H44_nA;04jIdL3e2)6felh&znSo20DSSf9TgtTx4+1dT1vG9wN//K');
define('AUTH_SALT', 'MUS_NLCXOAj-eM]68&h~d+1&3I297At+f]wtS//tmPBhc04C8v])2+019Y_(l&_*');
define('SECURE_AUTH_SALT', 'g;e#[86722(]Oj(64nyw+eWN8Z5zed58QykPunm;E7(43T52v7ZS@6sb0W!E1;k5');
define('LOGGED_IN_SALT', '67A&I8KH@@;*1PE0A3O2(0z35/@0uR+2H8@*:@L3DY;/8h!h4*~yuzx!Fu|zlz2q');
define('NONCE_SALT', 'r]AN&b25|9C!n+/bscvK9mu-dj_CaUi-p1:yUO@px+K#xx&1(JYd0gCGn7k7*wH|');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'k7CijTSa_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
