<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldYears extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Years';


	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */


	public function getInput()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(TRUE);
		$query->select('year');
		$query->from('#__years');
		$db->setQuery((string)$query);
		$rows = $db->setQuery($query)->loadObjectlist();

		$html = '<select class="form-control" id="' . $this->year . '" name="' . $this->name . '">';

		foreach ($rows as $row)
		{
			$html .= '<option value="' . $row->year . '">' . $row->year . "</option>";
		}

		$html .= '</select>';

		return $html;
	}
}