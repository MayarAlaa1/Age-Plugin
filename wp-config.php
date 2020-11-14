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
define( 'AUTH_KEY',         'm/3u{m, K~.*%CW@BjC_,*TDn{*P6I2*bU~I7V4vw&V~VRok3mgOB7&/<tQ^$Bfn' );
define( 'SECURE_AUTH_KEY',  'WO*2Z6,{]dv!u!yAqoYOD(aS_of()+S^+N#{VV4-bh+S>M29vC5;J~Xb%?Cfp-MD' );
define( 'LOGGED_IN_KEY',    ',G <T?4jT!nGrTxZ[ClWX&YlkwN<o9N01;!Ai,C^YZb$LG}p_@7m{EMzr+@286)z' );
define( 'NONCE_KEY',        '+[VCU)3b3B7X,Sr?vl9GZ{N2?,>%7t{0dA`<{V!{p.HY>73z|B^||-(HSK^.(n>!' );
define( 'AUTH_SALT',        '}x8T8W:m6cDG4kVEimpq-~q!2#)~Td8rP6v4.UYwM1sSfn>1/:?71QS>ZEwfw;<j' );
define( 'SECURE_AUTH_SALT', ':S@o(z/Fw7+)f]v}Icn@6@Rl9d5spJ,=uj<[t*[4jz]ZZM.LbRqXgTL-s{n0yFmM' );
define( 'LOGGED_IN_SALT',   'sv,rq/Rh<J(iRwbjWWM)Y2/O/(ZVonhEY,Yd*hL*#]VQgAd8<Ho&-YV9vpFAP~#B' );
define( 'NONCE_SALT',       'PlR^,IZK~ei(ojS{B7.Lkx:S}f?q$5-+{q7!5s&VlNhq[(#9/L)~E}p8tw`6[q{C' );

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
