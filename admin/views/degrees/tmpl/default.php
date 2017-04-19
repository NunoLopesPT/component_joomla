<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('behavior.tabstate');

$listOrder = $this->escape($this->filter_order);
$listDirn = $this->escape($this->filter_order_Dir);
?>
<form action="index.php?option=com_lists&view=degrees" method="post" id="adminForm" name="adminForm">
	<div class="row">
		<div id="j-sidebar-container" class="col-md-2">
			<?php echo $this->sidebar; ?>
		</div>
		<div class="col-md-10">
			<div id="j-main-container" class="j-main-container">
				<?php
				// Search tools bar
				//echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
				?>
				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th width="1%"><?php echo JText::_('COM_LISTS_NUM'); ?></th>
						<th width="2%">
							<?php echo JHtml::_('grid.checkall'); ?>
						</th>
						<th width="90%">
							<?php echo JHtml::_('grid.sort', 'COM_LISTS_LISTSS_NAME', 'degree', $listDirn, $listOrder); ?>
						</th>
						<th width="5%">
							<?php echo JHtml::_('grid.sort', 'COM_LISTS_PUBLISHED', 'published', $listDirn, $listOrder); ?>
						</th>
						<th width="2%">
							<?php echo JHtml::_('grid.sort', 'COM_LISTS_ID', 'id', $listDirn, $listOrder); ?>
						</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<td colspan="5">
							<?php echo $this->pagination->getListFooter(); ?>
						</td>
					</tr>
					</tfoot>
					<tbody>
					<?php if ( ! empty($this->items)) : ?>
						<?php foreach ($this->items as $i => $row) :
							$link = JRoute::_('index.php?option=com_lists&task=degree.edit&id=' . $row->id);
							?>
							<tr>
								<td>
									<?php echo $this->pagination->getRowOffset($i); ?>
								</td>
								<td>
									<?php echo JHtml::_('grid.id', $i, $row->id); ?>
								</td>
								<td>
									<a href="<?php echo $link; ?>"
									   title="<?php echo JText::_('COM_LISTS_EDIT_LISTS'); ?>">
										<?php echo $row->degree; ?>
									</a>
								</td>
								<td align="center">
									<?php echo JHtml::_('jgrid.published', $row->published, $i, 'degrees.', TRUE, 'cb'); ?>
								</td>
								<td align="center">
									<?php echo $row->id; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<input type="hidden" name="task" value=""/>
				<input type="hidden" name="boxchecked" value="0"/>
				<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
				<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
				<?php echo JHtml::_('form.token'); ?>
</form>