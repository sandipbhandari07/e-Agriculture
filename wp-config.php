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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'farmer' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '(^I0b$ltyF,n}l=OOo`2y2~j[>{&$0}]K*inH|o;[-IzJf^|wbh3Ca.XFXHM -Wf' );
define( 'SECURE_AUTH_KEY',  'l,:.GJcSEwi.gP|u#0CS&]VNs6N]y!-<j}ikwuoA5_vLib5J$D8Z[*E`GX5J&0q ' );
define( 'LOGGED_IN_KEY',    '9^f9zJ_y(9$YsVm`(5Ob-Rx-]8&Dri2LdYs.~VFiiuaFqLIvjj6xW@vj! w^vs5E' );
define( 'NONCE_KEY',        '/9G4WLJB!eEpznW EniIllv5S*m0/lw:X1iy,ICvl?3*1qD.:c^#B[7p08(VRMEo' );
define( 'AUTH_SALT',        'e1h6:;S<)=E~@I|B~K@Vl*sMe`jk%Hjc8cI;[DEd!R^$c9tj!tvYB0vr%BO.yK=F' );
define( 'SECURE_AUTH_SALT', 'pjaoTJ}qD&!be@B0l>n.FT<:$#nuU|u6aLonLRa-y9WscyD5{^-kNVdC5]2GIj#9' );
define( 'LOGGED_IN_SALT',   'X{<46_7  FnkKtJAr#:A/(*:h;hvd|L9*#%XAI:;|>j|3I,SXlw43j#HEdD+63h0' );
define( 'NONCE_SALT',       '_k$Vw1%uIP~,Wjap&]L9t{k9t..6^nrk/_:ZX.3`_amb%}SZ+pRbpKp5&d&gdC@{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
