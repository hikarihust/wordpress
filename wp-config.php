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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'm6(niKjWr~/DR4iVxsl8=vX*i}4-]+5.kt|[tPZ|tV)wA}-WJh#lz1#uoHVWR(>%' );
define( 'SECURE_AUTH_KEY',  'ArD_:3zbN87l=.H`HkN|eUAEHidy!ua`#fjqD5HHhq6!ns>@C*6O]&Jv_Ol26(>q' );
define( 'LOGGED_IN_KEY',    'yCk *QT&x2wA|8/=<_6qiBYUI@+oe hsyuXc9By~Y}EC*2IrT?eXN=pb6x}ulFHX' );
define( 'NONCE_KEY',        ')R<aJ/PUN`[-0Gt{TOA@`bgUrqAp<7j@!9PR@4tBkLdsaZ*Xz@UPe~3Vii3eMuB#' );
define( 'AUTH_SALT',        'A:QA3QQw` B:soDkynbI.]X @3_v%MFe6CVGL~#me<qKS,1T5coz?q(0<!jJpzt`' );
define( 'SECURE_AUTH_SALT', '>e+RTeWD~?u}b3t.gFdJW1`A|gHtLOX+$M0o:EVZI5(!zVV}OrFKbbeKzLmNf}*S' );
define( 'LOGGED_IN_SALT',   '5%P$l:cdip48`KNYUM`{iCd[HuFSsa2 Q,Ep_S/w#%X|uL/JSm7+P%l](0%BHv7z' );
define( 'NONCE_SALT',       'H(Q&$kQ7z*)0]N1Dy5hFeEio?8b|> 1J3)yWkadoDJG1D4emZq7)X;bmy8sDq:*U' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
