<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/homepages/2/d406237922/htdocs/techno/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'db415688671');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'dbo415688671');
 
/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Yohagopasta13');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'db415688671.db.1and1.com');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'H*|wl36a>T~Fs}^/G;9<4{v*k(pQK+y(Oep`:1K+k@-Mi.opf;lAcbnS}C;/P{ot');
define('SECURE_AUTH_KEY', '$xj3tQe:J7F-g!T<Y8Ux@}Y]m6||1VPS=.8Ir74E*B#=>w0b#@N-H<EBwE*YC*lW');
define('LOGGED_IN_KEY', 'UH+uw?=<nI6hPi $4AHC*d[6)<,nf2fd*,L?c+)raf$$con[8o=CYoGJL|50]iLd');
define('NONCE_KEY', '9u+Y:|hvrH|PK+9=OcTig=R=p~A-U$;OA-+_skrrJ:St_zU$|>#=c|aYha8>WEZg');
define('AUTH_SALT', '^9Cen@$Wtu-aF.l;a_kPEk$+bnx iUz=bId5 @Y=d7.(6,sQ9Q/%3gSMZ&<+x4l!');
define('SECURE_AUTH_SALT', 'sdANR6/?^0?Rm5;6-bqEe&|[EBr G~T[b9]G;}L1+sCzf-/d-?9O$~H,0!-HI#[g');
define('LOGGED_IN_SALT', 'U*6%z/7R>~Mle7f+7=G+|:9^i];Ea4NaRBq1j]k-(k`3SB<{^>vEVNm*`m3*{7N-');
define('NONCE_SALT', 'Q=I(INafl:fs#[ZuBi,+ :aschF<+Sa(U.?}o.ozR ,[E_rQ1=n6>D||MsXs.aNN');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

