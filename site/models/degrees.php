<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class ListsModelDegrees extends JModelItem
{
	/**
	 * Sends message to user
	 *
	 * @var    string  message
	 * @since  0.0.6
	 */
	protected $message;


	public function getTable($type = 'Degrees', $prefix = 'DegreesTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Get the message
	 *
	 * @return  string  The message to be displayed to the user
	 */
	public function getMsg($id = 1)
	{
		if (!isset($this->message))
		{
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');

			// Get a TableHelloWorld instance
			$table = $this->getTable();

			// // Load the message
			 $table->load($id);

			// // Assign the message
			 $this->message = $table->degree;
		}

		return $this->message;
	}
}