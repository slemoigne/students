<div class="students view">
	<h2><?php echo __('Student'); ?></h2>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($student['Student']['id']); ?></dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd><?php echo h($student['Student']['last_name']); ?></dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd><?php echo h($student['Student']['first_name']); ?></dd>
		<dt><?php echo __('Birth Date'); ?></dt>
		<dd><?php echo h($student['Student']['birth_date']); ?></dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($student['Student']['created']); ?></dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($student['Student']['modified']); ?></dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
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
			<li><?php echo $this->Html->link(__('Add Review'), array('controller' => 'reviews', 'action' => 'add', $student['Student']['id'])); ?> </li>
		</ul>
	</div>
</div>