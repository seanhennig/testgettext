<?php
/**
 * This class manages gettext, internationalization (I18n) and everything to do with language
 * 
 * @author sean
 */
class setLanguage {
	/*
	* @param string $lang
 	* @param string $domain
	* @access public
	*/
	public $lang;
	public $domain;
	
	/**
	 * sets the default language set in config
	 * @param string $domain
	 */
	public function __construct($domain) {
		$this->lang = __DEFAULTLANGUAGE;
		$this->domain = $domain;
	}
	
	/**
	 * checks, if there was a language set via get and sets that, if it exists
	 */
	public function set() {
		if (isset($_GET['language'])) {
			if (is_dir(__LOCALE . $_GET['language'])) {
				$this->lang = $_GET['language'];
			}
		}
		
		setlocale (LC_ALL, null);
		putenv("LANG=".$this->lang);
		putenv("LANGUAGE=".$this->lang);
		setlocale(LC_ALL, $this->lang);
		$langfolderpath = __LOCALE;
		bindtextdomain($this->domain, $langfolderpath);
		textdomain($this->domain);
	}
}
?>