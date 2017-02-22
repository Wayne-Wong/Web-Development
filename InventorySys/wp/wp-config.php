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
define('DB_NAME', 'chingkwa_wp487');

/** MySQL database username */
define('DB_USER', 'chingkwa_wp487');

/** MySQL database password */
define('DB_PASSWORD', '0!MNS(PF54');

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
define('AUTH_KEY',         'ljfmzc4incigtoinraa4qsc1dpvm5bgau8r5mrrat0ktsb1bshkhcpeybljptdmr');
define('SECURE_AUTH_KEY',  'rj3zgxwoijoy4jzozrtrhjprjh4awdwnzfggfcrgm0a43nix6sudcoupxh6no1uc');
define('LOGGED_IN_KEY',    'kmfrsd5qb7pg9cz9p51iqedi6xqviyfkadacroi3tbxx9tmd7gxeau0qgvifry6g');
define('NONCE_KEY',        'hztipse100adgxqi8xmyu7a66bkvlykvtnh7aouqrgtxljiwemskrek32erzyqdp');
define('AUTH_SALT',        '0scypxddgf7iolzesmc1ixr0ztu1udf99ocbd0xxqx7nx2n4jpl5rlkkn9zffmf8');
define('SECURE_AUTH_SALT', 'eeifltbbvhdn3oag66omp6gsmchgbjclv92dzsn7rq5nnmlmgregghfu90jtyf6k');
define('LOGGED_IN_SALT',   'nwbyf5kf59x2pqawfzjpdeq5kaq0hsgtx1vvumujvy1kg4mfha3wkyqnzs16q9ln');
define('NONCE_SALT',       'xwns4mxrmevo2jsqyosyrx0x0rftkm2pn8p3fnkonyhu6gaiid2fojejnbjd5sfg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpho_';

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
