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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class ListsViewDegrees extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$app     = JFactory::getApplication();
		$context = "lists.list.admin.degree";

		// Get data from the model
		$this->items            = $this->get('Items');
		$this->pagination       = $this->get('Pagination');
		$this->filter_order     = $app->getUserStateFromRequest($context . 'filter_order', 'filter_order', 'degree', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		//$this->activeFilters    = $this->get('ActiveFilters');
		//$this->filterForm    = $this->get('FilterForm');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		
		DegreesHelper::addSubmenu('degrees');
		JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
		$this->sidebar = JHtmlSidebar::render();

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS');
 
		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}
		
		JToolbarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS'));
		JToolbarHelper::addNew('degree.add');
		JToolbarHelper::editList('degree.edit');
		JToolbarHelper::deleteList('', 'degrees.delete');
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
	}
}