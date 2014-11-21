<?php
/**
 * index.php, the i18n - admin starting page
 * it handles the .po and .mo files 
 * and offers translation interfaces for tranlators
 *
 * Functions of this admin interface:
 * - user login
 * - user administration for admin user
 * - read in .po files
 * - generate .po files and compile them to .mo files and commit them 
 *   to the github branch and send a push request to openpetition
 * - translating interface:
 * 		- user language(s) is/are set by admin user
 * 		- if user has more than one language s/he can translate to: s/he can swap between them
 * 		- nice to have: preview of the openpetiton site with the new .po 
 * 		  file would be grand, but also a whole lot of work
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

/*
 * load the router
 */
$registry->router = new router($registry);

/**
 * set the controller path 
 */
$registry->router->setPath (__SITE_PATH . '/controller/admin');

/**
 * load up the template
*/
$registry->template = new template($registry);

/**
* load the controller
*/
$registry->router->loader();

?>