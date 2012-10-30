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
use dNG\sWG\directOFormbuilder;
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

if (!defined ("CLASS_directOFormbuilderDatetime"))
{
/**
* This is the extended output class for displaying date and time fields on
* forms.
*
* @author     direct Netware Group
* @copyright  (C) direct Netware Group - All rights reserved
* @package    sWG
* @subpackage formbuilder
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/
class directOFormbuilderDatetime extends directOFormbuilder
{
/* -------------------------------------------------------------------------
Extend the class
------------------------------------------------------------------------- */

/**
	* Constructor (PHP5) __construct (directOFormbuilderDatetime)
	*
	* @since v0.1.00
*/
	public function __construct ()
	{
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -outputFormbuilder->__construct (directOFormbuilderDatetime)- (#echo(__LINE__)#)"); }

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
	* Format and return XHTML for a date input field.
	*
	* @param  array $f_data Array containing information about the form field
	* @return string Valid XHTML form field definition
	* @since  v0.1.00
*/
	public function entryAddDate ($f_data)
	{
		global $direct_cachedata,$direct_globals,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -outputFormbuilder->entryAddDate (+f_data)- (#echo(__LINE__)#)"); }

		$f_js_id = "swg_formbuilder_".$direct_cachedata['formbuilder_element_counter'];
		$direct_cachedata['formbuilder_element_counter']++;

		$f_js_helper = ($f_data['helper_text'] ? "\n<p class='pagehelperactivator'>".($direct_globals['output']->jsHelper ($f_data['helper_text'],$f_data['helper_url'],$f_data['helper_closing']))."</p>" : "");

		$f_return = "<tr>\n<td class='pageextrabg pageextracontent' style='width:25%;padding:$direct_settings[theme_form_td_padding];text-align:right;vertical-align:top'><strong>";
		if ($f_data['required']) { $f_return .= $direct_settings['swg_required_marker']." "; }

$f_return .= ($f_data['title'].":</strong></td>
<td class='pagebg pagecontent' style='width:75%;padding:$direct_settings[theme_form_td_padding];text-align:center;vertical-align:middle'><input type='date' name='$f_data[name]' value=\"$f_data[content]\" id='{$f_js_id}' /><script type='text/javascript'><![CDATA[
jQuery (function () { djs_run ({ func:'djs_formbuilder_init',params: { css_classes:'pagecontentinputtextnpassword',css_classes_replaced:'pagecontentselect',id:'$f_js_id',name:'$f_data[name]',type:'datepicker' } }); });
]]></script>".$f_js_helper."</td>\n</tr>");

		return $f_return;
	}

/**
	* Format and return XHTML for a time input field.
	*
	* @param  array $f_data Array containing information about the form field
	* @return string Valid XHTML form field definition
	* @since  v0.1.00
*/
	public function entryAddTime ($f_data)
	{
		global $direct_cachedata,$direct_globals,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -outputFormbuilder->entryAddTime (+f_data)- (#echo(__LINE__)#)"); }

		$f_js_id = "swg_formbuilder_".$direct_cachedata['formbuilder_element_counter'];
		$direct_cachedata['formbuilder_element_counter']++;

		$f_js_helper = ($f_data['helper_text'] ? "\n<p class='pagehelperactivator'>".($direct_globals['output']->jsHelper ($f_data['helper_text'],$f_data['helper_url'],$f_data['helper_closing']))."</p>" : "");

		$f_return = "<tr>\n<td class='pageextrabg pageextracontent' style='width:25%;padding:$direct_settings[theme_form_td_padding];text-align:right;vertical-align:top'><strong>";
		if ($f_data['required']) { $f_return .= $direct_settings['swg_required_marker']." "; }

$f_return .= ($f_data['title'].":</strong></td>
<td class='pagebg pagecontent' style='width:75%;padding:$direct_settings[theme_form_td_padding];text-align:center;vertical-align:middle'><input type='time' name='$f_data[name]' value=\"$f_data[content]\" id='{$f_js_id}' /><script type='text/javascript'><![CDATA[
jQuery (function () { djs_run ({ func:'djs_formbuilder_init',params: { css_classes:'pagecontentinputtextnpassword',css_classes_replaced:'pagecontentselect',id:'$f_js_id',name:'$f_data[name]',type:'timepicker' } }); });
]]></script>".$f_js_helper."</td>\n</tr>");

		return $f_return;
	}
}

/* -------------------------------------------------------------------------
Mark this class as the most up-to-date one
------------------------------------------------------------------------- */

define ("CLASS_directOFormbuilderDatetime",true);

//j// Script specific commands

global $direct_globals,$direct_settings;
$direct_globals['@names']['output_formbuilder'] = 'dNG\sWG\directOFormbuilderDatetime';
if (!isset ($direct_settings['theme_form_td_padding'])) { $direct_settings['theme_form_td_padding'] = "3px"; }
}

//j// EOF
?>