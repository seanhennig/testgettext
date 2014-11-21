<?php
/**
 * Configuration file
 *
 * Contains all constants, paths and configurations used by the PHP scripts
 *
 * @author Sean Hennig <mail@sean.hennig.de>
 * @version 1.0
 */

/**
 * database access
 */
define('__DBHOST','localhost');
define('__DB','openpetition');
define('__DBUSER','openpetition');
define('__DBPASS','s000s1ch3r');

/**
 * default language
 */
define ('__DEFAULTLANGUAGE', 'de_DE.utf8');

/**
 *  define the site path's constants 
 */
$site_path = $_SERVER['DOCUMENT_ROOT'];
define ('__SITE_PATH', $site_path);
define('__TEMPLATE_PATH', __SITE_PATH . '/views/');
define ('__LOCALE', $site_path . '/config/Locale/');
define ('__APPLICATION_PATH', $site_path . '/application/');

/*** include the controller class ***/
include __APPLICATION_PATH . 'controller_base.class.php';

/*** include the registry class ***/
include __APPLICATION_PATH . 'registry.class.php';

/*** include the router class ***/
include __APPLICATION_PATH . 'router.class.php';

/*** include the template class ***/
include __APPLICATION_PATH . 'template.class.php';

/*** include the language class ***/
include __APPLICATION_PATH . 'language.class.php';


/*** auto load model classes ***/
function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
    include ($file);
}

/*** a new registry object ***/
$registry = new registry;
?>
