<div class="students form">
	<?php echo $this->Form->create('Student'); ?>
		<fieldset>
			<legend><?php echo __('Edit Student'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('last_name');
				echo $this->Form->input('first_name');
				echo $this->Form->input('birth_date', array(
					'dateFormat' => 'DMY',
					'minYear' => date('Y') - 80,
					'maxYear' => date('Y') - 3,
				));
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Related Reviews'); ?></h3>

	<?php if (!empty($student['Review'])): ?>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Subject'); ?></th>
			<th><?php echo __('Grade'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
		</tr>
		<?php foreach ($student['Review'] as $review): ?>
		<tr>
			<td><?php echo $review['subject']; ?></td>
			<td><?php echo $review['grade']; ?></td>
			<td><?php echo $review['created']; ?></td>
			<td><?php echo $review['modified']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add Review'), array('controller' => 'reviews', 'action' => 'add', $this->Form->value('Student.id'))); ?></li>
		</ul>
	</div>
</div>