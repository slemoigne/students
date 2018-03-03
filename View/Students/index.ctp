<div class="students index">
	<h2><?php echo __('Students'); ?></h2>

	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('last_name'); ?></th>
				<th><?php echo $this->Paginator->sort('first_name'); ?></th>
				<th><?php echo $this->Paginator->sort('birth_date'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($students as $student): ?>
			<tr>
				<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['last_name']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['first_name']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['birth_date']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['created']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Add Review'), array('controller' => 'reviews', 'action' => 'add', $student['Student']['id'])); ?>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $student['Student']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $student['Student']['id'])); ?>
					<?php 
						echo $this->Form->postLink(
							__('Delete'),
							array('action' => 'delete', $student['Student']['id']),
							array('confirm' => __('Are you sure you want to delete %s?', $student['Student']['first_name'] . ' ' . $student['Student']['last_name']))
						);
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}')
			));
		?>
	</p>

	<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?></li>
	</ul>
</div>