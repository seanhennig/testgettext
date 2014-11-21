<?php

Class indexController Extends baseController {

	public function index() {
		/*** set a template variable ***/
	        $this->registry->template->welcome = 'Hello and welcome to the admin interface for i18n';
	    /**
	     * read in the po  file and dump it
	     */
	     $handlePoFiles = new handlePoFiles('en_GB.uft8','default');
	     $dump = $handlePoFiles->readPoFile();
	     
	     $this->registry->template->pofiledump = var_dump($dump);
		/*** load the index template ***/
	     $this->registry->template->show('admin/index');
	}

}

?>
