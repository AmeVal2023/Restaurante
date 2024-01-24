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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'restaurante' );

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
define( 'AUTH_KEY',         'kJCI,Yvs)x}M.fQ2~GcEZ^Q)mi>ubPMCofsaz,J+@++F9RRJX~vDF&(x^].jg.KB' );
define( 'SECURE_AUTH_KEY',  '$GKSz*.^xt0q+/?=~kqA!2R|kE&a-EW=/r0V^bxk3mki`x+zO}GnIoBmw4WW-v4p' );
define( 'LOGGED_IN_KEY',    'Tw(n1U 6Mes!ny3.}|P%:ns}6_PC*dWYh|??l-H_d.3KUQX%6JR}zj4-J<!`TS8}' );
define( 'NONCE_KEY',        '8BI-Bi$^^~J2[(LCV_|uIqBs#_%<dD)~xL{P_3VVL9qK<VIsI^R 5S@vMxGAr[N8' );
define( 'AUTH_SALT',        'swt8gCkb!5j;/8bI?Voz.Gj[uLimPUrq8Y:Cjj<,1ut{|Gvki}C;Q`}VjK7lGu-#' );
define( 'SECURE_AUTH_SALT', 'qTfK5lYAs1#s raM|s2!nW8qOLnX>#8|(:8g3,4xMFqH:FLzb9..aGTObqO{@H?,' );
define( 'LOGGED_IN_SALT',   '/.*~OWTg{x$e`pDRL?^[,fa7n~zY($pQ|@+d)oJ,Z,:;^t]Bm{_~=pX[Yq%MQ3L}' );
define( 'NONCE_SALT',       '*Py&|1OkJpFq,JJ|Y U=f*8-S@Szn.=SHA0&=>UG^B|e~s4D.e#+`QzYG9m5+;84' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
