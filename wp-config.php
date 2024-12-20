<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'izi' );

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
define( 'AUTH_KEY',         '!FPv<WEBnPHt:UI-YY1A<(_| Mn.W,BccI?:p{#$XO#$ }`Z&XB;]=yD+ej#zQ~e' );
define( 'SECURE_AUTH_KEY',  '7m$qBDSo,|nxm>^h8{yw,fu!3ug9Wvl k#5KK~|xE1bg;KOfm_;3z!6i@xXWH8,>' );
define( 'LOGGED_IN_KEY',    'WDl/l;aewwCYr^t&xL1zJ$WE]ESr9q$VH-d%jkPN(%pS$<znr0OlGf3wIce>9DV0' );
define( 'NONCE_KEY',        'x;j_H+@GE!B+L:N(7VnV$5RS5!15Fng:Rm:)3dgGSO-aZn2$Dd^dG2Sh2biK<%@u' );
define( 'AUTH_SALT',        '$uE~xg^#jQE0fTZlmyBQ`:O=nQ&_(Zp%lfLa&/f[d4QIO(MJ/`oV&mKFa/)53KhW' );
define( 'SECURE_AUTH_SALT', 'hs0^QjWz$Iw~!wN)54gAGL){i$8QR~t}wg}nRE6dl&-RF8+ZMbFx=chO$taSt%:m' );
define( 'LOGGED_IN_SALT',   '+^,)CRNE437woxrR.T=I#*o_Bfpl%+!Rg%K1.iRAo@TI%n%lpDqA`sjrf,FmqVLj' );
define( 'NONCE_SALT',       '{a<BrwiF1[Os?bHMP+wg;lPyQzefOCy|DL~7o]K7cw;kw]#!F/1KV>azf~Y{(LWG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
