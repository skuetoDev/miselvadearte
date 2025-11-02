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
define( 'DB_NAME', 'pruebawordpres' );

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
define( 'AUTH_KEY',         '!6x(%}.f$*= ba+G8,OL#w_nxj#&%t;&6/Xc1E0rI-#,$wd.KI<6:El;m5#+#RVM' );
define( 'SECURE_AUTH_KEY',  'o[6=)+Vv:?f!W!ZEWF~JI{0[wv4]=O$KvDF2Q?XI`Lmh #xMdsR_;PEa;:V*C=Aj' );
define( 'LOGGED_IN_KEY',    '8R1$j70K[*D87;)5>cK_5YJGhR%(_[{tFjL0kMFn80RkYyVp^|q|~h-]2e:3z5(b' );
define( 'NONCE_KEY',        'Aq$m5WlhC_{?0G*JF~b]/1i~5^bPf8.aI22:YO>PF/GJf`yC=Wwk!ZU4R|RI~?z?' );
define( 'AUTH_SALT',        'G^C!sVoC#wQg4*DlU?&M<|=xF@nh1|29O6aL[2jc;+M65n#,8[FAT|Uf[UVJVMV4' );
define( 'SECURE_AUTH_SALT', 'exH@]arGF0pn=a].c[j~><CDF!>>Ji:$ D$C@|)dYuWkh5T&R7H$eg8usuWqGLn|' );
define( 'LOGGED_IN_SALT',   'nT*f=-BFgx)YV6}Fq`h<Oepju_q=8{`t}i*1B|ea5/>*lzWc=U?;~Ajm=!S@[d*8' );
define( 'NONCE_SALT',       'bdTX7!M#9:!>OMDxXtW.E=`hJgp/RQ7;-+On[I/ KrhN4v;<kslxZ8/H]&hX6#iL' );

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



define( 'WP_MEMORY_LIMIT', '512M' );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
