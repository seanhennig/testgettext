<?php

Class indexController Extends baseController {

	public function index() {
		/*** set a template variable ***/
	        $this->registry->template->welcome = 'Hello and welcome';

	        $templateString = file_get_contents(__SITE_PATH.'/test.html');
	        $this->registry->template->mailstring = $this->addTranslation($templateString);
	        
		/*** load the index template ***/
	        $this->registry->template->show('index');
	}
	
	function addTranslation ($stringtotranslate) {
		// preg_match_all('/_\("(.*?)"\)_/i', $stringtotranslate, $matches);
		preg_match_all('/_\("(.*?)"\)_/i', $stringtotranslate, $matches);
		foreach ($matches[1] as $v) {
			$stringtotranslate = preg_replace ("/_\(\"$v\"\)_/", _($v), $stringtotranslate);
		}
		return $stringtotranslate;
	}

}

?>
