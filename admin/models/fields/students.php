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
class JFormFieldStudents extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Students';


	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */


	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id, degree');
		$query->from('#__degrees');
		$db->setQuery((string) $query);
		$rows = $db->setQuery($query)->loadObjectlist();

		foreach($rows as $row){
			$degrees[] = $row->degree;
		}
		$options = array_merge(parent::getOptions(), $degrees);

		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('year');
		$query->from('#__years');
		$db->setQuery((string) $query);
		$rows = $db->setQuery($query)->loadObjectlist();

		foreach($rows as $row){
			$years[] = $row->year;
		}
		$options = array_merge(parent::getOptions(), $years);

		// Merge any additional options in the XML definition.
		return $options;
	}
}