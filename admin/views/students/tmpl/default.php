<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

JHtml::_('formbehavior.chosen', 'select');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('behavior.tabstate');

?>
<form action="<?php echo JRoute::_('index.php?option=com_lists&layout=students&id=' . (int)$this->item->id); ?>"
	  method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div id="j-sidebar-container" class="col-md-2">
			<?php echo $this->sidebar; ?>
		</div>
		<div class="col-md-10">
			<div class="form-horizontal">
				<div class="row">
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_id_degree']->label); ?>
					</div>
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_year']->label); ?>
					</div>
				</div>
				<div class="row">
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_id_degree']->input); ?>
					</div>
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_year']->input); ?>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_id']->input); ?>
					</div>
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_name']->input); ?>
					</div>
					<div class="col col-xs-4">
						<?php print_r($this->form->getFieldset()['jform_observation']->input); ?>
					</div>
				</div>

			</div>
			<div id="j-main-container" class="j-main-container">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th width="5%">
							<?php echo JText::_('COM_HELLOWORLD_HELLOWORLDS_NAME'); ?>
						</th>
						<th width="90%">
							<?php echo JText::_('COM_HELLOWORLD_PUBLISHED'); ?>
						</th>
						<th width="5%">
							<?php echo JText::_('COM_HELLOWORLD_ID'); ?>
						</th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<td colspan="3">
						<?php //echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
				<tbody>
				<?php if ( ! empty($this->students)) : ?>
					<?php foreach ($this->students as $i => $row) : ?>

						<tr>
							<td>
								<?php echo $row->id; ?>
							</td>
							<td align="center">
								<?php echo $row->name; ?>
							</td>
							<td align="center">
								<?php echo $row->observation; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>