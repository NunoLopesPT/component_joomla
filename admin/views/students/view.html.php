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

class ListsViewStudents extends JViewLegacy
{
	function display($tpl = null)
	{
		// Set title in top of page
		// Second argument image to show at left of Title
		JToolbarHelper::title(JText::_('COM_STUDENTS'), 'bookmark banners');

		// Load Sidebar Menu
		DegreesHelper::addSubmenu('students');
		$this->sidebar = JHtmlSidebar::render();

		
		parent::display($tpl);
	}
}