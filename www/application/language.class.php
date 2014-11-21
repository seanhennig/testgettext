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

/**
 * handles the .po and .mo files
 * reads them and writes them and also compiles them to .mo files
 * 
 * @author sean
 */
class handlePoFiles  {
	/*
	 * @param string $lang
	 * @param string $domain
	 * @access public
	 */
	public $lang;
	public $domain;
	
	/*
	 * @param array $result
	 */
	// private $result;
	
	/**
	 * sets the default language set in config
	 * @param string $domain
	 */
	public function __construct($lang, $domain) {
		$this->lang = $lang;
		$this->domain = $domain;
	}
	
	function readPoFile() {
		$this->file = __LOCALE.$this->lang.'/'.$this->domain.'.po';
		
		/*
		$poparser = new PoParser();
		try {
			$result = $poparser->parseFile($this->file);
		} catch (\Exception $e) {
			$result = array();
			$this->fail($e->getMessage());
		}
		
		$this->assertCount(2, $result);
		*/
	}
	
	function writePoFile() {
	
	}
	
	function writeMoFile() {
	
	}
}
?>