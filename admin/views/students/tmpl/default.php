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

?>
<form action="<?php echo JRoute::_('index.php?option=com_lists&view=students&layout=default'); ?>"
	  method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div id="j-sidebar-container" class="col-md-2">
			<?php echo $this->sidebar; ?>
		</div>
		<div class="col-md-10">
			<div id="j-main-container" class="j-main-container" style="padding: 10px">
				<div class="form-horizontal">
					<h3> Add new student</h3>
					<div class="row">
						<div class="col col-xs-4">
							<?php print_r($this->form->getFieldset()['jform_id_degree']->label); ?>
							<?php print_r($this->form->getFieldset()['jform_id_degree']->input); ?>
						</div>
						<div class="col col-xs-4">
							<?php print_r($this->form->getFieldset()['jform_year']->label); ?>
							<?php print_r($this->form->getFieldset()['jform_year']->input); ?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col col-xs-4">
							<?php print_r($this->form->getFieldset()['jform_id']->label); ?>
							<?php print_r($this->form->getFieldset()['jform_id']->input); ?>
						</div>
						<div class="col col-xs-4">
							<?php print_r($this->form->getFieldset()['jform_name']->label); ?>
							<?php print_r($this->form->getFieldset()['jform_name']->input); ?>
						</div>
						<div class="col col-xs-4">
							<?php print_r($this->form->getFieldset()['jform_observation']->label); ?>
							<?php print_r($this->form->getFieldset()['jform_observation']->input); ?>
						</div>
					</div>
				</div>
				<small style="color: red">Fields with * are mandatory</small>
			</div>
			<br>
			<div id="j-main-container" class="j-main-container">
				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th width="5%">
							<?php echo "ID"; ?>
						</th>
						<th width="30%" class="text-center">
							<?php echo "Name"; ?>
						</th>
						<th width="30%" class="text-center">
							<?php echo "ID Degree"; ?>
						</th>
						<th width="30%" class="text-center">
							<?php echo "Year"; ?>
						</th>
						<th width="5%" class="text-center">
							<?php echo "Observation"; ?>
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
									<?php echo $row->id_degree; ?>
								</td>
								<td align="center">
									<?php echo $row->year; ?>
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
		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>
</form>