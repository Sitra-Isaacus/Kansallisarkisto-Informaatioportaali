<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hytedata_en3');

/** MySQL database username */
define('DB_USER', 'KAYTTAJATUNNUS');

/** MySQL database password */
define('DB_PASSWORD', 'SALASANA');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'r]~qj|c%)PiUsGP^pvStof7@C8ScbcrwB;bJB!lay`|hBZ|@|V3+DH9ojOQ}NrDi');
define('SECURE_AUTH_KEY',  'kII7$P@,0_L9wM.9}UmGK5@>N1b&a//;g]mD<C-_HotX/CLDDBgP/M:^Dq )@Y- ');
define('LOGGED_IN_KEY',    's$5y9xw$M@xbh;V0=6cUaKVGV,<]zpe40uJ9=_^s@oOyo.UfB~Ijbtl/h0?25$pU');
define('NONCE_KEY',        '7Sd5>Gx@y/Myp6u-?cf4n4?8Sonb0dcs0%-=N$Rj4r&:&,*U8i-`^+5g4{58> {G');
define('AUTH_SALT',        ':*s.Xzn+u->&X:LaN:2hjsPdvtNTkOEAK8+&,3#ctfLSzzLd,[d<kO&(q=K0b3p(');
define('SECURE_AUTH_SALT', 'cn 2O7-RAykTn.W<F>jSsIiPIYRV`.m;|j|q6nGr9l72m0yfQ(j@&O arZy!hgC~');
define('LOGGED_IN_SALT',   'q6Rj<|t9zA|qth2Xf#K-%nM!<kB0~_cqe0(j1vj[Iee/=5EE/][Ikx)d^;4U8`:-');
define('NONCE_SALT',       'wFpq$LR5Jt,2ybC?l<I,ZEC?S.DK3_r#RhMFvTV7l,3W/+dB;Q^F!xi<V )V[phY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'DOMAIN');
define('PATH_CURRENT_SITE', '/POLKU/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
