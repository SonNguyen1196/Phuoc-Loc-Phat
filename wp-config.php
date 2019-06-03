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
define( 'DB_NAME', 'plp_bds' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'tQF:xRs6L4^8v,&0yaE7Ml._br;=::NsEv]=OZ%;m7PDf4<bbz]CSy%1C21],F^B' );
define( 'SECURE_AUTH_KEY',  'OOK,9T5N`7!im`ywo_C3Y;Vk5<Yr[UV^[Cm/CRwgL)2(YS%|<>G.xW(O6BO-1=g(' );
define( 'LOGGED_IN_KEY',    'U#HKlyR7N9`-5N,Sz]l~ZETCP/Lb68YFABb?6=lroWTBYUF*n&c|8{(p1Yw8s(W%' );
define( 'NONCE_KEY',        '_9II|VPq1F C0Wv>)P.Js8A_sqxi_|:%BXHAmV}L5wD=)?(><Nss(T2nz<?hRS`p' );
define( 'AUTH_SALT',        ')EgqAA?z@RtObtM9~7Px]KUh@FiWOC+LJl,lg&JTW-2(GQ2=<~+GWl`Dbf#gtnmh' );
define( 'SECURE_AUTH_SALT', '&NG,d6${ZIFbyzP~?)y`CqWwkx/G%YM3H /pY$w;<?LS%KR!D5+2{k3>iv^OdM5T' );
define( 'LOGGED_IN_SALT',   '*dU^7tubAIG9@>8~s`Ej2MzLkX{`eGtDA*Bz <3gq=^j*)_(IeFzdQ0)RO/Y$RAK' );
define( 'NONCE_SALT',       'Tx/&~ )N$TD=qdi$5Put,tb{J>Anrv(zPIZ0Etw<n#L3.dsgAn*t9HX+i&W~6|3X' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'plp_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
