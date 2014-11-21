<?php
/**
 * index.php, the mvc starting page
 * this test environment shows how to work with
 * mvc, templates & gettext for internationalilzation
 *
 * @author sean
 */

/*
 * for testing, comment in when done with that
 */
error_reporting(E_ALL);
ini_set('display_errors',1);

/*
 * include the config file
 * edit it on a different system
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

/**
 * set the language for gettext
 * the .mo file that has been compiled for the set language is the one that will be used.
 * If that language doesn't exist, German is going to be the default language
 * The language cann be changed via settung the GET parameter 'language'.
 * 
 * setLanguage takes one parameter, the domain. That refers directly to the .mo file, 
 * that must have the same name as the domain. 
 * If the file is called default.mo the domain is called default.
 * 
 * We should maybe use two domains later on, one for mail and one for web
 */
// possible languages for testing: de_DE.uft8, en_GB.utf8 and es_ES.utf8
$setlanguage = new setLanguage('default');
$setlanguage->set();

/*
 * load the router
 */
$registry->router = new router($registry);

/**
 * set the controller path 
 */
$registry->router->setPath (__SITE_PATH . '/controller');

/**
 * load up the template
*/
$registry->template = new template($registry);

/**
* load the controller
*/
$registry->router->loader();

?>
