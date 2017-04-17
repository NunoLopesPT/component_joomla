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

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class ListsModelStudents extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Students', $prefix = 'StudentsTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getStudents()
	{
		// Initialize variables.
		$db = JFactory::getDbo();
		$query = $db->getQuery(TRUE);

		// Create the base select statement.
		$query->select('*')
			->from($db->quoteName('#__students'));

		return parent::_getList($query);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_lists.students',
			'students',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_lists.edit.student.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	public function addStudent($student)
	{
		$data = new stdClass();

		$data->id = $student['id'];
		$data->id_degree = $student['id_degree'];
		$data->year = $student['year'];
		$data->name = $student['name'];
		$data->observation = $student['observation'];

		try{
			$this->getDbo()->insertObject('#__students', $data);
		}
		catch(Exception $e){
			JError::raiseError( 4711, 'Duplicated entry for ID_Student' );

			return false;
		}

		JText::_('JGLOBAL_NO_MATCHING_RESULTS');
		return true;
	}
}