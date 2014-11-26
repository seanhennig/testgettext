<?php

Class indexController Extends baseController {

	public function index() {
		/*** set the template variables ***/
	        $this->registry->template->welcome = 'Hello and welcome to the admin interface for i18n';
	        
	    /**
	     * read in the po  file and create output for the edit form
	     */
	     $handlePoFiles = new handlePoFiles('de_DE.utf8','default');
	     $poData = $handlePoFiles->readPoFile();
	     
	     $prettyData = '';
	     foreach ($poData as $k => $v)  {
	     	$prettyData .= '<form><tr>';
	     	/**
	     	 *  get the  tag name
	     	 */
	     	$prettyData .= "<td>$k</td>\n";
	     	/**
	     	 * get the translation string
	     	 */
	     	if (isset($v["msgstr"]) && $v["msgstr"][0] != '') {
	     		$prettyData .= "<td>";
		     	for ($i=0;$i<count($v["msgstr"]);$i++) {
		     		$prettyData .= "<input type='text' name='${k}_msgsstr_$i' value='".$v["msgstr"][$i]."' />\n";
		     	}
		     	$prettyData .= "</td>";
	     	} else {
	     			$prettyData .= "<td><input type='text' name='${k}_msgsstr_$i' value='' /></td>\n";;
	     	}
	     	/**
	     	 * and the comment
	     	 */
	     	if (isset($v["tcomment"]))  { 
	     		for ($i=0;$i<count($v["tcomment"]);$i++) {
	     			$prettyData .= "<td>$i: ".$v["tcomment"][$i]."</td>\n";
	     		}
	     	} else {
	     		$prettyData .= "<td>Kein  Kommentar bisher</td>\n";
	     	}
	     	/**
	     	 * and the reference (added by poedit automatically)
	     	 */
	     	if (isset($v["reference"]))  { 
		     	for ($i=0;$i<count($v["reference"]);$i++) {
		     		$prettyData .= "<td>$i: ".$v["reference"][$i]."</td>\n";
		     	}
	     	} else {
	     		$prettyData .= "<td>Keine Referenz bisher</td>\n";
	     	}
	     	$prettyData .= "<td><input type='submit' value='speichern'></td>\n";
	     	$prettyData .= "</tr></form>\n";
	     }
	     $this->registry->template->pofiledump = $prettyData;
	     
		/*** load the index template ***/
	     $this->registry->template->show('admin/index');
	}
	
	function createTableInput ($parentname, $parent, $fieldtype) {
		$fieldstring = '';
		if (isset($parent[$fieldtype]) && $parent[$fieldtype][0] != '') {
			$prettyData .= "<td>";
			for ($i=0;$i<count($parent[$fieldtype]);$i++) {
				$prettyData .= "<input type='text' name='${parentname}_${fieldtype}_$i' value='".$parent["$fieldtype"][$i]."' />\n";
			}
			$prettyData .= "</td>";
		} else {
			$prettyData .= "<td><input type='text' name='${parentname}_${fieldtype}_$i' value='' /></td>\n";;
		}
		return $fieldstring;
	}

}

?>
