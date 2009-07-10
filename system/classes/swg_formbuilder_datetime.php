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
* @uses       direct_product_iversion
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/

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

/* -------------------------------------------------------------------------
Testing for required classes
------------------------------------------------------------------------- */

$g_continue_check = true;
if (defined ("CLASS_direct_formbuilder_datetime_extended")) { $g_continue_check = false; }
if (!defined ("CLASS_direct_formbuilder")) { $direct_classes['basic_functions']->include_file ($direct_settings['path_system']."/classes/swg_formbuilder.php"); }
if (!defined ("CLASS_direct_formbuilder")) { $g_continue_check = false; }

if ($g_continue_check)
{
//c// direct_formbuilder_datetime_extended
/**
* FormBuilder extended with an date and time interface.
*
* @author     direct Netware Group
* @copyright  (C) direct Netware Group - All rights reserved
* @package    sWG
* @subpackage formbuilder
* @uses       CLASS_direct_formbuilder
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/
class direct_formbuilder_datetime_extended extends direct_formbuilder
{
/* -------------------------------------------------------------------------
Extend the class
------------------------------------------------------------------------- */

	//f// direct_formbuilder_datetime_extended->__construct ()
/**
	* Constructor (PHP5) __construct (direct_formbuilder_datetime_extended)
	*
	* @uses  USE_debug_reporting
	* @since v0.1.00
*/
	public function __construct ()
	{
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder_class->__construct (direct_formbuilder_datetime_extended)- (#echo(__LINE__)#)"); }

/* -------------------------------------------------------------------------
My parent should be on my side to get the work done
------------------------------------------------------------------------- */

		parent::__construct ();

/* -------------------------------------------------------------------------
Informing the system about available functions
------------------------------------------------------------------------- */

		$this->functions['entry_add_date'] = true;
		$this->functions['entry_add_time'] = true;
	}

	//f// direct_formbuilder_datetime_extended->entry_add_date ($f_name,$f_title,$f_required = false,$f_helper_text = "",$f_helper_url = "",$f_helper_closing = true)
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
	* @uses   USE_debug_reporting
	* @return boolean False if the content was not accepted
	* @since  v0.1.00
*/
	public function entry_add_date ($f_name,$f_title,$f_required = false,$f_helper_text = "",$f_helper_url = "",$f_helper_closing = true)
	{
		global $direct_cachedata,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_date ($f_name,$f_title,+f_required,$f_helper_text,$f_helper_url,+f_helper_closing)- (#echo(__LINE__)#)"); }

		$f_error = "";

		if (isset ($direct_cachedata["i_0_".$f_name],$direct_cachedata["i_1_".$f_name],$direct_cachedata["i_2_".$f_name]))
		{
			preg_match ("#^(\d{1,2})$#i",$direct_cachedata["i_0_".$f_name],$f_day_array);
			preg_match ("#^(\d{1,2})$#i",$direct_cachedata["i_1_".$f_name],$f_month_array);
			preg_match ("#^(\d{1,4})$#i",$direct_cachedata["i_2_".$f_name],$f_year_array);

			if (empty ($f_day_array)) { $f_error = "format_invalid"; }
			elseif (empty ($f_month_array)) { $f_error = "format_invalid"; }
			elseif (empty ($f_year_array)) { $f_error = "format_invalid"; }
			else
			{
				$f_format_array = preg_split ("#\W#",(direct_local_get ("datetime_shortdate")));

				foreach ($f_format_array as $f_element)
				{
					if (($f_element == "d")||($f_element == "j")) { $direct_cachedata["i_0_".$f_name] = $f_day_array[1]; }
					if (($f_element == "m")||($f_element == "n")) { $direct_cachedata["i_1_".$f_name] = $f_month_array[1]; }
					if (stristr ($f_element,"y")) { $direct_cachedata["i_2_".$f_name] = $f_year_array[1]; }
				}
			}

			$direct_cachedata["i_".$f_name] = $direct_cachedata["i_0_".$f_name].".".$direct_cachedata["i_1_".$f_name].".".$direct_cachedata["i_2_".$f_name];
		}
		else
		{
			if ((!isset ($direct_cachedata["i_".$f_name]))||(!$direct_cachedata["i_".$f_name])) { $direct_cachedata["i_".$f_name] = $direct_cachedata['core_time']; }

			$f_datetime = gmdate ("d.m.Y",$direct_cachedata["i_".$f_name]);
			$f_datetime_array = explode (".",$f_datetime);
			$direct_cachedata["i_0_".$f_name] = $f_datetime_array[0];
			$direct_cachedata["i_1_".$f_name] = $f_datetime_array[1];
			$direct_cachedata["i_2_".$f_name] = $f_datetime_array[2];

			$direct_cachedata["i_".$f_name] = $f_datetime;
		}

		$f_form_id = md5 ("i_".$f_name);

$this->form_cache[$f_form_id] = array (
"type" => "date",
"name" => $f_name,
"title" => $f_title,
"required" => $f_required,
"helper_text" => $f_helper_text,
"helper_url" => $f_helper_url,
"helper_closing" => $f_helper_closing,
"content" => $direct_cachedata["i_".$f_name],
"error" => $f_error
);

		if ($f_error) { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_date ()- (#echo(__LINE__)#)",:#*/false/*#ifdef(DEBUG):,true):#*/; }
		else { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_date ()- (#echo(__LINE__)#)",:#*/true/*#ifdef(DEBUG):,true):#*/; }
	}

	//f// direct_formbuilder_datetime_extended->entry_add_time ($f_name,$f_title,$f_required = false,$f_helper_text = "",$f_helper_url = "",$f_helper_closing = true)
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
	* @uses   USE_debug_reporting
	* @return boolean False if the content was not accepted
	* @since  v0.1.00
*/
	public function entry_add_time ($f_name,$f_title,$f_required = false,$f_helper_text = "",$f_helper_url = "",$f_helper_closing = true)
	{
		global $direct_cachedata,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_time ($f_name,$f_title,+f_required,$f_helper_text,$f_helper_url,+f_helper_closing)- (#echo(__LINE__)#)"); }

		$f_error = "";

		if (isset ($direct_cachedata["i_0_".$f_name],$direct_cachedata["i_1_".$f_name],$direct_cachedata["i_2_".$f_name]))
		{
			preg_match ("#^(\d{1,2})$#i",$direct_cachedata["i_0_".$f_name],$f_hour_array);
			preg_match ("#^(\d{1,2})$#i",$direct_cachedata["i_2_".$f_name],$f_minute_array);

			if (empty ($f_hour_array)) { $f_error = "format_invalid"; }
			elseif (empty ($f_minute_array)) { $f_error = "format_invalid"; }
			else
			{
				$f_format_array = preg_split ("#\W#",(direct_local_get ("datetime_time")));

				foreach ($f_format_array as $f_element)
				{
					if (($f_element == "G")||($f_element == "H")) { $direct_cachedata["i_0_".$f_name] = $f_hour_array[1]; }
					if (($f_element == "g")||($f_element == "h"))
					{
						if (stristr ($direct_cachedata["i_1_".$f_name],"am"))
						{
							if ($f_hour_array[1] == 12) { $f_hour_array[1] = 0; }
						}
						else
						{
							if ($f_hour_array[1] < 12) { $f_hour_array[1] += 12; }
						}

						$direct_cachedata["i_0_".$f_name] = $f_hour_array[1];
					}
					if ($f_element == "i") { $direct_cachedata["i_2_".$f_name] = $f_minute_array[1]; }
				}
			}

			$direct_cachedata["i_".$f_name] = $direct_cachedata["i_0_".$f_name].".".$direct_cachedata["i_2_".$f_name];
		}
		else
		{
			if ((!isset ($direct_cachedata["i_".$f_name]))||(!$direct_cachedata["i_".$f_name])) { $direct_cachedata["i_".$f_name] = $direct_cachedata['core_time']; }

			$f_datetime = gmdate ("H.i",$direct_cachedata["i_".$f_name]);
			$f_datetime_array = explode (".",$f_datetime);
			$direct_cachedata["i_0_".$f_name] = $f_datetime_array[0];
			$direct_cachedata["i_2_".$f_name] = $f_datetime_array[1];

			$direct_cachedata["i_".$f_name] = $f_datetime;
		}

		$f_form_id = md5 ("i_".$f_name);

$this->form_cache[$f_form_id] = array (
"type" => "time",
"name" => $f_name,
"title" => $f_title,
"required" => $f_required,
"helper_text" => $f_helper_text,
"helper_url" => $f_helper_url,
"helper_closing" => $f_helper_closing,
"content" => $direct_cachedata["i_".$f_name],
"error" => $f_error
);

		if ($f_error) { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_time ()- (#echo(__LINE__)#)",:#*/false/*#ifdef(DEBUG):,true):#*/; }
		else { return /*#ifdef(DEBUG):direct_debug (7,"sWG/#echo(__FILEPATH__)# -formbuilder_class->entry_add_time ()- (#echo(__LINE__)#)",:#*/true/*#ifdef(DEBUG):,true):#*/; }
	}
}

/* -------------------------------------------------------------------------
Mark this class as the most up-to-date one
------------------------------------------------------------------------- */

$direct_classes['@names']['formbuilder'] = "direct_formbuilder_datetime_extended";
define ("CLASS_direct_formbuilder_datetime_extended",true);
}

$g_continue_check = true;
if (defined ("CLASS_direct_output_formbuilder_datetime")) { $g_continue_check = false; }
if (!defined ("CLASS_direct_output_formbuilder")) { $g_continue_check = false; }

if ($g_continue_check)
{
//c// direct_output_formbuilder_datetime->formbuilder_datetime
/**
* This is the extended output class for displaying date and time fields on
* forms.
*
* @author     direct Netware Group
* @copyright  (C) direct Netware Group - All rights reserved
* @package    sWG
* @subpackage formbuilder
* @uses       CLASS_direct_output_formbuilder
* @since      v0.1.00
* @license    http://www.direct-netware.de/redirect.php?licenses;gpl
*             GNU General Public License 2
*/
class direct_output_formbuilder_datetime extends direct_output_formbuilder
{
/* -------------------------------------------------------------------------
Extend the class
------------------------------------------------------------------------- */

	//f// direct_output_formbuilder_datetime->__construct ()
/**
	* Constructor (PHP5) __construct (direct_output_formbuilder_datetime)
	*
	* @uses  USE_debug_reporting
	* @since v0.1.00
*/
	public function __construct ()
	{
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -output_class->__construct (direct_output_formbuilder_datetime)- (#echo(__LINE__)#)"); }

/* -------------------------------------------------------------------------
My parent should be on my side to get the work done
------------------------------------------------------------------------- */

		parent::__construct ();

/* -------------------------------------------------------------------------
Informing the system about available functions
------------------------------------------------------------------------- */

		$this->functions['entry_add_date'] = true;
		$this->functions['entry_add_time'] = true;
	}

	//f// direct_output_formbuilder_datetime->entry_add_date ($f_data)
/**
	* Format and return XHTML for a date input field.
	*
	* @param  array $f_data Array containing information about the form field
	* @uses   USE_debug_reporting
	* @return string Valid XHTML form field definition
	* @since  v0.1.00
*/
	public function entry_add_date ($f_data)
	{
		global $direct_classes,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -output_formbuilder_class->entry_add_date (+f_data)- (#echo(__LINE__)#)"); }

		$f_return = "";

		if ($f_data['helper_text']) { $f_js_helper = "<br />\n<span style='font-size:8px'>&#0160;</span><br />\n".($direct_classes['output']->js_helper ($f_data['helper_text'],$f_data['helper_url'],$f_data['helper_closing'])); }
		else { $f_js_helper = ""; }

		$f_date_array = explode (".",$f_data['content']);
		$f_format = direct_local_get ("datetime_shortdate");
		$f_format_count = strlen (direct_local_get ("datetime_shortdate"));
		$f_formatted_inputarea = "";

		for ($f_i = 0;$f_i < $f_format_count;$f_i++)
		{
			if (($f_format[$f_i] == "d")||($f_format[$f_i] == "j")) { $f_formatted_inputarea .= "<input type='text' name='0_$f_data[name]' value=\"{$f_date_array[0]}\" size='2' class='pagecontentinputtextnpassword' />"; }
			elseif (($f_format[$f_i] == "m")||($f_format[$f_i] == "n")) { $f_formatted_inputarea .= "<input type='text' name='1_$f_data[name]' value=\"{$f_date_array[1]}\" size='2' class='pagecontentinputtextnpassword' />"; }
			elseif (stristr ($f_format[$f_i],"y")) { $f_formatted_inputarea .= "<input type='text' name='2_$f_data[name]' value=\"{$f_date_array[2]}\" size='4' class='pagecontentinputtextnpassword' />"; }
			else { $f_formatted_inputarea .= $f_format[$f_i]; }
		}

		$f_return .= "<tr>\n<td valign='top' align='right' class='pageextrabg' style='width:25%;padding:$direct_settings[theme_form_td_padding]'><span class='pageextracontent' style='font-weight:bold'>";
		if ($f_data['required']) { $f_return .= $direct_settings['swg_required_marker']." "; }

$f_return .= ($f_data['title'].":</span></td>
<td valign='middle' align='center' class='pagebg' style='width:75%;padding:$direct_settings[theme_form_td_padding]'>".$f_formatted_inputarea.$f_js_helper."</td>
</tr>");

		return $f_return;
	}

	//f// direct_output_formbuilder_datetime->entry_add_time ($f_data)
/**
	* Format and return XHTML for a time input field.
	*
	* @param  array $f_data Array containing information about the form field
	* @uses   USE_debug_reporting
	* @return string Valid XHTML form field definition
	* @since  v0.1.00
*/
	public function entry_add_time ($f_data)
	{
		global $direct_classes,$direct_settings;
		if (USE_debug_reporting) { direct_debug (5,"sWG/#echo(__FILEPATH__)# -output_formbuilder_class->entry_add_time (+f_data)- (#echo(__LINE__)#)"); }

		$f_return = "";

		if ($f_data['helper_text']) { $f_js_helper = "<br />\n<span style='font-size:8px'>&#0160;</span><br />\n".($direct_classes['output']->js_helper ($f_data['helper_text'],$f_data['helper_url'],$f_data['helper_closing'])); }
		else { $f_js_helper = ""; }

		$f_format = direct_local_get ("datetime_time");
		$f_format_count = strlen (direct_local_get ("datetime_time"));
		$f_formatted_inputarea = "";
		$f_pm_check = false;
		$f_time_array = explode (".",$f_data['content']);

		for ($f_i = 0;$f_i < $f_format_count;$f_i++)
		{
			if (($f_format[$f_i] == "G")||($f_format[$f_i] == "H"))
			{
				if (strlen ($f_time_array[0]) < 2) { $f_time_array[0] = "0".$f_time_array[0]; }

				$f_time_list = " 00|00  01|01  02|02  03|03  04|04  05|05  06|06  07|07  08|08  09|09  10|10  11|11 12|12  13|13  14|14  15|15  16|16  17|17  18|18  19|19  20|20  21|21  22|22  23|23 ";
				$f_time_list = preg_replace (array ("# ({$f_time_array[0]})\|(\d+) #","# (\d+)\|(\d+) #"),(array ("\n<option value='\\1' selected='selected'>\\2</option>","\n<option value='\\1'>\\2</option>")),$f_time_list);
				$f_formatted_inputarea .= "<select name='0_$f_data[name]' size='1' class='pagecontentselect'>$f_time_list\n</select>";
			}
			elseif (($f_format[$f_i] == "g")||($f_format[$f_i] == "h"))
			{
				if ($f_time_array[0] > 12)
				{
					$f_time_array[0] -= 12;
					$f_pm_check = true;
				}
				elseif ($f_time_array[0] == 12) { $f_pm_check = true; }
				elseif (!$f_time_array[0]) { $f_time_array[0] = 12; }

				if (strlen ($f_time_array[0]) < 2) { $f_time_array[0] = "0".$f_time_array[0]; }

				$f_time_list = " 12|12  01|01  02|02  03|03  04|04  05|05  06|06  07|07  08|08  09|09  10|10  11|11 ";
				$f_time_list = preg_replace (array ("# ({$f_time_array[0]})\|(\d+) #","# (\d+)\|(\d+) #"),(array ("\n<option value='\\1' selected='selected'>\\2</option>","\n<option value='\\1'>\\2</option>")),$f_time_list);
				$f_formatted_inputarea .= "<select name='0_$f_data[name]' size='1' class='pagecontentselect'>$f_time_list\n</select>";
			}
			elseif (stristr ($f_format[$f_i],"a"))
			{
				if ($f_pm_check) { $f_formatted_inputarea .= "<select name='1_$f_data[name]' size='1' class='pagecontentselect'>\n<option value='am'>am</option>\n<option value='pm' selected='selected'>pm</option>\n</select>"; }
				else { $f_formatted_inputarea .= "<select name='1_$f_data[name]' size='1' class='pagecontentselect'>\n<option value='am' selected='selected'>am</option>\n<option value='pm'>pm</option>\n</select>"; }
			}
			elseif ($f_format[$f_i] == "i")
			{
				if (strlen ($f_time_array[1]) < 2) { $f_time_array[1] = "0".$f_time_array[1]; }

$f_time_list = (" 00|00  01|01  02|02  03|03  04|04  05|05  06|06  07|07  08|08  09|09
 10|10  11|11  12|12  13|13  14|14  15|15  16|16  17|17  18|18  19|19
 20|20  21|21  22|22  23|23  24|24  25|25  26|26  27|27  28|28  29|29
 30|30  31|31  32|32  33|33  34|34  35|35  36|36  37|37  38|38  39|39
 40|40  41|41  42|42  43|43  44|44  45|45  46|46  47|47  48|48  49|49
 50|50  51|51  52|52  53|53  54|54  55|55  56|56  57|57  58|58  59|59 ");

				$f_time_list = preg_replace (array ("# ({$f_time_array[1]})\|(\d+)(\n| )#","# (\d+)\|(\d+) #"),(array ("\n<option value='\\1' selected='selected'>\\2</option>","\n<option value='\\1'>\\2</option>")),$f_time_list);
				$f_formatted_inputarea .= "<select name='2_$f_data[name]' size='1' class='pagecontentselect'>$f_time_list\n</select>";
			}
			else { $f_formatted_inputarea .= $f_format[$f_i]; }
		}

		$f_return .= "<tr>\n<td valign='top' align='right' class='pageextrabg' style='width:25%;padding:$direct_settings[theme_form_td_padding]'><span class='pageextracontent' style='font-weight:bold'>";
		if ($f_data['required']) { $f_return .= $direct_settings['swg_required_marker']." "; }

$f_return .= ($f_data['title'].":</span></td>
<td valign='middle' align='center' class='pagebg' style='width:75%;padding:$direct_settings[theme_form_td_padding]'>".$f_formatted_inputarea.$f_js_helper."</td>
</tr>");

		return $f_return;
	}
}

/* -------------------------------------------------------------------------
Mark this class as the most up-to-date one
------------------------------------------------------------------------- */

$direct_classes['@names']['output_formbuilder'] = "direct_output_formbuilder_datetime";
define ("CLASS_direct_output_formbuilder_datetime",true);
}

//j// Script specific commands

if (!isset ($direct_settings['theme_form_td_padding'])) { $direct_settings['theme_form_td_padding'] = "3px"; }

//j// EOF
?>