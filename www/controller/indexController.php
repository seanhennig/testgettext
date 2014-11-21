<?php

Class indexController Extends baseController {

	public function index() {
		/*** set a template variable ***/
	        $this->registry->template->welcome = 'Hello and welcome';
		/*** load the index template ***/
	        $this->registry->template->show('index');
	}

}

?>
