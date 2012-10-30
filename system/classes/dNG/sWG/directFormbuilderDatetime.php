<?php
//j// BOF

/*n// NOTE
----------------------------------------------------------------------------
secured WebGine
net-based application engine
----------------------------------------------------------------------------
(C) direct Netware Group - All rights reserved
http://www.direct-netware.de/redirect.php?swg

The following license agreement remains valid unless any additions or
changes are being made by direct Netware Group in a written form.

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by the
Free Software Foundation; either version 2 of the License, or (at your
option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
more details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc.,
59 Temple Place, Suite 330, Boston, MA 02111-1307, USA.
----------------------------------------------------------------------------
http://www.direct-netware.de/redirect.php?licenses;gpl
----------------------------------------------------------------------------
#echo(sWGformbuilderDatetimeVersion)#
sWG/#echo(__FILEPATH__)#
----------------------------------------------------------------------------
NOTE_END //n*/
/**
* FormBuilder extended with an date and time interface.
*
* @internal   We are using phpDocumentor to automate the documentation process
*             for creating the Developer's Manual. All sections including
*             these special comments will be removed from the release source
*             code.
*             Use the following line to ensure 76 character sizes:
* ----------------------------------------------------------------------------
* @author     direct Netware Group
* @copyright  (C) direct Netware Group - All rights reserved
* @package    sWG
* @subpackage formbuilder
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/

/*#ifdef(PHP5n) */

namespace dNG\sWG;
/* #*/
/*#use(direct_use) */
use dNG\sWG\directFormbuilder;
/* #\n*/

/* -------------------------------------------------------------------------
All comments will be removed in the "production" packages (they will be in
all development packets)
------------------------------------------------------------------------- */

//j// Basic configuration

/* -------------------------------------------------------------------------
Direct calls will be honored with an "exit ()"
------------------------------------------------------------------------- */

if (!defined ("direct_product_iversion")) { exit (); }

//j// Functions and classes

if (!defined ("CLASS_directFormbuilderDatetime"))
{
/**
* FormBuilder extended with an date and time interface.
*
* @author     direct Netware Group
* @copyright  (C) direct Netware Group - All rights reserved
* @package    sWG
* @subpackage formbuilder
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/
class directFormbuilderDatetime extends directFormbuilder
{
/* -------------------------------------------------------------------------
Extend the class
------------------------------------------------------------------------- */

/**
	* Constructor (PHP5) __construct (directFormbuilderDatetime)
	*
	* @since v0.1.00
*/
	public function __construct ()
	{
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder->__construct (directFormbuilderDatetime)- (#echo(__LINE__)#)"); }

/* -------------------------------------------------------------------------
My parent should be on my side to get the work done
------------------------------------------------------------------------- */

		parent::__construct ();

/* -------------------------------------------------------------------------
Informing the system about available functions
------------------------------------------------------------------------- */

		$this->functions['entryAddDate'] = true;
		$this->functions['entryAddTime'] = true;
	}

/**
	* Creates a form field where the user should enter a valid date and checks the
	* input.
	*
	* @param  string $f_name Internal name of the form field
	* @param  string $f_title Public title for the form field
	* @param  boolean $f_required True if the field is required to continue
	* @param  string $f_helper_text Contains a text that will be displayed to
	*         aid the user in filling out the field
	*
	* @param  string $f_helper_url Links the whole help box to a given URL
	* @param  boolean $f_helper_closing True if the help window should be
	*         minimized after loading the page
	* @return boolean False if the content was not accepted
	* @since  v0.1.00
*/
	public function entryAddDate ($f_entry)
	{
		global $direct_cachedata;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddDate (+f_entry)- (#echo(__LINE__)#)"); }

		$f_entry = $this->entryDefaultsSet ($f_entry,"","",NULL);

		if ((!$f_entry['required'])&&(!isset ($f_entry['content'])))
		{
			$direct_cachedata["i_".$f_entry['name']] = $direct_cachedata['core_time'];
			$f_entry['content'] = gmdate ("Y-m-d",$direct_cachedata['core_time']);
		}
		elseif (is_numeric ($f_entry['content']))
		{
			$direct_cachedata["i_".$f_entry['name']] = $f_entry['content'];
			$f_entry['content'] = gmdate ("Y-m-d",$f_entry['content']);
		}
		elseif (preg_match ("#^(\d{4})\-(\d{1,2})\-(\d{1,2})$#",$f_entry['content'],$f_result_array)) { $direct_cachedata["i_".$f_entry['name']] = gmmktime (0,0,0,$f_result_array[2],$f_result_array[3],$f_result_array[1]); }
		else { $f_entry['error'] = "format_invalid"; }

		$this->entrySet ("date",$f_entry);

		if ($f_entry['error']) { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddDate ()- (#echo(__LINE__)#)",:#*/false/*#ifdef(DEBUG):,true):#*/; }
		else { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddDate ()- (#echo(__LINE__)#)",:#*/true/*#ifdef(DEBUG):,true):#*/; }
	}

/**
	* Creates another form field to define a time and checks it.
	*
	* @param  string $f_name Internal name of the form field
	* @param  string $f_title Public title for the form field
	* @param  boolean $f_required True if the field is required to continue
	* @param  string $f_helper_text Contains a text that will be displayed to
	*         aid the user in filling out the field
	*
	* @param  string $f_helper_url Links the whole help box to a given URL
	* @param  boolean $f_helper_closing True if the help window should be
	*         minimized after loading the page
	* @return boolean False if the content was not accepted
	* @since  v0.1.00
*/
	public function entryAddTime ($f_entry)
	{
		global $direct_cachedata;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddTime (+f_entry)- (#echo(__LINE__)#)"); }

		$f_entry = $this->entryDefaultsSet ($f_entry,"","",NULL);

		if ((!$f_entry['required'])&&(!isset ($f_entry['content'])))
		{
			$direct_cachedata["i_".$f_entry['name']] = $direct_cachedata['core_time'];
			$f_entry['content'] = gmdate ("H:i",$direct_cachedata['core_time']);
		}
		elseif (is_numeric ($f_entry['content']))
		{
			$direct_cachedata["i_".$f_entry['name']] = $f_entry['content'];
			$f_entry['content'] = gmdate ("H:i",$f_entry['content']);
		}
		elseif (preg_match ("#^(\d{1,2}):(\d{2})(:\d+\.\d+|:\d+|)$#",$f_entry['content'],$f_result_array))
		{
			$f_hours = $f_result_array[1];
			$f_minutes = $f_result_array[2];
			$f_seconds = ((($f_result_array[3])&&(preg_match ("#^:(\d+)(\.\d+|)$#",$f_result_array[3],$f_result_array))) ? 0 : $f_result_array[1]);

			$direct_cachedata["i_".$f_entry['name']] = gmmktime ($f_hours,$f_minutes,$f_seconds,1,1,1970);
		}
		else { $f_entry['error'] = "format_invalid"; }

		$this->entrySet ("time",$f_entry);

		if ($f_entry['error']) { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddTime ()- (#echo(__LINE__)#)",:#*/false/*#ifdef(DEBUG):,true):#*/; }
		else { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder->entryAddTime ()- (#echo(__LINE__)#)",:#*/true/*#ifdef(DEBUG):,true):#*/; }
	}

/**
	* Parses all previously defined form fields, checks them and returns an array
	* ready for output.
	*
	* @param  boolean $f_check True if all fields should be checked (result will
	*         be stored in $this->check_result).
	* @return array Array of form fields ready for output
	* @since  v0.1.00
*/
	/*#ifndef(PHP4) */public /* #*/function formGet ($f_check = false)
	{
		global $direct_globals;

		if (!isset ($direct_globals['@names']['output_formbuilder'])) { $direct_globals['basic_functions']->includeClass ('dNG\sWG\directOFormbuilderDatetime',2); }
		return parent::formGet ($f_check);
	}
}

/* -------------------------------------------------------------------------
Mark this class as the most up-to-date one
------------------------------------------------------------------------- */

define ("CLASS_directFormbuilderDatetime",true);

//j// Script specific commands

global $direct_globals;
$direct_globals['@names']['formbuilder'] = 'dNG\sWG\directFormbuilderDatetime';
}

//j// EOF
?>