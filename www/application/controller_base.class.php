<?php
/**
 *
 * @author sean
 *
 * this defines the structure of all conrotllers
 * by including the registry here it is available
 * to all classes that extend from here
 */
Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;

function __construct($registry) {
	$this->registry = $registry;
}

/**
 * @all controllers must contain an index method
 */
abstract function index();
}

?>
