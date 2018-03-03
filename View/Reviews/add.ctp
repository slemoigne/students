<div class="reviews form">
	<?php echo $this->Form->create('Review'); ?>
		<fieldset>
			<legend><?php echo __('Add Review'); ?></legend>
			<?php
				echo $this->Form->input('student_id', array(
					'type' => 'hidden',
					'value' => $student_id
				));
				echo $this->Form->input('subject');
				echo $this->Form->input('grade');
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
	</ul>
</div>